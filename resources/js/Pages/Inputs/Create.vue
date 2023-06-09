<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head, useForm, Link } from "@inertiajs/vue3";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import InputLabel from "@/Components/InputLabel.vue";
import SelectInput from "@/Components/SelectInput.vue";
import SelectProduct from "@/Components/SelectProduct.vue";
import SelectPres from "@/Components/SelectPres.vue";
import TextInput from "@/Components/TextInput.vue";

const form = useForm({
    reference_id: "",
    product_id: "",
    presentation_id: "",
    quantity: 0,
});

const props = defineProps({
    inputs: { type: Array },
    products: { type: Array },
    presentations: { type: Array },
});
</script>

<template>
    <Head title="Input Create" />
    <AppLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700 sm:rounded-lg border-gray"
                >
                    <div class="border-b border-gray-900/10 pb-12">
                        <InputLabel
                            for="entry_id"
                            value="Entreada de Producto"
                            class="font-serif italic text-lg font-medium tracking-wide text-gray-100 mb-4"
                        />
                        <div class="container">
                            <form
                                prevent="
                                    form.post(route('inputs.store'), {
                                        onSuccess: () => form.reset(),
                                    })
                                "
                            >
                                <div
                                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4"
                                >
                                    <div>
                                        <InputLabel
                                            for="reference_id"
                                            value="Reference"
                                        />
                                        <div class="mt-1">
                                            <SelectInput
                                                id="reference_id"
                                                :optionValue="products"
                                                v-model="form.reference_id"
                                                type="text"
                                                class="mt-1 block w-full"
                                            />
                                        </div>
                                    </div>

                                    <div>
                                        <InputLabel
                                            for="product_id"
                                            value="Product"
                                        />
                                        <div class="mt-1">
                                            <SelectProduct
                                                id="product_id"
                                                :optionValue="products"
                                                v-model="form.product_id"
                                                type="text"
                                                name="Product"
                                                class="mt-1 block w-full"
                                            />
                                        </div>
                                    </div>
                                    <div>
                                        <InputLabel
                                            for="presentation_id"
                                            value="Presentation"
                                        />
                                        <div class="mt-1">
                                            <SelectPres
                                                id="presentation_id"
                                                :optionValue="presentations"
                                                v-model="form.presentation_id"
                                                type="text"
                                                name="Presentation"
                                                class="mt-1 block w-full"
                                            />
                                        </div>
                                    </div>

                                    <div>
                                        <InputLabel
                                            for="cantidad"
                                            value="Cantidad"
                                        />
                                        <div class="mt-1">
                                            <TextInput
                                                type="number"
                                                name="cantidad"
                                                id="cantidad"
                                                v-model="form.quantity"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <PrimaryButton
                            class="mx-3 my-4 me-2 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                            @click="
                                form.post(route('inputs.store'), {
                                    onSuccess: () => form.reset(),
                                })
                            "
                            >Save</PrimaryButton
                        >
                        <SecondaryButton class="mx-3 my-4 text-2xl font-black">
                            <Link :href="route('inputs.index')">Cancel</Link>
                        </SecondaryButton>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
