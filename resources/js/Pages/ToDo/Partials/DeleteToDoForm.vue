<script setup>
import { ref, watch } from 'vue';
import { useForm } from '@inertiajs/vue3';
import ConfirmationModal from '@/Components/ConfirmationModal.vue';
import DangerButton from '@/Components/DangerButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';

const props = defineProps({
    toDo: Array,
    show: {
        type: Boolean,
        default: false,
    },
});
const emit = defineEmits(['close']);

const close = () => {
    emit('close');
};


const confirmingToDoDeletion = ref(false);
const form = useForm({});

watch(() => {
    confirmingToDoDeletion.value = props.show;
});

const deleteToDo = async () => {
    try {
        // Send a DELETE request to delete the toDo
        form.delete(route('to-dos.destroy', props.toDo.id), {
            errorBag: 'deleteToDo',
        });

        setTimeout(() => {
            close();
        }, 1000);

    } catch (error) {
        // Handle any errors that occur during the deletion
        console.error('Error deleting ToDo:', error);
    }
};


</script>


<template>
    <!-- Delete toDo Confirmation Modal -->
    <ConfirmationModal :show="confirmingToDoDeletion" :max-width="maxWidth" :closeable="closeable" @close="close">

        <template #title>
            Delete Task
        </template>

        <template #content>
            Are you sure you want to delete this Task?

            <div class="bg-red-100 w-full mt-2 rounded line-clamp-3 box-content">
                <span class="m-2 line-clamp-1 box-content text-lg">
                    {{ props.toDo.title }}
                </span>
                <div class="m-2 line-clamp-3 box-content">{{ props.toDo.description }}</div>
            </div>
        </template>

        <template #footer>
            <div class="flex justify-center items-center">
                <SecondaryButton @click="close">
                    Cancel
                </SecondaryButton>

                <DangerButton class="ml-3" :class="{ 'opacity-25': form.processing }" :disabled="form.processing"
                    @click="deleteToDo">
                    Delete
                </DangerButton>
            </div>
        </template>
    </ConfirmationModal>
</template>
