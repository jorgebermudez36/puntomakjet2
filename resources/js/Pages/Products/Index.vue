<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head } from "@inertiajs/vue3";
</script>

<template>
    <Head title="Product" />
    <App-Layout>
        <h1 class="text-xl font-bold mb-4 my-5 mx-5">Products</h1>
    </App-Layout>
</template>

<style>
.text-xl {
    font-size: 1.5rem;
    color: azure;
}
</style>
