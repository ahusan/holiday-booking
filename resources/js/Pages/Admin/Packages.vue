<template>
    <admin-layout>
        <div class="p-6 bg-white max-w-7xl mx-auto rounded-lg mt-2">
            <div class="flex items-center justify-between">
                <h1 class="text-3xl font-bold mb-6">Packages</h1>
                <PrimaryButton @click="router.get('/admin/packages/add')">Add New Package</PrimaryButton>
            </div>

            <div v-if="packages.length > 0" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div v-for="item in packages" :key="item.id" class="bg-white shadow-md rounded-lg overflow-hidden">
                    <img :src="item.image_url" alt="Package Image" class="w-full h-[250px] object-cover z-0" />
                    <div class="p-4 backdrop-blur-2xl z-50">
                        <h2 class="text-xl font-semibold mb-2">{{ item.title }}</h2>
                        <p class="text-gray-700 mb-4 h-[70px]">{{ item.description }}</p>
                        <div class="flex flex-col">
                            <p class="text-gray-900 font-medium mb-2">Destination: {{ item.destination }}</p>
                            <p class="text-gray-900 font-medium mb-2">Price: ${{ item.price.toFixed(2) }}</p>
                            <p class="text-gray-600 mb-4">Duration: {{ item.duration }} days</p>
                        </div>
                        <button
                            class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600"
                            @click="viewDetails(item.id)"
                        >
                            Edit Details
                        </button>
                    </div>
                </div>
            </div>
            <div v-else class="text-center text-gray-500">No packages available.</div>
        </div>
        <Drawer :show="showModal" :title="packageDetails.title" @close="closeModal">
            <form @submit.prevent="submitForm">
                <div class="w-full mx-auto">
                    <img :src="form.image_url" alt="Package Image" class="w-full h-[550px] object-cover rounded-md" />
                    <select
                        id="multiselect"
                        v-model="selectedOptions"
                        class="block w-full px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        multiple
                    >
                        <option v-for="option in options" :key="option" :value="option">
                            {{ option }}
                        </option>
                    </select>
                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700">Description</label>
                        <p class="text-gray-600 mt-2">{{ form.description }}</p>
                    </div>

                    <div class="flex items-center justify-between mt-4">
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
                        <ul class="list-disc list-inside text-gray-800 mt-2">
                            <li v-for="(inclusion, index) in form.inclusions" :key="index">
                                {{ inclusion }}
                            </li>
                        </ul>
                    </div>

                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700">Exclusions</label>
                        <ul class="list-disc list-inside text-gray-800 mt-2">
                            <li v-for="(exclusion, index) in form.exclusions" :key="index">
                                {{ exclusion }}
                            </li>
                        </ul>
                    </div>

                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700">Itinerary</label>
                        <ul class="list-disc list-inside text-gray-800 mt-2">
                            <li v-for="(detail, day) in form.itinerary" :key="day">{{ day }}: {{ detail }}</li>
                        </ul>
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
        </Drawer>
    </admin-layout>
</template>

<script setup>
import { router, useForm, usePage } from '@inertiajs/vue3'
import { computed, ref } from 'vue'
import Drawer from '@/Components/Drawer.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import AdminLayout from '@/Layouts/AdminLayout.vue'

const page = usePage()
const packages = computed(() => page.props.packages)
const showModal = ref(false)
const packageDetails = ref({})

function viewDetails(id) {
    showModal.value = true
    packageDetails.value = page.props.packages.find((p) => p.id === id)
}

const closeModal = () => {
    showModal.value = false
}
const form = useForm({
    package_id: packageDetails.id,
    description: packageDetails.description,
    destination: packageDetails.destination,
    price: packageDetails.price,
    duration: packageDetails.duration,
    inclusions: packageDetails.inclusions,
    exclusions: packageDetails.exclusions,
    itinerary: packageDetails.itinerary,
    max_participants: packageDetails.max_participants,
})

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

function submit() {
    router.post('/admin/packages/edit', form)
}
</script>
