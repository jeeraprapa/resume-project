<template>
    <BaseLayout>
        <div class="flex items-center justify-center pb-6">
            <h1 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900 w-full">
                Add Information
                <span class="float-right">
                    <Link href="/information" class="relative isolate inline-flex items-center justify-center gap-x-2 rounded-lg border text-base/6 font-semibold px-3 py-2 bg-[#000000] text-white">Back</Link>
                </span>
            </h1>
        </div>
        <span class="text-green-600" v-if="success">{{ success }}</span>
        <form @submit.prevent="submit">
            <div class="grid grid-cols-1 gap-6">
                <div class="grid grid-cols-1 gap-6">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" v-model="form.name" id="name" name="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    <span class="text-red-600" v-if="errors?.name">{{ errors.name }}</span>
                </div>
                <div class="grid grid-cols-1 gap-6">
                    <label for="job" class="block text-sm font-medium text-gray-700">Job</label>
                    <input type="text" v-model="form.job" id="job" name="job" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    <span class="text-red-600" v-if="errors?.job">{{ errors.job }}</span>
                </div>
                <div class="grid grid-cols-1 gap-6">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" v-model="form.email" id="email" name="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    <span class="text-red-600" v-if="errors?.email">{{ errors.email }}</span>
                </div>
                <div class="grid grid-cols-1 gap-6">
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                    <input type="text" v-model="form.phone" id="phone" name="phone" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    <span class="text-red-600" v-if="errors?.phone">{{ errors.phone }}</span>
                </div>
                <div class="grid grid-cols-1 gap-6">
                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                    <input type="text" v-model="form.address" id="address" name="address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    <span class="text-red-600" v-if="errors?.address">{{ errors.address }}</span>
                </div>
                <div class="grid grid-cols-1 gap-6">
                    <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-[#000000] hover:bg-[#000000] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </BaseLayout>
</template>

<script setup>
import BaseLayout from '@/Layouts/Base.vue';
import { Link,useForm } from "@inertiajs/vue3";
import { reactive, ref } from 'vue';

const errors = ref({})
const success = ref('')

const form = useForm({
    name: '',
    job: '',
    email: '',
    phone: '',
    address: ''
});

const submit = (e) => {
    axios.post('/information', form)
        .then(response => {
            success.value = response.data.message
            form.name = ''
            form.job = ''
            form.email = ''
            form.phone = ''
            form.address = ''
        })
        .catch(error => {
            errors.value = error.response.data.errors
        }
    );
}

</script>

<style scoped>

</style>
