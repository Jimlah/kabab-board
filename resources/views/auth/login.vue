<script setup lang="ts">
import Button from '~/resources/components/ui/button/Button.vue';
import CardHeader from '~/resources/components/ui/card/CardHeader.vue';
import CardTitle from '~/resources/components/ui/card/CardTitle.vue';
import Input from '~/resources/components/ui/input/Input.vue';
import Label from '~/resources/components/ui/label/Label.vue';


useHead({
    title: 'Login'
})
// const fields = useProperties();
const action = useForm({
    method: 'POST',
    url: '/auth/login',
    fields: {
        email: "",
        password: "",
    }
})
</script>

<template layout="auth">
    <div class="w-full flex flex-col gap-3">
        <CardHeader>
            <CardTitle class="text-2xl font-semibold text-center">Login</CardTitle>
        </CardHeader>
        <form class="flex flex-col items-start gap-4" @submit.prevent="action.submit">
            <div class="flex flex-col w-full gap-2">
                <Label for="email">Email</Label>
                <Input id="email" type="text" name="email" v-model="action.fields.email" required />
            </div>
            <div class="flex flex-col w-full gap-2">
                <Label for="password">Password</Label>
                <Input id="password" type="password" name="password" v-model="action.fields.password" required />
                <router-link href="#" class="text-sm text-right hover:underline">Forgot Password?</router-link>
            </div>
            <Button type="submit" class="w-full">Login</Button>
        </form>
        <div>
            <p class="text-center">Don't have an account? <router-link href="/auth/register"
                    class="text-blue-500 hover:underline">Register</router-link></p>
        </div>
    </div>
</template>
