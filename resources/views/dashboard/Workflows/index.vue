<script setup lang="ts">
import { LayoutPanelTop, Table2 } from 'lucide-vue-next';
import AddProject from '~/resources/components/custom/projects/AddProject.vue';
import Board from '~/resources/components/custom/projects/Board.vue';
import Table from '~/resources/components/custom/projects/Table.vue';
import Avatar from '~/resources/components/ui/avatar/Avatar.vue';
import AvatarFallback from '~/resources/components/ui/avatar/AvatarFallback.vue';
import AvatarImage from '~/resources/components/ui/avatar/AvatarImage.vue';
import Button from '~/resources/components/ui/button/Button.vue';
import Input from '~/resources/components/ui/input/Input.vue';
import Tabs from '~/resources/components/ui/tabs/Tabs.vue';
import TabsContent from '~/resources/components/ui/tabs/TabsContent.vue';
import TabsList from '~/resources/components/ui/tabs/TabsList.vue';
import TabsTrigger from '~/resources/components/ui/tabs/TabsTrigger.vue';
useHead({
    title: 'Projects'
})

const $props = defineProps<{
    project: Table<{
        id: string,
        name: string,
        description: string,
        user: string
    }>,
    workflows: Table<App.Data.WorkflowData>
}>()

console.log($props.workflows.records);

</script>

<template layout>
    <div class="w-full">
        <Tabs default-value="board" class="w-full">
            <div class="flex items-center w-full justify-between">
                <div class="flex items-center justify-start gap-2">
                </div>
                <div class="flex items-end gap-2">
                    <router-link class="bg-zinc-950 hover:bg-zinc-800 px-4 py-2 text-white rounded-md"
                        :href="route('projects.workflows.create', { project: project })">
                        New Workflow
                    </router-link>
                    <TabsList>
                        <TabsTrigger value="table">
                            <Table2 />
                        </TabsTrigger>
                        <TabsTrigger value="board">
                            <LayoutPanelTop />
                        </TabsTrigger>
                    </TabsList>
                </div>
            </div>
            <!-- <div class="my-4">
                <Button size="sm" class="bg-red-500" v-for="(action, index) in projects.bulkActions"
                    @click="action.execute" v-text="action.label" :key="index"></Button>
            </div> -->
            <TabsContent value="table">
                Table
            </TabsContent>
            <TabsContent value="board">
                <div class="flex items-start justify-start w-full overflow-auto">
                    <div class="w-full max-w-xs p-6" v-for="item in $props.workflows.records">
                        Hello world
                    </div>
                </div>
            </TabsContent>
        </Tabs>
    </div>
</template>
