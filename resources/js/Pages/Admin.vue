<template>
    <admin-layout>
        <Head title="Admin -" />
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="mx-auto max-w-7xl px-6 lg:px-8">
                            <dl class="grid grid-cols-1 gap-x-8 gap-y-16 text-center lg:grid-cols-3">
                                <div
                                    v-for="stat in stats"
                                    :key="stat.id"
                                    class="mx-auto flex max-w-xs flex-col gap-y-4"
                                >
                                    <dt class="text-base leading-7 text-gray-600">{{ stat.name }}</dt>
                                    <dd
                                        class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl"
                                    >
                                        {{ stat.value }}
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </admin-layout>
</template>
<script lang="ts" setup>
import { Head, usePage } from '@inertiajs/vue3'
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { computed } from 'vue'

const page = usePage()
const packages = computed(() => page.props.packages)
const bookings = computed(() => page.props.bookings)
const users = computed(() => page.props.users)

const stats = [
    {
        id: 1,
        name: 'We have offered Packages',
        value: packages,
    },
    {
        id: 2,
        name: 'Customers have Booked',
        value: bookings,
    },
    {
        id: 3,
        name: 'Online Users',
        value: users,
    },
]
</script>
