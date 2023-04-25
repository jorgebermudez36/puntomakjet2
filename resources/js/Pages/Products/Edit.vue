<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import { useForm, Link, Head } from "@inertiajs/vue3";

const props = defineProps({
    product: { type: Object },
});

const form = useForm({
    reference: props.product.reference,
    product: props.product.product,
});
</script>

<template>
    <Head title="Edit Product" />
    <App-Layout>
        <div class="py-12">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white dark:bg-slate-500 overflow-hidden shadow-xl sm:rounded-lg"
                >
                    <form
                        @submit.prevent="
                            form.patch(route('products.update', product.id), {
                                onSuccess: () => form.reset(),
                            })
                        "
                    >
                        <InputLabel
                            for="reference"
                            class="font-sans text-lg font-medium text-gray-900 mx-3"
                            value="Reference"
                        />
                        <TextInput
                            v-model="form.reference"
                            class="w-11/12 mx-3 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        />
                        <InputError
                            class="mt-2 mx-3"
                            message="This field is required"
                            :errors="form.errors.reference"
                        />
                        <InputLabel
                            for="product"
                            class="font-sans text-lg font-medium text-gray-900 mx-3"
                            value="Product"
                        />
                        <TextInput
                            v-model="form.product"
                            class="w-11/12 mx-3 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        />
                        <InputError
                            class="mt-2 mx-3"
                            message="This field is required"
                            :errors="form.errors.product"
                        />
                        <PrimaryButton class="mx-3 my-4">Save</PrimaryButton>
                        <SecondaryButton class="mx-3 my-4">
                            <Link :href="route('products.index')">Cancel</Link>
                        </SecondaryButton>
                    </form>
                </div>
            </div>
        </div>
    </App-Layout>
</template>
