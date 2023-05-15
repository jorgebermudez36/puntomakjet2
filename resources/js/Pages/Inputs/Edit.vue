<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { useForm, Link, Head } from "@inertiajs/vue3";

const props = defineProps({
    input: { type: Object },
});

const form = useForm({
    input: props.input.input,
});
</script>

<template>
    <Head title="Edit Input" />
    <AppLayout>
        <div class="py-8 max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-white dark:bg-gray-600 overflow-hidden shadow-xl sm:rounded-lg"
            >
                <FormSection title />
                <form
                    @submit.prevent="
                        form.patch(route('inputs.update', input.id), {
                            onSuccess: () => form.reset(),
                        })
                    "
                >
                    <Label
                        for="presentation"
                        class="font-sans text-lg font-medium text-gray-900 mx-3"
                        value="Presentation"
                    />
                    <br />
                    <textarea
                        v-model="form.input"
                        class="w-11/12 mx-3 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    ></textarea>
                    <InputError
                        class="mt-2 mx-3"
                        message="This field is required"
                        :errors="form.errors.input"
                    />

                    <PrimaryButton class="mx-3 my-4">Save</PrimaryButton>
                    <SecondaryButton class="mx-3 my-4">
                        <Link :href="route('inputs.index')"
                            >Cancel</Link
                        ></SecondaryButton
                    >
                </form>
            </div>
        </div>
    </AppLayout>
</template>
