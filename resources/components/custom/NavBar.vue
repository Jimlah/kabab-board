<script setup lang="ts">
import { Bell, ClipboardCheck, Home, LineChart, Package, Package2, ShoppingCart, Users } from 'lucide-vue-next';
import Button from '../ui/button/Button.vue';
import Badge from '../ui/badge/Badge.vue';

const projectCount = useProperty('security.project_count').value;
</script>

<template>
    <div class="hidden border-r bg-muted/40 md:block">
        <div class="flex h-full max-h-screen flex-col gap-2">
            <div class="flex h-14 items-center border-b px-4 lg:h-[60px] lg:px-6">
                <a href="/" class="flex items-center gap-2 font-semibold">
                    <Package2 class="h-6 w-6" />
                    <span class="">Acme Inc</span>
                </a>
                <Button variant="outline" size="icon" class="ml-auto h-8 w-8">
                    <Bell class="h-4 w-4" />
                    <span class="sr-only">Toggle notifications</span>
                </Button>
            </div>
            <div class="flex-1">
                <nav class="grid items-start px-2 text-sm font-medium lg:px-4">
                    <router-link :href="route('dashboard')"
                        class="flex items-center gap-3 rounded-lg px-3 py-2 text-muted-foreground transition-all hover:text-primary">
                        <Home class="h-4 w-4" />
                        Dashboard
                    </router-link>
                    <router-link :href="route('projects.index')"
                        class="flex items-center gap-3 rounded-lg px-3 py-2 text-muted-foreground transition-all hover:text-primary">
                        <ClipboardCheck class="h-4 w-4" />
                        Projects
                        <Badge class="ml-auto flex h-6 w-6 shrink-0 items-center justify-center rounded-full">
                            {{ projectCount }}
                        </Badge>
                    </router-link>
                    <a href="#"
                        class="flex items-center gap-3 rounded-lg bg-muted px-3 py-2 text-primary transition-all hover:text-primary">
                        <Package class="h-4 w-4" />
                        Products
                    </a>
                    <a href="#"
                        class="flex items-center gap-3 rounded-lg px-3 py-2 text-muted-foreground transition-all hover:text-primary">
                        <Users class="h-4 w-4" />
                        Customers
                    </a>
                    <a href="#"
                        class="flex items-center gap-3 rounded-lg px-3 py-2 text-muted-foreground transition-all hover:text-primary">
                        <LineChart class="h-4 w-4" />
                        Analytics
                    </a>
                </nav>
            </div>
        </div>
    </div>
</template>
