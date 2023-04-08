<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { useForm, Link } from "@inertiajs/vue3";

const form = useForm({
    presentation: "",
});
</script>

<template>
    <App-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Presentation
            </h2>
        </template>

        <div class="py-10">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg"
                >
                    <div class="max-w-4xl mx-auto sm:p-4 lg:p-6">
                        <h1
                            class="font-semibold text-3xl text-gray-800 dark:text-gray-200 leading-tight mb-1"
                        >
                            Presentation
                        </h1>
                        <form
                            @sbumit.prevent="
                                ($event) =>
                                    form.post(route('presentations.store'))
                            "
                        >
                            <InputLabel
                                name="presentation"
                                label="Presentation"
                            />
                            <TextInput
                                type="text"
                                id="presentation"
                                v-model="form.presentation"
                                required
                                class="w-full mt-1 text-sm text-gray-900 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 mb-4"
                            />

                            <InputError
                                v-if="form.errors.presentation"
                                :message="form.errors.presentation"
                            />

                            <PrimaryButton type="submit"
                                ><i class="fa-solid fa-save"></i
                                >Save</PrimaryButton
                            >
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </App-layout>
</template>
