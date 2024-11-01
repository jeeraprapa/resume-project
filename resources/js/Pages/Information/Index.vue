<script setup>
import BaseLayout from '@/Layouts/Base.vue';
import { Link } from "@inertiajs/vue3";
defineProps({
    information: {
        type: Array,
        required: true,
    },
});

const headers = [
    'name',
    'job',
    'email',
    'phone',
    'address',
    'description',
    'github',
    'status',
];
</script>

<template>
    <BaseLayout>
        <div class="flex items-center justify-center pb-6">
            <h1 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900 w-full">
                Information
                <span class="float-right">
                    <Link href="/information/create" class="relative isolate inline-flex items-center justify-center gap-x-2 rounded-lg border text-base/6 font-semibold px-3 py-2 bg-[#000000] text-white">Add Information</Link>
                </span>
            </h1>
        </div>
        <table class="min-w-full leading-normal">
            <thead>
            <tr>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider" v-for="header in headers" :key="header">
                    {{ header }}
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Action</th>
            </tr>
            </thead>
            <tbody>
            <tr class="hover:bg-gray-100 transition-colors duration-200" v-for="info in information" :key="info.id">
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ info.name }}</td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ info.job }}</td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ info.email }}</td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ info.phone }}</td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ info.address }}</td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ info.description }}</td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ info.github }}</td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                      <span aria-hidden="true" class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                      <span class="relative">{{ info.status }}</span>
                    </span>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">

                </td>
            </tr>
            </tbody>
        </table>
    </BaseLayout>
</template>


<style scoped>

</style>
