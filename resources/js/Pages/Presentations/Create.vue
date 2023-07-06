<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import { useForm, Link } from "@inertiajs/vue3";

const form = useForm({
    presentation: "",
});
</script>

<template>
    <AppLayout title="Create">
        <div class="py-8 max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-white dark:bg-gray-600 overflow-hidden shadow-xl sm:rounded-lg"
            >
                <form
                    @submit.prevent="
                        form.post(route('presentations.store'), {
                            onSuccess: () => form.reset(),
                        })
                    "
                >
                    <div class="flex flex-col mt-2 mx-3.5">
                        <InputLabel
                            for="presentation"
                            class="font-sans font-medium text-gray-200"
                            value="Presentation"
                        />
                        <TextInput
                            v-model="form.presentation"
                            class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        ></TextInput>
                    </div>
                    <!-- <div class="flex flex-col mt-4 mx-3.5">
                        <InputLabel
                            for="Quantity"
                            class="font-sans font-medium text-gray-200"
                            value="Quantity"
                        />
                        <TextInput
                            type="number"
                            v-model="form.quantity"
                            class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        ></TextInput>
                    </div> -->
                    <InputError
                        class="mt-2 mx-3"
                        message="This field is required"
                        :errors="form.errors.presentation"
                    />

                    <PrimaryButton class="mx-3 my-4">Save</PrimaryButton>
                    <SecondaryButton class="mx-3 my-4">
                        <Link :href="route('presentations.index')"
                            >Cancel</Link
                        ></SecondaryButton
                    >
                </form>
            </div>
        </div>
    </AppLayout>
</template>
