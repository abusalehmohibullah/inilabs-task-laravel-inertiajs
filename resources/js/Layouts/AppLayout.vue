<script setup>
import { Head } from '@inertiajs/vue3';
import Sidebar from '../Components/Sidebar.vue';
import Topbar from '../Components/Topbar.vue';
import ToastMessage from '../Components/ToastMessage.vue';

</script>

<template>
    <div>

        <Head :title="title" />
        <ToastMessage />
        <div class="min-h-screen flex flex-row flex-auto flex-shrink-0 bg-gray-50 text-gray-800">
            <aside>
                <Sidebar />
            </aside>

            <div class="main w-full">
                <Topbar />
                <!-- Page Content -->
                <main class="content mt-28 max-w-7xl mx-auto bg-white p-5 rounded">
                    <div class="text-2xl font-bold mb-4 w-full">
                        <slot name="header" />
                    </div>
                    <slot name="main" />
                </main>
            </div>

        </div>
    </div>
</template>
