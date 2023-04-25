<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { useForm, Head, Link } from "@inertiajs/vue3";
import Swal from "sweetalert2";
import DangerButton from "@/Components/DangerButton.vue";
import PagForm from "@/Components/PagForm.vue";

const props = defineProps({
    products: { type: Object },
});

const form = useForm({
    product: " ",
    pagination: "",
});

const deleteproduct = (id, product) => {
    const alerta = Swal.mixin({
        alerta: true,
        position: "top-end",
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
            title: "Are you sure you want to delete " + product + "?",
            icon: "question",
            showCancelButton: true,
            confirmButtonText:
                '<i class="fa-solid fa-check"></i> Yes, delete it!',
            cancelButtonText: '<i class="fa-solid fa-ban"></i> No, cancel!',
        })
        .then((result) => {
            if (result.isConfirmed) {
                form.delete(route("products.destroy", id));
            }
        });
};
</script>

<template>
    <Head title="Product" />
    <App-Layout>
        <div class="py-8">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg"
                >
                    <Link
                        class="my-1.5 text-right inline-block w-full sm:w-auto px-3 py-2 bg-green-600 text-sm font-medium text-white rounded-lg shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                        :href="route('products.create')"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            fill="currentColor"
                            class="w-6 h-6 text-center"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M10.5 3A1.501 1.501 0 009 4.5h6A1.5 1.5 0 0013.5 3h-3zm-2.693.178A3 3 0 0110.5 1.5h3a3 3 0 012.694 1.678c.497.042.992.092 1.486.15 1.497.173 2.57 1.46 2.57 2.929V19.5a3 3 0 01-3 3H6.75a3 3 0 01-3-3V6.257c0-1.47 1.073-2.756 2.57-2.93.493-.057.989-.107 1.487-.15z"
                                clip-rule="evenodd"
                            />
                        </svg>
                        Create
                    </Link>

                    <table
                        class="border-double border-2 rounded border-sky-500 table-fixed w-full"
                    >
                        <thead
                            class="border aspect-auto border-gray-400 w-auto self-auto bg-gray-50 text-center"
                        >
                            <tr>
                                <th
                                    scope="col"
                                    class="w-1/5 px-4 py-2 text-md font-medium text-gray-500 upper tracking-wider"
                                >
                                    id
                                </th>
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
                                    class="w-1/4 px-4 py-2 text-md font-medium text-gray-500 upper tracking-wider"
                                >
                                    Edit
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
                            <tr
                                v-for="(product, i) in products"
                                :key="product.id"
                            >
                                <td
                                    class="px-4 py-1 border border-gray-400 divide-y divide-slate-500 text-center"
                                >
                                    {{ i + 1 }}
                                </td>
                                <td
                                    class="px-4 py-1 border border-gray-400 divide-y divide-slate-500 text-center"
                                >
                                    {{ product.reference }}
                                </td>
                                <td
                                    class="px-4 py-1 border border-gray-400 divide-y divide-slate-500 text-center"
                                >
                                    {{ product.product }}
                                </td>

                                <td
                                    class="px-4 py-1 border border-gray-400 divide-y divide-slate-500 text-center"
                                >
                                    <button class="text-center py-1">
                                        <Link
                                            :href="
                                                route(
                                                    'products.edit',
                                                    product.id
                                                )
                                            "
                                            ><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24"
                                                fill="green"
                                                class="w-6 h-6"
                                            >
                                                <path
                                                    d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z"
                                                />
                                            </svg>
                                        </Link>
                                    </button>
                                </td>
                                <td
                                    class="px-4 py-1 border border-gray-400 divide-y divide-slate-500 text-center"
                                >
                                    <DangerButton
                                        @click="
                                            ($event) =>
                                                deleteproduct(product.id)
                                        "
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
                    <PagForm :pagination="products" />
                </div>
            </div>
        </div>
    </App-Layout>
</template>

<style>
.text-xl {
    font-size: 1.5rem;
    color: azure;
}
</style>
