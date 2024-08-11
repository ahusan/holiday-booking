<template>
    <authenticated-layout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white max-w-7xl mx-auto rounded-lg">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight my-3 mb-6">
                            Create Booking for: {{ packageDetails.title }}
                        </h2>
                        <div
                            v-if="$page.props.flash.success"
                            class="bg-green-500 text-white font-bold py-2 px-4 rounded mt-2"
                        >
                            {{ $page.props.flash.success }}
                        </div>
                        <div
                            v-if="$page.props.flash.error"
                            class="bg-red-500 text-white font-bold py-2 px-4 rounded mt-2"
                        >
                            {{ $page.props.flash.error }}
                        </div>
                        <div class="mb-10">
                            <form
                                class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2"
                                method="POST"
                                @submit.prevent="submit"
                            >
                                <input :value="$page.props.csrf_token" name="_token" type="hidden" />
                                <div class="px-4 py-6 sm:p-8">
                                    <div class="grid max-w-3xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 mx-auto">
                                        <div class="sm:col-span-3">
                                            <label
                                                class="block text-sm font-medium leading-6 text-gray-900"
                                                for="first-name"
                                                >First name</label
                                            >
                                            <div class="mt-2">
                                                <input
                                                    id="name"
                                                    :value="$page.props.auth.user.name"
                                                    autocomplete="name"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                    name="name"
                                                    type="text"
                                                />
                                            </div>
                                        </div>

                                        <div class="sm:col-span-3">
                                            <label class="block text-sm font-medium leading-6 text-gray-900" for="email"
                                                >Email address</label
                                            >
                                            <div class="mt-2">
                                                <input
                                                    id="email"
                                                    :value="$page.props.auth.user.email"
                                                    autocomplete="email"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                    name="email"
                                                    type="email"
                                                />
                                            </div>
                                        </div>

                                        <div class="sm:col-span-3">
                                            <label
                                                class="block text-sm font-medium leading-6 text-gray-900"
                                                for="phone-number"
                                                >Phone number</label
                                            >
                                            <div class="mt-2">
                                                <input
                                                    id="phone-number"
                                                    v-model="form.phone"
                                                    autocomplete="tel"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                    name="phone"
                                                    placeholder="Please enter a phone number"
                                                    required
                                                    type="tel"
                                                />
                                            </div>
                                        </div>

                                        <div class="sm:col-span-3">
                                            <label
                                                class="block text-sm font-medium leading-6 text-gray-900"
                                                for="guests"
                                                >Number of guests</label
                                            >
                                            <div class="mt-2">
                                                <input
                                                    id="guests"
                                                    v-model="form.guests"
                                                    :max="packageDetails.max_participants"
                                                    :min="1"
                                                    autocomplete="guests"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                    name="guests"
                                                    placeholder="Please enter a number"
                                                    type="number"
                                                />
                                            </div>
                                        </div>

                                        <div class="sm:col-span-3">
                                            <label
                                                class="block text-sm font-medium leading-6 text-gray-900"
                                                for="check-in"
                                                >Check-in date</label
                                            >
                                            <div class="mt-2">
                                                <input
                                                    id="check_in"
                                                    v-model="form.check_in"
                                                    :min="new Date().toISOString().split('T')[0]"
                                                    autocomplete="checkin"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                    name="check_in"
                                                    required
                                                    type="date"
                                                />
                                            </div>
                                        </div>
                                        <div class="col-span-full">
                                            <label
                                                class="block text-sm font-medium leading-6 text-gray-900"
                                                for="special-requests"
                                                >Special requests</label
                                            >
                                            <div class="mt-2">
                                                <textarea
                                                    id="special-requests"
                                                    v-model="form.special_requests"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                    name="special_requests"
                                                    rows="4"
                                                ></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8"
                                >
                                    <button
                                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                                        type="submit"
                                    >
                                        Book Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </authenticated-layout>
</template>
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { router, useForm, usePage } from '@inertiajs/vue3'
import { computed } from 'vue'

const page = usePage()
const packageDetails = computed(() => page.props.package)
const user = computed(() => page.props.auth.user)
const form = useForm({
    name: user.value.name,
    email: user.value.email,
    phone: null,
    guests: null,
    check_in: null,
    special_requests: null,
    package_id: packageDetails.value.id,
})

function submit() {
    router.post('/booknow', form)
}
</script>
