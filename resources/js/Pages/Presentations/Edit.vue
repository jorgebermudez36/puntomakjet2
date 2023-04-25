<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import { useForm, Link } from "@inertiajs/vue3";

const props = defineProps({ presentation: { type: Object } });

const form = useForm({
    presentation: props.presentation.presentation,
});
</script>

<template>
    <AppLayout title="Editar">
        <div class="md:container md:mx-auto px-6 py-6">
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
                    <textarea
                        v-model="form.presentation"
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
    </AppLayout>
</template>
