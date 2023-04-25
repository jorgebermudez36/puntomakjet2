<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import { useForm, Link, Head } from "@inertiajs/vue3";

const form = useForm({
    reference: "",
    product: "",
});
</script>

<template>
    <Head title="Create Product" />
    <App-Layout>
        <div class="py-12">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white dark:bg-slate-500 overflow-hidden shadow-xl sm:rounded-lg"
                >
                    <form
                        @submit.prevent="
                            form.post(route('products.store'), {
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
                            placeholder="Type the reference here..."
                            class="w-11/12 mx-3 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        />
                        <InputLabel
                            for="product"
                            class="font-sans text-lg font-medium text-gray-900 mx-3"
                            value="Product"
                        />
                        <TextInput
                            v-model="form.product"
                            placeholder="Type your product here..."
                            class="w-11/12 mx-3 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
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
