<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head,useForm } from '@inertiajs/inertia-vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { defineProps } from 'vue';
const props = defineProps(['startup']);

const form = useForm({
    startup_id: props.startup.id,
    amount: 0,
});

const submit = () => {
    form.post(route('donate.save',props.startup.id), {
       // onFinish: () => form.reset('password'),
    });
};

</script>

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Doante to {{startup.name}}
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
                                <InputLabel for="amount" value="Amount to donate" />
                                <TextInput id="amount" type="number" class="mt-1 block w-full" v-model="form.amount"
                                    required autofocus autocomplete="amount" />
                                <InputError class="mt-2" :message="form.errors.amount" />
                            </div>
                           

                           
                            <div class="flex items-center justify-end mt-4">
                              
                                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing">
                                    Donate
                                </PrimaryButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
