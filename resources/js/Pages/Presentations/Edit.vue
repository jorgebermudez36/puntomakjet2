<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import { useForm, Link } from "@inertiajs/vue3";

const props = defineProps({
    presentation: { type: Object },
});

const form = useForm({
    name: props.presentation.name,
});
</script>

<template>
    <AppLayout title="Edit Presentation">
        <div class="py-8 max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-white dark:bg-gray-600 overflow-hidden shadow-xl sm:rounded-lg"
            >
                <form
                    @submit.prevent="
                        form.patch(
                            route('presentations.update', presentation.id),
                            {
                                onSuccess: () => form.reset(),
                            }
                        )
                    "
                >
                    <InputLabel
                        for="presentation"
                        class="font-sans text-lg font-medium text-gray-900 mx-3"
                        value="Presentation"
                    />
                    <br />
                    <TextInput
                        v-model="form.name"
                        class="w-11/12 mx-3 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    ></TextInput>
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
