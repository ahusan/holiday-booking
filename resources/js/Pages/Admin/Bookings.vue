<template>
    <admin-layout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                    <div class="p-6 text-gray-900">
                        <div class="border-b border-gray-200 bg-white px-4 py-5 sm:px-6">
                            <div class="-ml-4 -mt-2 flex flex-wrap items-center justify-between sm:flex-nowrap">
                                <div class="ml-4 mt-2">
                                    <h3 class="text-base font-semibold leading-6 text-gray-900">Bookings</h3>
                                </div>
                            </div>
                            <ul class="divide-y divide-gray-100" role="list">
                                <li
                                    v-for="book in booking"
                                    :key="book.id"
                                    class="relative flex justify-between gap-x-6 py-5"
                                >
                                    <div class="flex items-center min-w-0 gap-x-4">
                                        <CalendarIcon
                                            class="text-md h-10 w-10 text-gray-500 border-2 rounded-2xl p-1"
                                        />
                                        <div class="min-w-0 flex-auto">
                                            <p class="text-sm font-semibold leading-6 text-gray-900">
                                                <a :href="route('admin.bookings.edit', { id: book.id })">
                                                    <span class="absolute inset-x-0 -top-px bottom-0" />
                                                    {{ book.package.title }}
                                                </a>
                                            </p>
                                            <p class="mt-1 flex text-xs leading-5 text-gray-500">
                                                <span class="font-medium mr-2 text-black">Start Date: </span>
                                                {{ book.start_date.split(' ')[0] }}
                                            </p>
                                            <p class="mt-1 flex text-xs leading-5 text-gray-500">
                                                <span class="font-medium mr-2 text-black">End Date: </span>
                                                {{ book.end_date.split(' ')[0] }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="flex items-center min-w-0">
                                        <div class="min-w-0 flex-auto">
                                            <p class="mt-1 flex text-xs leading-5 font-medium mr-2 text-black">
                                                Special Requests:
                                            </p>
                                            <p class="mt-1 flex text-xs leading-5 text-gray-500">
                                                {{ book.special_requests }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="flex shrink-0 items-center gap-x-4">
                                        <div class="hidden sm:flex sm:flex-col sm:items-end">
                                            <p class="text-xs leading-6 text-gray-900 flex-col">
                                                <span class="font-medium mr-2 text-black">Guests: </span>
                                                {{ book.guests }}
                                            </p>
                                            <p class="text-xs leading-6 text-gray-900">
                                                <span class="font-medium mr-2 text-black">Phone Number: </span>
                                                {{ book.phone }}
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </admin-layout>
</template>
<script setup>
import { usePage } from '@inertiajs/vue3'
import { CalendarIcon } from '@heroicons/vue/24/outline/index.js'
import AdminLayout from '@/Layouts/AdminLayout.vue'

const page = usePage()
const booking = page.props.bookings
</script>
