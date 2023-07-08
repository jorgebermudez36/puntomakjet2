<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";
import SelectInput from "@/Components/SelectInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import { useForm, Link } from "@inertiajs/vue3";

const props = defineProps({
    input: { type: Object },
    references: { type: Array },
    products: { type: Array },
    presentations: { type: Array },
});

const form = useForm({
    reference_id: props.input.reference_id,
    product_id: props.input.product_id,
    presentation_id: props.input.presentation_id,
    quantity: props.input.quantity,
});
</script>

<template>
    <AppLayout title="Edit Input">
        <div class="py-8 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700 sm:rounded-lg border-gray"
            >
                <form
                    @submit.prevent="
                        form.patch(route('inputs.update', input.id), {
                            onSuccess: () => form.reset(),
                        })
                    "
                >
                    <div
                        class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4"
                    >
                        <div>
                            <InputLabel for="reference_id" value="Reference" />
                            <div class="mt-1">
                                <SelectInput
                                    id="reference_id"
                                    :optionValue="references"
                                    v-model="form.reference_id"
                                    type="text"
                                    class="mt-1 block w-full"
                                />
                            </div>
                        </div>

                        <div>
                            <InputLabel for="product_id" value="Product" />
                            <div class="mt-1">
                                <SelectInput
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
                                <SelectInput
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
                            <InputLabel for="cantidad" value="Cantidad" />
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

                    <InputError
                        class="mt-2 mx-3"
                        message="This field is required"
                        :errors="form.errors.input"
                    />
                    <PrimaryButton class="mx-3 my-4">Save</PrimaryButton>
                    <SecondaryButton class="mx-3 my-4">
                        <Link :href="route('inputs.index')">Cancel</Link>
                    </SecondaryButton>
                </form>
            </div>
        </div>
    </AppLayout>
</template>
