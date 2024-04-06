<script setup lang="ts">
import { toast } from 'vue-sonner';
import Card from '../components/ui/card/Card.vue';
import { Toaster } from '../components/ui/sonner';
const flash = useProperty('flash');
watch(flash, (value) => {
    if (value) {
        const type = Object.keys(value).find((key) => value[key as keyof App.Data.FlashData]);
        if (!type) {
            return;
        }
        toast(value[type as keyof App.Data.FlashData] || 'An error occurred', {})
    }
})
</script>

<template>
    <main class="h-screen w-full flex items-center justify-center">
        <Toaster />
        <Card class="p-6 w-full max-w-md shadow-xl rounded-xl bg-white">
            <slot />
        </Card>
    </main>
</template>
