<template>
    <authenticated-layout>
        Booking Confirms
        {{ booking }}
    </authenticated-layout>
</template>
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { usePage } from '@inertiajs/vue3'

const page = usePage()
const booking = page.props.booking
</script>
