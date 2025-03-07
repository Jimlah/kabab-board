<script setup lang="ts">
import { Bell, CircleUser, Home, LineChart, Menu, Package, Package2, Search, ShoppingCart, Users } from 'lucide-vue-next'

import { Badge } from '@/components/ui/badge'
import { Button } from '@/components/ui/button'
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card'
import { DropdownMenu, DropdownMenuContent, DropdownMenuItem, DropdownMenuLabel, DropdownMenuSeparator, DropdownMenuTrigger } from '@/components/ui/dropdown-menu'
import { Input } from '@/components/ui/input'
import { Sheet, SheetContent, SheetTrigger } from '@/components/ui/sheet'
import NavBar from '../components/custom/NavBar.vue'
import { toast } from 'vue-sonner'
import { Toaster } from '../components/ui/sonner';

const flash = useProperty('flash');
watch(flash, (value) => {
    if (value) {
        const type = Object.keys(value).find((key) => value[key as keyof App.Data.FlashData]);
        if (!type) {
            return;
        }
        toast(value[type as keyof App.Data.FlashData] || 'An error occurred', {})
    }
})

</script>

<template>
    <div class="w-full">
        <Toaster />
        <div class="grid min-h-screen w-full md:grid-cols-[220px_1fr] lg:grid-cols-[280px_1fr]">
            <NavBar />
            <div class="flex flex-col">
                <header class="flex h-14 items-center gap-4 border-b bg-muted/40 px-4 lg:h-[60px] lg:px-6">
                    <Sheet>
                        <SheetTrigger as-child>
                            <Button variant="outline" size="icon" class="shrink-0 md:hidden">
                                <Menu class="h-5 w-5" />
                                <span class="sr-only">Toggle navigation menu</span>
                            </Button>
                        </SheetTrigger>
                        <SheetContent side="left" class="flex flex-col">
                            <nav class="grid gap-2 text-lg font-medium">
                                <a href="#" class="flex items-center gap-2 text-lg font-semibold">
                                    <Package2 class="h-6 w-6" />
                                    <span class="sr-only">Acme Inc</span>
                                </a>
                                <a href="#"
                                    class="mx-[-0.65rem] flex items-center gap-4 rounded-xl px-3 py-2 text-muted-foreground hover:text-foreground">
                                    <Home class="h-5 w-5" />
                                    Dashboard
                                </a>
                                <a href="#"
                                    class="mx-[-0.65rem] flex items-center gap-4 rounded-xl bg-muted px-3 py-2 text-foreground hover:text-foreground">
                                    <ShoppingCart class="h-5 w-5" />
                                    Orders
                                    <Badge
                                        class="ml-auto flex h-6 w-6 shrink-0 items-center justify-center rounded-full">
                                        6
                                    </Badge>
                                </a>
                                <a href="#"
                                    class="mx-[-0.65rem] flex items-center gap-4 rounded-xl px-3 py-2 text-muted-foreground hover:text-foreground">
                                    <Package class="h-5 w-5" />
                                    Products
                                </a>
                                <a href="#"
                                    class="mx-[-0.65rem] flex items-center gap-4 rounded-xl px-3 py-2 text-muted-foreground hover:text-foreground">
                                    <Users class="h-5 w-5" />
                                    Customers
                                </a>
                                <a href="#"
                                    class="mx-[-0.65rem] flex items-center gap-4 rounded-xl px-3 py-2 text-muted-foreground hover:text-foreground">
                                    <LineChart class="h-5 w-5" />
                                    Analytics
                                </a>
                            </nav>
                            <div class="mt-auto">
                                <Card>
                                    <CardHeader>
                                        <CardTitle>Upgrade to Pro</CardTitle>
                                        <CardDescription>
                                            Unlock all features and get unlimited access to our
                                            support team.
                                        </CardDescription>
                                    </CardHeader>
                                    <CardContent>
                                        <Button size="sm" class="w-full">
                                            Upgrade
                                        </Button>
                                    </CardContent>
                                </Card>
                            </div>
                        </SheetContent>
                    </Sheet>
                    <div class="w-full flex-1">
                        <form>
                            <div class="relative">
                                <Search class="absolute left-2.5 top-2.5 h-4 w-4 text-muted-foreground" />
                                <Input type="search" placeholder="Search products..."
                                    class="w-full appearance-none bg-background pl-8 shadow-none md:w-2/3 lg:w-1/3" />
                            </div>
                        </form>
                    </div>
                    <DropdownMenu>
                        <DropdownMenuTrigger as-child>
                            <Button variant="secondary" size="icon" class="rounded-full">
                                <CircleUser class="h-5 w-5" />
                                <span class="sr-only">Toggle user menu</span>
                            </Button>
                        </DropdownMenuTrigger>
                        <DropdownMenuContent align="end">
                            <DropdownMenuLabel>My Account</DropdownMenuLabel>
                            <DropdownMenuSeparator />
                            <DropdownMenuItem>Settings</DropdownMenuItem>
                            <DropdownMenuItem>Support</DropdownMenuItem>
                            <DropdownMenuSeparator />
                            <DropdownMenuItem as-child>
                                <router-link :href="route('logout')">Logout</router-link>
                            </DropdownMenuItem>
                        </DropdownMenuContent>
                    </DropdownMenu>
                </header>
                <main class="flex flex-1 flex-col gap-4 p-4 lg:gap-6 lg:p-6">
                    <div class="flex items-center">
                        <h1 class="text-lg font-semibold md:text-2xl">
                            Dashboard
                        </h1>
                    </div>
                    <slot />
                </main>
            </div>
        </div>
    </div>
</template>
