<script setup>
defineProps({
    value: String,
});
</script>

<template>
    <label
        class="font-serif italic text-2xl font-medium tracking-wide text-green-100 mb-3"
    >
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
