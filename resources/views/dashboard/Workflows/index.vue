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
}>()
</script>

<template layout>
    <div class="w-full">
        <Tabs default-value="table" class="w-full">
            <div class="flex items-center w-full justify-between">
                <div class="flex items-center justify-start gap-2">
                    <!-- <div v-for="(filter, index) in projects.filters" class="flex items-center justify-start">
                        <Input v-if="filter.name === 'name'" placeholder="Search Projects"
                            v-on:input="filter.apply($event.target.value)" />
                        <div class="flex items-start -space-x-2" v-if="filter.name === 'user_id'">
                            <label v-for="user in users"
                                class="h-fit rounded-full border has-[:checked]:border-zinc-950" :key="user.id"
                                :class="{ 'border-zinc-950': filter.value === user.id }">
                                <Avatar>
                                    <AvatarImage src="" alt="@radix-vue" />
                                    <AvatarFallback v-text="user.first_name[0] + user.last_name[0]">
                                    </AvatarFallback>
                                </Avatar>
                                <input type="radio" class="hidden"
                                    :checked="Boolean(projects.currentFilters().find(f => f.name === 'user_id' && f.value == user.id))"
                                    name="user_id" @change="filter.apply(($event.target as HTMLInputElement).value)"
                                    :value="user.id" />
                            </label>
                        </div>
                    </div> -->
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
                Board
            </TabsContent>
        </Tabs>
    </div>
</template>
