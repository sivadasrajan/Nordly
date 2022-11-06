<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { defineProps } from 'vue';
 const props  = defineProps(['applications']);


</script>

<template>

    <Head title="Application"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Applications
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white rounded-md shadow overflow-x-auto">
                    <table class="w-full whitespace-nowrap">
                        <thead>
                            <tr class="text-left font-bold">
                                <th class="pb-4 pt-6 px-6">Name</th>
                                <th class="pb-4 pt-6 px-6">City</th>
                                <th class="pb-4 pt-6 px-6">Services</th>
                                <th class="pb-4 pt-6 px-6" colspan="2">Phone</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="application in applications.data" :key="application.id"
                                class="hover:bg-gray-100 focus-within:bg-gray-100">
                                <td class="border-t">
                                    <Link class="flex items-center px-6 py-4 focus:text-indigo-500"
                                        :href="`/applications/${application.id}/edit`">
                                    {{ application.name }}
                                    </Link>
                                </td>
                                <td class="border-t">
                                    <Link class="flex items-center px-6 py-4"
                                        :href="`/applications/${application.id}/edit`" tabindex="-1">
                                    {{ application.city }}
                                    </Link>
                                </td>
                                <td class="border-t">
                                    <Link class="flex items-center px-6 py-4"
                                        :href="`/applications/${application.id}/edit`" tabindex="-1">
                                    {{ application.products }}
                                    </Link>
                                </td>
                                <td class="border-t">
                                    <Link class="flex items-center px-6 py-4"
                                        :href="`/applications/${application.id}/edit`" tabindex="-1">
                                    {{ application.phone }}
                                    </Link>
                                </td>
                                <td class="w-px border-t">
                                    <Link class="flex items-center px-4"
                                        :href="`/applications/${application.id}/edit`" tabindex="-1">
                                    <icon name="cheveron-right" class="block w-6 h-6 fill-gray-400" />
                                    </Link>
                                </td>
                            </tr>
                            <tr v-if="applications.data.length === 0">
                                <td class="px-6 py-4 border-t flex justify-center w-full " colspan="4">No apllications found.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <pagination class="mt-6" :links="applications.links" />
            </div>
        </div>
    </AuthenticatedLayout>
</template>
