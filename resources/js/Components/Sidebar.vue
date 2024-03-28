<script setup>
import NavLink from './NavLink.vue';
</script>

<!-- component -->
<template>
    <div class="flex flex-col top-0 left-0 w-64 bg-white h-full border-r">
        <div class="flex items-center justify-center h-14 border-b">
            <div>Menu</div>
        </div>
        <div class="overflow-y-auto overflow-x-hidden flex-grow mt-5">
            <ul class="flex flex-col py-4 space-y-1">
                <li class="px-5">
                    <div class="flex flex-row items-center h-8">
                        <div class="text-sm font-light tracking-wide text-gray-500">Menu</div>
                    </div>
                </li>
                <NavLink :href="route('home')" :active="route().current('home')">
                    <template #icon>
                        <i class="bi bi-house"></i>
                    </template>
                    
                    <template #name>
                        Home
                    </template>
                </NavLink>
                <NavLink :href="route('valid-parentheses.show')" :active="route().current('valid-parentheses.show')">
                    <template #icon>
                        <i class="bi bi-braces"></i>
                    </template>
                    
                    <template #name>
                        Valid Parentheses
                    </template>
                </NavLink>
            </ul>
        </div>
    </div>
</template>
