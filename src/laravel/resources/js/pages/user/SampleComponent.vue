<script setup>
import { stringifyQuery } from 'vue-router';

const props = defineProps({
    name: String,
    age: Number
});

</script>

<template>
    <div>
        <p>名前： {{ props.name }}</p>
        <p>年齢: {{ props.age }}</p>
    </div>
</template>