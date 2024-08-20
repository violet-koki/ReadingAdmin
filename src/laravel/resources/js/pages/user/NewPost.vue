<script setup lang="ts">
import { ref, onMounted } from 'vue';
import { useRoute } from 'vue-router';

const title = ref('');
const authors = ref('');
const publishedDate = ref('');
const image = ref('');

onMounted(() => {
    const route = useRoute();
    title.value = route.query.title as string;
    authors.value = route.query.authors as string;
    publishedDate.value = route.query.publishedDate as string;
    image.value = route.query.image as string;
});
</script>

<template>
    <div>
        <h1>{{ title }}</h1>
        <p>著者: {{ authors }}</p>
        <p>出版日: {{ publishedDate }}</p>
        <img :src="image" v-if="image"></img>
    </div>
</template>