<template>
    <TransitionRoot :show="show" as="template">
        <Dialog class="relative z-10" @close="show = false">
            <TransitionChild
                as="template"
                enter="ease-in-out duration-500"
                enter-from="opacity-0"
                enter-to="opacity-100"
                leave="ease-in-out duration-500"
                leave-from="opacity-100"
                leave-to="opacity-0"
            >
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
            </TransitionChild>

            <div class="fixed inset-0 overflow-hidden">
                <div class="absolute inset-0 overflow-hidden">
                    <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
                        <TransitionChild
                            as="template"
                            enter="transform transition ease-in-out duration-500 sm:duration-700"
                            enter-from="translate-x-full"
                            enter-to="translate-x-0"
                            leave="transform transition ease-in-out duration-500 sm:duration-700"
                            leave-from="translate-x-0"
                            leave-to="translate-x-full"
                        >
                            <DialogPanel class="pointer-events-auto w-screen max-w-5xl">
                                <div
                                    class="flex h-full flex-col overflow-y-scroll items-center bg-white py-6 shadow-xl"
                                >
                                    <div class="px-4 sm:px-6 w-full">
                                        <div class="flex items-center justify-between max-w-3xl mx-auto">
                                            <DialogTitle class="text-2xl font-semibold leading-6 text-gray-900"
                                                >{{ title }}
                                            </DialogTitle>
                                            <div class="ml-3 flex h-7 items-center">
                                                <button
                                                    class="relative rounded-md bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                                    type="button"
                                                    @click="show = false"
                                                >
                                                    <span class="absolute -inset-2.5" />
                                                    <span class="sr-only">Close panel</span>
                                                    <XMarkIcon aria-hidden="true" class="h-6 w-6" />
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="relative mt-6 flex-1 px-4 sm:px-6">
                                        <slot v-if="show" />
                                    </div>
                                </div>
                            </DialogPanel>
                        </TransitionChild>
                    </div>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>

<script setup>
import { computed, onMounted, onUnmounted, watch } from 'vue'
import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'
import { XMarkIcon } from '@heroicons/vue/24/outline'

const props = defineProps({
    title: String,
    show: {
        type: Boolean,
        default: false,
    },
    maxWidth: {
        type: String,
        default: '2xl',
    },
    closeable: {
        type: Boolean,
        default: true,
    },
})

const emit = defineEmits(['close'])

watch(
    () => props.show,
    () => {
        if (props.show) {
            document.body.style.overflow = 'hidden'
        } else {
            document.body.style.overflow = null
        }
    },
)

const close = () => {
    if (props.closeable) {
        emit('close')
    }
}

const closeOnEscape = (e) => {
    if (e.key === 'Escape' && props.show) {
        close()
    }
}

onMounted(() => document.addEventListener('keydown', closeOnEscape))

onUnmounted(() => {
    document.removeEventListener('keydown', closeOnEscape)
    document.body.style.overflow = null
})

const maxWidthClass = computed(() => {
    return {
        sm: 'sm:max-w-sm',
        md: 'sm:max-w-md',
        lg: 'sm:max-w-lg',
        xl: 'sm:max-w-xl',
        '2xl': 'sm:max-w-2xl',
    }[props.maxWidth]
})
</script>
