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
import Checkbox from '../../ui/checkbox/Checkbox.vue';
useHead({
    title: 'Projects'
})

const props = defineProps<{
    projects: any
}>()

</script>

<template layout>
    <Table>
        <TableCaption>A list of your recent projects.</TableCaption>
        <TableHeader>
            <TableRow>
                <TableHead class="w-[100px]">
                    <Checkbox class="bg-white" />
                </TableHead>
                <TableHead class="w-[100px]">
                    Name
                </TableHead>
                <TableHead>Description</TableHead>
                <TableHead>User</TableHead>
                <TableHead class="text-right">
                    Actions
                </TableHead>
            </TableRow>
        </TableHeader>
        <TableBody>
            <TableRow v-for="{ key, record } in projects.records" :key="key">
                <TableCell>
                    <Checkbox v-model="projects.selection.only" :value="key" />
                </TableCell>
                <TableCell class="font-medium" v-text="record.name"></TableCell>
                <TableCell v-text="record.description"></TableCell>
                <TableCell v-text="record.user"></TableCell>
                <TableCell class="text-right">
                    <router-link :href="route('projects.workflows.index', { project: record.id })"
                        class="text-blue-500">View</router-link>
                    <router-link :href="route('projects.edit', { project: record })"
                        class="text-blue-500">Edit</router-link>
                </TableCell>
            </TableRow>
        </TableBody>
    </Table>
</template>
