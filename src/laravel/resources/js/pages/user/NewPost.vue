<script setup lang="ts">
import { ref, onMounted, reactive } from 'vue';
import { useRoute } from 'vue-router';

const title = ref('');
const authors = ref('');
const publishedDate = ref('');
const image = ref('');

type newPostParams = {
    evaluate: number;
    content: string;
    book_id: number;
    reading_date: string;
}

const newPostInfo = reactive<newPostParams>({
    evaluate: '',
    content: '',
    book_id: '',
    reading_date: ''
})

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

    <form>
        <div class="mb-3">
            <div class="col-12 mb-2">
                <input id="nick_name" v-model="signUpInfo.nick_name" type="text" placeholder="評価" />
            </div>
        </div>
        <div class="mb-3">
            <div class="col-12 mb-2">
                <input id="nick_name" v-model="signUpInfo.nick_name" type="text" placeholder="感想" />
            </div>
        </div>
        <div class="mb-3">
            <div class="col-12 mb-2">
                <input id="nick_name" v-model="signUpInfo.nick_name" type="text" placeholder="" />
            </div>
        </div>
    </form>
</template>