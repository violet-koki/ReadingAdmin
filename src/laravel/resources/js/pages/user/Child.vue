<script setup>
import { stringifyQuery } from 'vue-router';


const naruto = defineProps({
    message: String
});
</script>

<template>
    <div>
        <p>{{ message }}</p>
    </div>
</template>