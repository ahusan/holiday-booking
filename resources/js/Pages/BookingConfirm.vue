<template>
    <authenticated-layout>
        <div class="py-12">
            <div
                class="max-w-7xl mx-auto sm:px-6 lg:px-8"
                data-aos="fade-up"
                data-aos-duration="1000"
                data-aos-once="true"
            >
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white max-w-7xl mx-auto rounded-lg">
                        You have succesfully created Booking Confirms.
                    </div>
                </div>
            </div>
        </div>
    </authenticated-layout>
</template>
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { usePage } from '@inertiajs/vue3'

const page = usePage()
const booking = page.props.booking
</script>
