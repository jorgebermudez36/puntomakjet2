<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";

const props = defineProps({
    supply: { type: Object },
});
</script>

<template>
    <AppLayout title="Stock">
        <div class="py-8">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg text-yellow-300"
                >
                    Here goes the content of the page stoks

                    <pre class="text-white">{{ supply }}</pre>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
