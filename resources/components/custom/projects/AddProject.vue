<script setup lang="ts">
import {
    Sheet,
    SheetContent,
    SheetDescription,
    SheetHeader,
    SheetTitle,
    SheetTrigger,
} from '@/components/ui/sheet'
import Textarea from '../../ui/textarea/Textarea.vue';
import Input from '../../ui/input/Input.vue';
import Label from '../../ui/label/Label.vue';
import Button from '../../ui/button/Button.vue';

const action = useForm({
    method: 'POST',
    url: '/projects',
    fields: {
        name: "",
        description: "",
    }
})
</script>

<template>
    <Sheet>
        <SheetTrigger>Add Project</SheetTrigger>
        <SheetContent>
            <SheetHeader>
                <SheetTitle>New Project</SheetTitle>
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
                <Button type="submit" class="w-full">Add Project</Button>
            </form>
        </SheetContent>
    </Sheet>
</template>
