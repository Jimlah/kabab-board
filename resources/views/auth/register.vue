<script setup lang="ts">
import Button from '~/resources/components/ui/button/Button.vue';
import Card from '~/resources/components/ui/card/Card.vue';
import CardHeader from '~/resources/components/ui/card/CardHeader.vue';
import CardTitle from '~/resources/components/ui/card/CardTitle.vue';
import Input from '~/resources/components/ui/input/Input.vue';
import Label from '~/resources/components/ui/label/Label.vue';


useHead({
    title: 'Register'
})
const action = useForm({
    method: 'POST',
    url: '/auth/register',
    fields: {
        first_name: "",
        last_name: "",
        email: "",
        password: "",
        password_confirmation: ""
    }
})
</script>

<template layout="auth">
    <div class="w-full flex flex-col gap-3">
        <CardHeader>
            <CardTitle class="text-2xl font-semibold text-center">Register</CardTitle>
        </CardHeader>
        <form class="flex flex-col items-start gap-4" @submit.prevent="action.submit">
            <div class="flex flex-col w-full gap-2">
                <Label for="first_name">First Name</Label>
                <Input id="first_name" type="text" name="first_name" v-model="action.fields.first_name" required />
            </div>
            <div class="flex flex-col w-full gap-2">
                <Label for="last_name">Last Name</Label>
                <Input id="last_name" type="text" name="last_name" v-model="action.fields.last_name" required />
            </div>
            <div class="flex flex-col w-full gap-2">
                <Label for="email">Email</Label>
                <Input id="email" type="text" name="email" v-model="action.fields.email" required />
            </div>
            <div class="flex flex-col w-full gap-2">
                <Label for="password">Password</Label>
                <Input id="password" type="password" name="password" v-model="action.fields.password" required />
            </div>
            <div class="flex flex-col w-full gap-2">
                <Label for="confirmation_password">Confirm Password</Label>
                <Input id="confirmation_password" type="password" v-model="action.fields.password_confirmation"
                    name="confirmation_password" required />
            </div>
            <Button type="submit" class="w-full">Register</Button>
        </form>
    </div>
</template>
