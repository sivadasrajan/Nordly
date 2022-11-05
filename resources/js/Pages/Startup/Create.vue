<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head,useForm } from '@inertiajs/inertia-vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';


const form = useForm({
    name: '',
    sector: '',
    ceo: '',
    address: '',
    email: '',
    phone: '',
    products: ''
});

const submit = () => {
    form.post(route('startups.store'), {
       // onFinish: () => form.reset('password'),
    });
};

</script>

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create a new Start-Up listing
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                            {{ status }}
                        </div>

                        <form @submit.prevent="submit">
                            <div>
                                <InputLabel for="name" value="Name of startup" />
                                <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name"
                                    required autofocus autocomplete="name" />
                                <InputError class="mt-2" :message="form.errors.name" />
                            </div>
                            <div>
                                <InputLabel for="ceo" value="Name of cheif executive" />
                                <TextInput id="ceo" type="text" class="mt-1 block w-full" v-model="form.ceo"
                                    required autofocus autocomplete="ceo" />
                                <InputError class="mt-2" :message="form.errors.ceo" />
                            </div>
                            <div>
                                <InputLabel for="sector" value="Sector of operation" />
                                <TextInput id="sector" type="text" class="mt-1 block w-full" v-model="form.sector"
                                    required autofocus autocomplete="sector" />
                                <InputError class="mt-2" :message="form.errors.sector" />
                            </div>
                            <div>
                                <InputLabel for="address" value="Address for communication" />
                                <TextInput id="address" type="text" class="mt-1 block w-full" v-model="form.address"
                                    required autofocus autocomplete="address" />
                                <InputError class="mt-2" :message="form.errors.address" />
                            </div>

                            <div>
                                <InputLabel for="email" value="Email" />
                                <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email"
                                    required autofocus autocomplete="email" />
                                <InputError class="mt-2" :message="form.errors.email" />
                            </div>
                            <div>
                                <InputLabel for="phone" value="Contact number" />
                                <TextInput id="phone" type="text" class="mt-1 block w-full" v-model="form.phone"
                                    required autofocus autocomplete="phone" />
                                <InputError class="mt-2" :message="form.errors.phone" />
                            </div>
                            <div>
                                <InputLabel for="products" value="Products and Services" />
                                <TextInput id="products" type="text" class="mt-1 block w-full" v-model="form.products"
                                    required autofocus autocomplete="products" />
                                <InputError class="mt-2" :message="form.errors.products" />
                            </div>

                           

                           
                            <div class="flex items-center justify-end mt-4">
                              
                                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing">
                                    Create new startup
                                </PrimaryButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
