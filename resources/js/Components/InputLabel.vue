<script setup>
defineProps({
    value: String,
});
</script>

<template>
    <label
        class="font-serif italic text-lg font-medium tracking-wide text-gray-100 mb-3"
    >
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
