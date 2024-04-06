<script setup lang="ts">
import Input from '../components/ui/input/Input.vue';

useHead({
    title: 'Welcome'
})
</script>

<template layout>
    <div
        class="items-top relative flex justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <div class="flex items-center gap-2">
            <router-link to="/login" class="text-lg font-semibold text-blue-500">Login</router-link>
            <router-link to="/register" class="text-lg font-semibold text-blue-500">Register</router-link>
        </div>
    </div>
</template>
