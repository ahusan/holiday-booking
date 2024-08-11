<template>
    <admin-layout>
        <div class="p-6 bg-white max-w-7xl mx-auto rounded-lg mt-2">
            <form @submit.prevent="submit">
                <div class="w-full mx-auto">
                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700">Description</label>
                        <p class="text-gray-600 mt-2">{{ form.description }}</p>
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        <div class="w-1/2 pr-2">
                            <label class="block text-sm font-medium text-gray-700">Title</label>
                            <input
                                v-model="form.title"
                                class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                type="text"
                            />
                        </div>
                        <div class="w-1/2 pr-2">
                            <label class="block text-sm font-medium text-gray-700">Destination</label>
                            <input
                                v-model="form.destination"
                                class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                type="text"
                            />
                        </div>
                        <div class="w-1/2 pl-2">
                            <label class="block text-sm font-medium text-gray-700">Price</label>
                            <input
                                v-model="form.price"
                                class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                type="text"
                            />
                        </div>
                    </div>

                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700">Duration (days)</label>
                        <input
                            v-model="form.duration"
                            class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            type="text"
                        />
                    </div>

                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700">Inclusions</label>
                        <select
                            id="multiselect"
                            v-model="form.inclusions"
                            class="block w-full px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            multiple
                        >
                            <option v-for="option in availableInclusions" :key="option" :value="option">
                                {{ option }}
                            </option>
                        </select>
                    </div>

                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700">Exclusions</label>
                        <select
                            id="multiselect"
                            v-model="form.exclusions"
                            class="block w-full px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            multiple
                        >
                            <option v-for="option in availableExclusions" :key="option" :value="option">
                                {{ option }}
                            </option>
                        </select>
                    </div>

                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700">Itinerary</label>
                        <select
                            id="multiselect"
                            v-model="form.itinerary"
                            class="block w-full px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            multiple
                        >
                            <option v-for="option in availableItinerary" :key="option" :value="option">
                                {{ option }}
                            </option>
                        </select>
                    </div>

                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700">Max Participants</label>
                        <input
                            v-model="form.max_participants"
                            class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            type="text"
                        />
                    </div>
                </div>
                <primary-button class="mx-auto my-3 w-full"> Save</primary-button>
            </form>
        </div>
    </admin-layout>
</template>
<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import { router, useForm } from '@inertiajs/vue3'
import { ref } from 'vue'

const form = useForm({
    title: '',
    description: '',
    destination: '',
    price: '',
    duration: '',
    inclusions: [],
    exclusions: [],
    itinerary: [],
    max_participants: '',
})

function submit() {
    router.post('/admin/packages/add', form, {})
}

const options = [
    'Parking',
    'Free Wifi',
    'Diving',
    '24-Hour Front Desk',
    'Gym',
    'Free Transportation',
    'Swimming Pools',
    'Fitness/Spa',
    'Family Rooms',
    'Room Service',
    'Non-Smoking Rooms',
    'Airport Shuttle',
    'Wheelchair Accessible',
    'Breakfast Included',
    'Laundry Service',
]
const availableInclusions = ref(['Accommodation', 'Meals', 'Transportation'])

const availableExclusions = ref(['Flight tickets', 'Personal expenses', 'Travel insurance'])

const availableItinerary = ref(['Day 1: Arrival and city tour', 'Day 2: Beach day', 'Day 3: Departure'])
</script>
