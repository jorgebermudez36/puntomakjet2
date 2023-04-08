<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { useForm, Link } from "@inertiajs/vue3";

const form = useForm({
    presentation: "",
});
</script>

<template>
    <AppLayout title="Create">
        <template #header>
            <h2
                class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
            >
                Create
            </h2>
        </template>
        <div class="py-8">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg py-2"
                >
                    <h2
                        class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4"
                    >
                        Presentation
                    </h2>
                    <form
                        @sbumit.prevent="
                            ($event) => form.post(route('presentations.store'))
                        "
                    >
                        <InputLabel name="presentation" label="Presentation" />
                        <TextInput
                            type="text"
                            id="presentation"
                            v-model="form.presentation"
                            class="w-full mt-1 text-lg text-gray-900 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-900 focus:ring-opacity-50 mb-4"
                        />
                        <InputError
                            v-if="form.errors.presentation"
                            :message="form.errors.presentation"
                        />

                        <PrimaryButton
                            ><i class="fa-solid fa-save"></i>Save</PrimaryButton
                        >
                    </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
