<script setup lang="ts">
import Input from '../components/ui/input/Input.vue';

useHead({
    title: 'Welcome'
})
</script>

<template layout>
    <div
        class="items-top relative flex justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <Input name="email" type="email" />
    </div>
</template>
