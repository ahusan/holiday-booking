<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, usePage } from '@inertiajs/vue3'
import { computed, ref } from 'vue'
import Drawer from '@/Components/Drawer.vue'

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
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white max-w-7xl mx-auto rounded-lg mt-2">
                        <h1 class="text-3xl font-bold mb-6">Featured Packages</h1>
                        <div v-if="packages.length > 0" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <div
                                v-for="item in packages"
                                :key="item.id"
                                class="bg-white shadow-md rounded-lg overflow-hidden"
                            >
                                <img
                                    :src="item.image_url"
                                    alt="Package Image"
                                    class="w-full h-[250px] object-cover z-0"
                                />
                                <div class="p-4 backdrop-blur-2xl z-50">
                                    <h2 class="text-xl font-semibold mb-2">{{ item.title }}</h2>
                                    <p class="text-gray-700 mb-4 h-[70px]">{{ item.description }}</p>
                                    <div class="flex flex-col">
                                        <p class="text-gray-900 font-medium mb-2">
                                            Destination: {{ item.destination }}
                                        </p>
                                        <p class="text-gray-900 font-medium mb-2">
                                            Price: ${{ item.price.toFixed(2) }}
                                        </p>
                                        <p class="text-gray-600 mb-4">Duration: {{ item.duration }} days</p>
                                    </div>
                                    <button
                                        class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600"
                                        @click="viewDetails(item.id)"
                                    >
                                        View Details
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div v-else class="text-center text-gray-500">No packages available.</div>
                    </div>
                    <Drawer :show="showModal" :title="packageDetails.title" @close="closeModal">
                        <div class="w-full mx-auto">
                            <img
                                :src="packageDetails.image_url"
                                alt="Package Image"
                                class="w-full h-64 object-cover rounded-md"
                            />
                            <p class="text-gray-600 mt-2">{{ packageDetails.description }}</p>

                            <div class="flex items-center justify-between mt-4">
                                <div>
                                    <h2 class="text-xl font-semibold">Destination</h2>
                                    <p class="text-gray-800">{{ packageDetails.destination }}</p>
                                </div>
                                <div class="flex flex-col items-start justify-start w-1/2">
                                    <h2 class="text-xl font-semibold">Price</h2>
                                    <p class="text-gray-800">${{ packageDetails.price }}</p>
                                </div>
                            </div>

                            <div class="mt-6">
                                <h2 class="text-xl font-semibold">Duration</h2>
                                <p class="text-gray-800">{{ packageDetails.duration }} days</p>
                            </div>

                            <div class="mt-6">
                                <h2 class="text-xl font-semibold">Inclusions</h2>
                                <ul class="list-disc list-inside text-gray-800">
                                    <li v-for="(inclusion, index) in packageDetails.inclusions" :key="index">
                                        {{ inclusion }}
                                    </li>
                                </ul>
                            </div>

                            <div class="mt-6">
                                <h2 class="text-xl font-semibold">Exclusions</h2>
                                <ul class="list-disc list-inside text-gray-800">
                                    <li v-for="(exclusion, index) in packageDetails.exclusions" :key="index">
                                        {{ exclusion }}
                                    </li>
                                </ul>
                            </div>

                            <div class="mt-6">
                                <h2 class="text-xl font-semibold">Itinerary</h2>
                                <ul class="list-disc list-inside text-gray-800">
                                    <li v-for="(detail, day) in packageDetails.itinerary" :key="day">
                                        {{ day }}: {{ detail }}
                                    </li>
                                </ul>
                            </div>

                            <div class="mt-6 mb-6">
                                <h2 class="text-xl font-semibold">Max Participants</h2>
                                <p class="text-gray-800">{{ packageDetails.max_participants }}</p>
                            </div>
                        </div>
                        <form>
                            <div class="flex flex-col items-center w-full rounded-2xl shadow-2xl p-2">
                                <h1 class="text-xl">Book Now</h1>
                                <div class="flex items-center">
                                    <label class="block text-sm font-medium leading-6 text-gray-900" for="email"
                                        >Date</label
                                    >
                                    <input class="form-input appearance-none rounded-2xl" type="date" />
                                </div>
                            </div>
                        </form>
                    </Drawer>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
