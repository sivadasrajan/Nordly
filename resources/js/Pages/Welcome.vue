<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link, useForm } from '@inertiajs/inertia-vue3';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { defineProps } from 'vue';
import { Inertia } from '@inertiajs/inertia'
const showingNavigationDropdown = ref(false);
const props = defineProps(['startups', 'filters']);
const form = useForm({
    search: ''
})

const search = () => {
    form.post(route('startups.search'));
}
const join = () => {
    Inertia.visit(route('applications.create'));
}
</script>

<template>
    <div>
        <div class="min-h-screen bg-gray-100">
            <nav class="bg-white border-b border-gray-100">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center">
                                <Link :href="route('dashboard')">
                                <ApplicationLogo class="block h-9 w-auto" />
                                </Link>
                            </div>

                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <NavLink :href="route('dashboard')" :active="route().current('dashboard')">
                                    Dashboard
                                </NavLink>
                                <NavLink :href="route('startups.index')" :active="route().current('startups.index')">
                                    Startups
                                </NavLink>
                                <NavLink :href="route('donations.index')" :active="route().current('donations.index')">
                                    Payments
                                </NavLink>
                            </div>
                        </div>
                        <div class="flex justify-center float-right">
                            <PrimaryButton class="ml-4 mt-4" @click="join" style="height: 35px;">
                                Join
                            </PrimaryButton>
                        </div>

                       
                       
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div :class="{ 'block': showingNavigationDropdown, 'hidden': !showingNavigationDropdown }"
                    class="sm:hidden">
                    <div class="pt-2 pb-3 space-y-1">
                        <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                            Dashboard
                        </ResponsiveNavLink>

                        <ResponsiveNavLink :href="route('startups.index')" :active="route().current('startups.index')">
                            Startups
                        </ResponsiveNavLink>

                        <ResponsiveNavLink :href="route('donations.index')"
                            :active="route().current('donations.index')">
                            Donations
                        </ResponsiveNavLink>
                    </div>


                </div>
            </nav>

            <!-- Page Heading -->
            <header class="bg-white shadow" v-if="$slots.header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">

                </div>
            </header>

            <!-- Page Content -->
            <main>
                <div class="bg-white flex justify-center flex-col" style="height:40vh">
                    <div class="flex justify-center text-2xl  pt-20 font-bold text-slate-500">Where problems meet their
                        solutions</div>
                    <div class="flex justify-center text-slate-400">Start typing to find a service provider or startup
                    </div>
                    <div class="flex justify-center flex-row mt-12">
                        <TextInput id="name" type="text" class=" block " v-model="form.search"
                            style="width: 450px;height:45px" autofocus />
                        <PrimaryButton class="ml-4" style="height:45px" @click="search">
                            SEARCH
                        </PrimaryButton>
                    </div>

                    

                </div>
                <div class="bg-white rounded-md shadow overflow-x-auto mt-10 mx-10">
                        <table class="w-full whitespace-nowrap rounded-lg">
                            <thead>
                                <tr class="text-left font-bold">
                                    <th class="pb-4 pt-6 px-6">Name</th>
                                    <th class="pb-4 pt-6 px-6">City</th>
                                    <th class="pb-4 pt-6 px-6">Services</th>
                                    <th class="pb-4 pt-6 px-6" colspan="2">Phone</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="startup in startups.data" :key="startup.id"
                                    class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-4 focus:text-indigo-500"
                                            :href="`/startups/${startup.id}`">
                                        {{ startup.name }}
                                        </Link>
                                    </td>
                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-4" :href="`/startups/${startup.id}`"
                                            tabindex="-1">
                                        {{ startup.city }}
                                        </Link>
                                    </td>
                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-4" :href="`/startups/${startup.id}`"
                                            tabindex="-1">
                                        {{ startup.products }}
                                        </Link>
                                    </td>
                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-4" :href="`/startups/${startup.id}`"
                                            tabindex="-1">
                                        {{ startup.phone }}
                                        </Link>
                                    </td>
                                    <td class="w-px border-t">
                                        <Link class="flex items-center px-4" :href="`/startups/${startup.id}`"
                                            tabindex="-1">
                                        <icon name="cheveron-right" class="block w-6 h-6 fill-gray-400" />
                                        </Link>
                                    </td>
                                </tr>
                                <tr v-if="startups.data.length === 0">
                                    <td class="px-6 py-4 border-t flex justify-center w-full " colspan="4">No startups
                                        found.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
            </main>
        </div>
    </div>
</template>
