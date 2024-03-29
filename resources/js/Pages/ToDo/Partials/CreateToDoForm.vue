<script setup>
import { useForm } from '@inertiajs/vue3';
import FormSection from '@/Components/FormSection.vue';
import TextInput from '@/Components/TextInput.vue';
import TextArea from '@/Components/TextArea.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const form = useForm({
    title: '',
    description: '',
});

const props = defineProps({
    isValid: String
});

const createToDo = () => {
    form.post(route('to-dos.store'), {
        preserveScroll: true,
    })
};
</script>


<template>
    <div>
        <FormSection @submitted="createToDo">
            <template #heading>
                Create a Task
            </template>
            <template #form>
                <InputLabel for="title" value="Ttile">
                    <template #required>*</template>
                </InputLabel>
                <TextInput id="title" v-model="form.title" class="block w-full"
                    :class="{ 'border-red-500 focus:border-red-500': form.errors.title }" type="text" name="title" required />
                <InputError :message="form.errors.title" class="text-red-500" />

                <InputLabel for="description" value="Description" />
                <TextArea id="description" v-model="form.description" class="block w-full" type="text" name="description" />
            </template>

            <template #actions>
                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Create</PrimaryButton>
            </template>
        </FormSection>
    </div>
</template>
