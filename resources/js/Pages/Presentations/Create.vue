<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import InputLabel from "@/Components/InputLabel.vue";
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
        <div class="md:container md:mx-auto px-6 py-6">
            <div
                class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg"
            >
                <form
                    @submit.prevent="
                        form.post(route('presentations.store'), {
                            onSuccess: () => form.reset(),
                        })
                    "
                >
                    <InputLabel
                        for="presentation"
                        class="font-sans text-lg font-medium text-gray-900 mx-3"
                        value="Presentation"
                    />
                    <br />
                    <textarea
                        v-model="form.presentation"
                        placeholder="Type your presentation here..."
                        class="w-11/12 mx-3 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    ></textarea>
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
        <!-- <FormSection title="Create" description="Create a new presentation">
            <template #form>
                <div class="">
                    
                    <TextInput
                        class="mt-1 w-full"
                        id="presentation"
                        type="text"
                        v-model="form.presentation"
                    />
                    <InputError
                        message="This field is required"
                        :errors="form.errors.presentation"
                    />
                </div>
            </template>
            <template #actions>
                <Link
                    class="my-1.5 text-right inline-block w-full sm:w-auto px-3 py-2 bg-gray-600 text-sm font-medium text-white rounded-lg shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500"
                    :href="route('presentations.index')"
                >
                    Cancel
                </Link>
                <PrimaryButton
                    class="my-1.5 text-right inline-block w-full sm:w-auto px-3 py-2 bg-green-600 text-sm font-medium text-white rounded-lg shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                    @click="form.post(route('presentations.store'))"
                >
                    Create
                </PrimaryButton>
            </template>
        </FormSection> -->
    </AppLayout>
</template>
