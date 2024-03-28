<script setup>
import { computed, useSlots } from 'vue';

defineEmits(['submitted']);

defineProps({
  enctype: String, // Define the enctype prop
});

const hasActions = computed(() => !! useSlots().actions);
</script>

<template>
    <div>
        <div class="max-w-2xl mx-auto">
            <form @submit.prevent="$emit('submitted')" :enctype="enctype">
                <div
                class="px-4 py-3 bg-slate-100 sm:p-6 shadow"
                :class="hasActions ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md'"
                >
                <div class="text-xl mb-5 font-semibold relative">
                    <slot name="heading"/>
                </div>
                    <!-- <div class="grid grid-cols-6 gap-6"> -->
                    <div class="flex flex-col gap-3 px-1">
                        <slot name="form" />
                    </div>
                </div>

                <div v-if="hasActions" class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                    <slot name="actions" />
                </div>
            </form>
        </div>
    </div>
</template>
