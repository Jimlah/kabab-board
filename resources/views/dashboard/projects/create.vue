<script setup lang="ts">
import {
    Sheet,
    SheetContent,
    SheetDescription,
    SheetHeader,
    SheetTitle,
    SheetTrigger,
} from '@/components/ui/sheet'
import { X } from 'lucide-vue-next';
import Button from '~/resources/components/ui/button/Button.vue';
import Input from '~/resources/components/ui/input/Input.vue';
import Label from '~/resources/components/ui/label/Label.vue';
import Textarea from '~/resources/components/ui/textarea/Textarea.vue';

const props = defineProps<{
    project: {
        id?: string,
        name?: string,
        description?: string,
    }
}>()

const action = useForm({
    method: props.project.id ? 'put' : 'post',
    url: props.project.id ? route('projects.update', { project: props.project }) : '/projects',
    fields: {
        name: props.project.name || '',
        description: props.project.description || '',
    }
})
const { show, close, unmount } = useDialog()
</script>

<template>
    <div>
        <Sheet :open="show">
            <SheetContent>
                <Button variant="link" class="absolute top-2 right-2 p-1" @click.prevent="close">
                    <X class="w-4 h-4" />
                </Button>
                <SheetHeader>
                    <SheetTitle>Are you sure absolutely sure?</SheetTitle>
                    <SheetDescription>
                        This action cannot be undone. This will permanently delete the project and all its data.
                    </SheetDescription>
                </SheetHeader>
                <form class="flex flex-col items-start gap-4" @submit.prevent="action.submit">
                    <div class="flex flex-col w-full gap-2">
                        <Label for="name">Project Title</Label>
                        <Input id="name" type="text" name="name" v-model="action.fields.name" required />
                    </div>
                    <div class="flex flex-col w-full gap-2">
                        <Label for="password">Description</Label>
                        <Textarea class="px-4 py-2" id="password" rows="2" type="password" name="password"
                            v-model="action.fields.description" />
                    </div>
                    <Button type="submit" class="w-full"
                        v-text="$props.project.id ? 'Update Project' : 'Add Project'"></Button>
                </form>
            </SheetContent>
        </Sheet>
    </div>
</template>
