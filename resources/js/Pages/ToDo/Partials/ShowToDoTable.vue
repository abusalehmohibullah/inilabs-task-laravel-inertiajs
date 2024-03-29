  
<script setup>
import { ref, onMounted } from 'vue';
import { useForm, Link, usePage } from '@inertiajs/vue3';

import Table from '@/Components/Table.vue';
// import ToggleStatus from '@/Components/Admin/ToggleStatus.vue';
import PrimaryPaginatorButton from '@/Components/PrimaryPaginatorButton.vue';
import SecondaryPaginatorButton from '@/Components/SecondaryPaginatorButton.vue';
import PrimaryIconButton from '@/Components/PrimaryIconButton.vue';
import SecondaryIconButton from '@/Components/SecondaryIconButton.vue';
import DangerIconButton from '@/Components/DangerIconButton.vue';
import ToggleStatus from '@/Components/ToggleStatus.vue';
import DeleteToDoForm from '@/Pages/ToDo/Partials/DeleteToDoForm.vue';

const props = defineProps({
    toDos: Object
});


const showModal = ref(false);
const selectedToDo = ref(null);

const toggleModal = (toDo) => {
    selectedToDo.value = toDo;
    showModal.value = !showModal.value;
};
</script>

<template>
    <Table>
        <template #thead>
            <tr>
                <th class="py-2 px-4 border-b bg-slate-200">#</th>
                <th class="py-2 px-4 border-b bg-slate-200">Task</th>
                <th class="py-2 px-4 border-b bg-slate-200">Action</th>
            </tr>
        </template>
        <template #tbody>

            <tr v-if="toDos.data.length > 0" v-for="(toDo, index) in toDos.data" :key="index"
                class="hover:bg-blue-100" :class="toDo.completed === 1 ? 'bg-gray-200 opacity-70' : ''">
                <td class="py-2 px-4 border-b">
                    <ToggleStatus :data="toDo" :routeName="`to-dos.toggle-status`" :fieldName="`completed`"/>
                </td>
                <td class="py-2 px-4 border-b w-full">
                    <div class="font-medium text-slate-500" :class="toDo.completed == 1 ? 'line-through' : ''">{{ toDo.title }}</div>
                    <div>{{ toDo.description }}</div>
                </td>
                <td class="py-2 px-4 border-b">
                    <div class="flex justify-center">
                        <Link :href="route('to-dos.edit', toDo.id)">
                        <PrimaryIconButton>
                            <i class="bi bi-pencil text-lg"></i>
                        </PrimaryIconButton>
                        </Link>

                        <!-- Delete button -->
                        <DangerIconButton class="ml-1" @click="() => toggleModal(toDo)">
                            <i class="bi bi-trash3 text-lg"></i>
                        </DangerIconButton>
                    </div>
                </td>
            </tr>

            <tr v-else>
                <td colspan="6" class="text-center p-3">
                    Not Data Found
                </td>
            </tr>
        </template>
    </Table>
    <!-- Modal form outside the table -->
    <DeleteToDoForm :show="showModal" :toDo="selectedToDo" @close="toggleModal" />


    <div class="mt-5">
        <template v-for="(link, index) in toDos.links">
            <template v-if="link.url">
                <Link :href="link.url">
                <template v-if="link.active">
                    <PrimaryPaginatorButton v-html="link.label" />
                </template>
                <template v-else>
                    <template v-if="index === 0">
                        <SecondaryPaginatorButton v-html="link.label.split(' ')[0].trim()" />
                    </template>
                    <template v-else-if="index === toDos.links.length - 1">
                        <SecondaryPaginatorButton v-html="link.label.split(' ')[1].trim()" />
                    </template>
                    <template v-else>
                        <SecondaryPaginatorButton v-html="link.label" />
                    </template>
                </template>
                </Link>
            </template>
            <template v-else>
                <template v-if="index === 0">
                    <SecondaryPaginatorButton v-html="link.label.split(' ')[0].trim()" class='opacity-40' />
                </template>
                <template v-else-if="index === toDos.links.length - 1">
                    <SecondaryPaginatorButton v-html="link.label.split(' ')[1].trim()" class='opacity-40' />
                </template>
                <template v-else>
                    <SecondaryPaginatorButton v-html="link.label" />
                </template>
            </template>
        </template>
    </div>
</template>



