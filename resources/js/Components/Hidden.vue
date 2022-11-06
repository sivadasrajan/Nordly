<script setup>
import { onMounted, ref , defineProps } from 'vue';

const input = ref(null);
const props = defineProps(['name','value']);
</script>

<template>
    <input type="hidden" :value="value" :name="name" ref="input">
</template>
