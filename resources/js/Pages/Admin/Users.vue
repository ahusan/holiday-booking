<template>
    <admin-layout>
        <Head title="Users" />
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="border-b border-gray-200 bg-white px-4 py-5 sm:px-6">
                            <div class="-ml-4 -mt-2 flex flex-wrap items-center justify-between sm:flex-nowrap">
                                <div class="ml-4 mt-2">
                                    <h3 class="text-base font-semibold leading-6 text-gray-900">Users</h3>
                                </div>
                                <div class="ml-4 mt-2 flex-shrink-0">
                                    <a
                                        :href="'admin/user/edit'"
                                        class="relative inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                                        type="button"
                                    >
                                        Create new user
                                    </a>
                                </div>
                            </div>
                            <ul class="divide-y divide-gray-100" role="list">
                                <li
                                    v-for="person in users"
                                    :key="person.email"
                                    class="relative flex justify-between gap-x-6 py-5"
                                >
                                    <div class="flex items-center min-w-0 gap-x-4">
                                        <UserIcon class="text-md h-10 w-10 text-gray-500 border-2 rounded-2xl p-1" />
                                        <div class="min-w-0 flex-auto">
                                            <p class="text-sm font-semibold leading-6 text-gray-900">
                                                <a :href="'/admin/user/' + person.id">
                                                    <span class="absolute inset-x-0 -top-px bottom-0" />
                                                    {{ person.name }}
                                                </a>
                                            </p>
                                            <p class="mt-1 flex text-xs leading-5 text-gray-500">
                                                <a
                                                    :href="`mailto:${person.email}`"
                                                    class="relative truncate hover:underline"
                                                    >{{ person.email }}</a
                                                >
                                            </p>
                                        </div>
                                    </div>
                                    <div class="flex shrink-0 items-center gap-x-4">
                                        <div class="hidden sm:flex sm:flex-col sm:items-end">
                                            <p class="text-sm leading-6 text-gray-900">
                                                {{ person.is_admin ? 'Administrator' : 'User' }}
                                            </p>
                                            <p v-if="person.lastSeen" class="mt-1 text-xs leading-5 text-gray-500">
                                                Last seen
                                                <time :datetime="person.lastSeenDateTime">{{ person.lastSeen }}</time>
                                            </p>
                                            <div v-else class="mt-1 flex items-center gap-x-1.5">
                                                <div class="flex-none rounded-full bg-emerald-500/20 p-1">
                                                    <div class="h-1.5 w-1.5 rounded-full bg-emerald-500" />
                                                </div>
                                                <p class="text-xs leading-5 text-gray-500">Online</p>
                                            </div>
                                        </div>
                                        <ChevronRightIcon aria-hidden="true" class="h-5 w-5 flex-none text-gray-400" />
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
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { Head, usePage } from '@inertiajs/vue3'
import { computed } from 'vue'
import { ChevronRightIcon, UserIcon } from '@heroicons/vue/24/outline'

const page = usePage()
const users = computed(() => page.props.users)
</script>
