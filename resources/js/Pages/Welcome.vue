<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <AppLayout>

        <Head title="Valid Parentheses" />
        <template #header>
            Welcome
        </template>

        <template #main>
            <div class="grid grid-cols-3 gap-20 px-40 py-10">
                <div class="relative">
                    <div class="grid w-full place-items-center">
                        <div class="absolute left-0 top-0 h-80 w-64 rotate-6 rounded-2xl bg-gray-400">
                        </div>

                        <div class="absolute left-0 top-0 h-80 w-64 rotate-6 space-y-6 rounded-2xl bg-gray-100 p-6 transition duration-300 hover:rotate-0">
                            <div class="flex justify-end">
                                <div class="h-4 w-4 rounded-full bg-gray-900"></div>
                            </div>
                            <header class="text-center text-2xl font-extrabold text-gray-600">Task 0</header>
                            <div>
                                <p class="text-center text-4xl font-extrabold text-gray-900">Valid Parentheses</p>
                            </div>
                            <footer class="mb-10 flex justify-center">
                                <Link :href="route('valid-parentheses.show-form')" class="flex items-baseline gap-2 rounded-lg bg-[#FE5401] px-4 py-2.5 text-xl font-bold text-white hover:bg-[#FF7308]">
                                    <span>Go</span>
                            </Link>
                            </footer>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <div class="grid w-full place-items-center">
                        <div class="absolute left-0 top-0 h-80 w-64 rotate-6 rounded-2xl bg-gray-400">
                        </div>

                        <div class="absolute left-0 top-0 h-80 w-64 rotate-6 space-y-6 rounded-2xl bg-gray-100 p-6 transition duration-300 hover:rotate-0">
                            <div class="flex justify-end">
                                <div class="h-4 w-4 rounded-full bg-gray-900"></div>
                            </div>
                            <header class="text-center text-2xl font-extrabold text-gray-600">Task 1</header>
                            <div>
                                <p class="text-center text-4xl font-extrabold text-gray-900">Class Inheritance</p>
                            </div>
                            <footer class="mb-10 flex justify-center">
                                <Link :href="route('calculate-area.show-form')" class="flex items-baseline gap-2 rounded-lg bg-[#FE5401] px-4 py-2.5 text-xl font-bold text-white hover:bg-[#FF7308]">
                                    <span>Go</span>
                            </Link>
                            </footer>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <div class="grid w-full place-items-center">
                        <div class="absolute left-0 top-0 h-80 w-64 rotate-6 rounded-2xl bg-gray-400">
                        </div>

                        <div class="absolute left-0 top-0 h-80 w-64 rotate-6 space-y-6 rounded-2xl bg-gray-100 p-6 transition duration-300 hover:rotate-0">
                            <div class="flex justify-end">
                                <div class="h-4 w-4 rounded-full bg-gray-900"></div>
                            </div>
                            <header class="text-center text-2xl font-extrabold text-gray-600">Task 5</header>
                            <div>
                                <p class="text-center text-4xl font-extrabold text-gray-900">To-Do Module</p>
                            </div>
                            <footer class="mb-10 flex justify-center">
                                <Link :href="route('to-dos.index')" class="flex items-baseline gap-2 rounded-lg bg-[#FE5401] px-4 py-2.5 text-xl font-bold text-white hover:bg-[#FF7308]">
                                    <span>Go</span>
                            </Link>
                            </footer>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </AppLayout>
</template>
