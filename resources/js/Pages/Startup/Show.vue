<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';

import { Inertia } from '@inertiajs/inertia'
import { defineProps } from 'vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
// import route from 'ziggy';
const props = defineProps(['startup','donations']);


function donate() {
    // console.log(route('donations.create'));
    Inertia.visit(route('donate',props.startup.id))
}

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{startup.name}}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="capitalize">name : <span class="font-bold">{{ props.startup.name ??'Not available' }} </span></div>
                        <div class="capitalize">sector : <span class="font-bold">{{ props.startup.sector ??'Not available' }} </span></div>
                        <div class="capitalize">ceo : <span class="font-bold">{{ props.startup.ceo ??'Not available' }} </span></div>
                        <div class="capitalize">address : <span class="font-bold">{{ props.startup.address ??'Not available' }} </span></div>
                        <div class="capitalize">email : <span class="font-bold">{{ props.startup.email ??'Not available' }} </span></div>
                        <div class="capitalize">phone : <span class="font-bold">{{ props.startup.phone ??'Not available' }} </span></div>
                        <div class="capitalize">product : <span class="font-bold">{{ props.startup.product ??'Not available' }} </span> </div>
                    </div>

                    <PrimaryButton class="ml-4" @click="donate()">
                                    Donate
                                </PrimaryButton>
                </div>
                <div class="text-xl">Donations </div>
                <div class="mt-4 bg-white rounded-md shadow overflow-x-auto">
                    <table class="w-full whitespace-nowrap">
                        <thead>
                            <tr class="text-left font-bold">
                                <th class="pb-4 pt-6 px-6">Name</th>
                                <th class="pb-4 pt-6 px-6">Amount</th>


                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="donation in donations.data" :key="startup.id"
                                class="hover:bg-gray-100 focus-within:bg-gray-100">
                                <td class="border-t">
                                    <Link class="flex items-center px-6 py-4 focus:text-indigo-500"
                                        :href="`/startups/${startup.id}/edit`">
                                    {{ donation.name ?? 'Anonymous user' }}
                                    </Link>
                                </td>
                                <td class="border-t">
                                    <Link class="flex items-center px-6 py-4"
                                        :href="`/startups/${startup.id}/edit`" tabindex="-1">
                                    {{ donation.amount }}
                                    </Link>
                                </td>
                                
                            </tr>
                            <tr v-if="donations.data.length === 0">
                                <td class="px-6 py-4 border-t flex justify-center w-full " colspan="4">No donations.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
