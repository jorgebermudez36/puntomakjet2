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
    // references: { type: Array },
    product: { type: Array },
});

const form = useForm({
    //reference_id: props.product.reference_id,
    name: props.product.name,
});
</script>

<template>
    <AppLayout title="Edit Product">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
                        <div
                            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-2"
                        >
                            <!-- <div>
                                <InputLabel
                                    for="reference_id"
                                    value="Reference"
                                    class="mx-3 my-4"
                                />
                                <div class="mt-1 mx-3">
                                    <SelectInput
                                        id="reference_id"
                                        :optionValue="references"
                                        v-model="form.reference_id"
                                        type="text"
                                        class="mt-1 block w-full"
                                    />
                                </div>
                            </div> -->
                            <div>
                                <InputLabel
                                    for="product"
                                    value="Product"
                                    class="mx-3 my-4"
                                />
                                <div class="mt-1 mx-3">
                                    <TextInput
                                        type="text"
                                        name="product"
                                        id="product"
                                        v-model="form.name"
                                        class="mt-1 block w-full"
                                    />
                                </div>
                            </div>
                        </div>
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
    </AppLayout>
</template>
