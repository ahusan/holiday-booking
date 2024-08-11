<template>
    <admin-layout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-4 px-4 lg:px-8">
                        <Head title="Create User -" />
                        <h1 class="my-2 text-lg">Create User</h1>
                        <form @submit.prevent="submit">
                            <div>
                                <InputLabel for="name" value="Name" />

                                <TextInput
                                    id="name"
                                    v-model="form.name"
                                    autocomplete="name"
                                    autofocus
                                    class="mt-1 block w-full"
                                    required
                                    type="text"
                                />

                                <InputError :message="form.errors.name" class="mt-2" />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="email" value="Email" />

                                <TextInput
                                    id="email"
                                    v-model="form.email"
                                    autocomplete="username"
                                    class="mt-1 block w-full"
                                    required
                                    type="email"
                                />

                                <InputError :message="form.errors.email" class="mt-2" />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="password" value="Password" />

                                <TextInput
                                    id="password"
                                    v-model="form.password"
                                    autocomplete="new-password"
                                    class="mt-1 block w-full"
                                    required
                                    type="password"
                                />

                                <InputError :message="form.errors.password" class="mt-2" />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="password_confirmation" value="Confirm Password" />

                                <TextInput
                                    id="password_confirmation"
                                    v-model="form.password_confirmation"
                                    autocomplete="new-password"
                                    class="mt-1 block w-full"
                                    required
                                    type="password"
                                />

                                <InputError :message="form.errors.password_confirmation" class="mt-2" />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <PrimaryButton
                                    :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing"
                                    class="ms-4"
                                >
                                    Create User
                                </PrimaryButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </admin-layout>
</template>
<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import InputLabel from '@/Components/InputLabel.vue'
import TextInput from '@/Components/TextInput.vue'
import InputError from '@/Components/InputError.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import { Head, router, useForm } from '@inertiajs/vue3'

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
})

const submit = () => {
    router.post('/admin/user/create', form)
}
</script>
