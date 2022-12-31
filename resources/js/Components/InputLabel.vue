<script setup>
defineProps(['value']);
</script>

<template>
    <label class="block text-sm text-black font-semibold">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
