<script setup lang="ts">
import Button from '~/resources/components/ui/button/Button.vue';
import Card from '~/resources/components/ui/card/Card.vue';
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

<template layout>
    <div class="w-full flex flex-col gap-3">
        Dashboard
    </div>
</template>
