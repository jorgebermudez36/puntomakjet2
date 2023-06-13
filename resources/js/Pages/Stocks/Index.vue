<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Swal from "sweetalert2";
import DangerButton from "@/Components/DangerButton.vue";
import Paginate from "@/Components/Paginate.vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    supplies: { type: Array, required: true },
});

const form = useForm({
    supply: "",
});

const deletesupply = (id, supplies) => {
    const alerta = Swal.mixin({
        alerta: true,
        position: " ",
        showConfirmButton: true,
        timer: 9000,
        timerProgressBar: true,
        didOpen: (alerta) => {
            alerta.addEventListener("mouseenter", Swal.stopTimer);
            alerta.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });

    alerta
        .fire({
            title: "Are you sure you want to delete " + supplies + "?",
            icon: "question",
            showCancelButton: true,
            confirmButtonText:
                '<i class="fa-solid fa-check"></i> Yes, delete it!',
            cancelButtonText: '<i class="fa-solid fa-ban"></i> No, cancel!',
        })
        .then((result) => {
            if (result.isConfirmed) {
                form.delete(route("stocks.destroy", id));
            }
        });
};
</script>

<template>
    <AppLayout title="Stock">
        <div class="py-8">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <table
                    class="border-double border-2 rounded border-sky-500 table-fixed w-full"
                >
                    <thead
                        class="border aspect-auto border-gray-400 w-auto self-auto bg-gray-50 text-center"
                    >
                        <tr>
                            <th
                                scope="col"
                                class="w-1/2 px-4 py-2 text-md font-medium text-gray-500 upper tracking-wider"
                            >
                                Reference
                            </th>
                            <th
                                scope="col"
                                class="w-1/2 px-4 py-2 text-md font-medium text-gray-500 upper tracking-wider"
                            >
                                Products
                            </th>
                            <th
                                scope="col"
                                class="w-1/2 px-4 py-2 text-md font-medium text-gray-500 upper tracking-wider"
                            >
                                Presentation
                            </th>

                            <th
                                scope="col"
                                class="w-1/2 px-4 py-2 text-md font-medium text-gray-500 upper tracking-wider"
                            >
                                Stock
                            </th>

                            <th
                                scope="col"
                                class="w-1/4 px-4 py-2 text-md font-medium text-gray-500 upper tracking-wider"
                            >
                                Delete
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-slate-700">
                        <tr v-for="supply in supplies.data" :key="supply.id">
                            <td
                                class="px-4 py-1 border border-gray-400 divide-y divide-slate-500 text-center"
                            >
                                {{ form.reference_id }}
                            </td>
                            <td
                                class="px-4 py-1 border border-gray-400 divide-y divide-slate-500 text-center"
                            >
                                {{ form.product_id }}
                            </td>
                            <td
                                class="px-4 py-1 border border-gray-400 divide-y divide-slate-500 text-center"
                            >
                                {{ form.presentation_id }}
                            </td>
                            <td
                                class="px-4 py-1 border border-gray-400 divide-y divide-slate-500 text-center"
                            >
                                {{ form.Stock }}
                            </td>

                            <td
                                class="px-4 py-1 border border-gray-400 divide-y divide-slate-500 text-center"
                            >
                                <DangerButton
                                    @click="($event) => deletesupply(supply.id)"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24"
                                        fill="CurrentColor"
                                        class="w-5 h-5"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                </DangerButton>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <Paginate :pagination="supplies" />
            </div>
        </div>
    </AppLayout>
</template>
