<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';

import { Inertia } from '@inertiajs/inertia'
import { defineProps } from 'vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
// import route from 'ziggy';
const props = defineProps(['startup']);


function donate() {
    // console.log(route('donations.create'));
    Inertia.visit(route('donations.create'))
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
            </div>
        </div>
    </AuthenticatedLayout>
</template>
