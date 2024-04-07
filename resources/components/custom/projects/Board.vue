<script setup lang="ts">
import {
    Table,
    TableBody,
    TableCaption,
    TableCell,
    TableHead,
    TableHeader,
    TableRow,
} from '@/components/ui/table'
import Tabs from '~/resources/components/ui/tabs/Tabs.vue';
import TabsContent from '~/resources/components/ui/tabs/TabsContent.vue';
import TabsList from '~/resources/components/ui/tabs/TabsList.vue';
import TabsTrigger from '~/resources/components/ui/tabs/TabsTrigger.vue';
import Card from '../../ui/card/Card.vue';
import CardTitle from '../../ui/card/CardTitle.vue';
import CardDescription from '../../ui/card/CardDescription.vue';
useHead({
    title: 'Projects'
})

const props = defineProps<{
    projects: any
}>()
</script>

<template layout>
    <div class="grid grid-cols-1 sm:grid-col-2 md:grid-cols-4 lg:grid-cols-6 gap-5">
        <Car class="p-6 bg-white shadow-md" v-for="{ key, record } in projects.records" :key="record.id">
            <CardTitle v-text="record.name"></CardTitle>
            <CardDescription v-text="record.name"></CardDescription>
        </Car>
    </div>
</template>
