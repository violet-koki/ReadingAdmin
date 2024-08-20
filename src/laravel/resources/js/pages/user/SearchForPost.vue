<script setup lang="ts">
import { reactive } from 'vue'
import { useRouter } from 'vue-router';
import apiClient from './../../libs/apiClient';
import { ref } from 'vue';
import axios from 'axios';

interface Book {
    title: string;
    authors: string[];
    publishedDate: string;
    image: string;
}
const searchQuery = ref('');
const books = ref<Book[]>([]);
const isLoading = ref(false)
const router = useRouter();
const searchBooks = async () => {
    if (!searchQuery.value) return
    isLoading.value = true
    try {
        const response = await axios.get('https://www.googleapis.com/books/v1/volumes', {
                params: {
                    q: searchQuery.value,
                    key: '',
                    maxResults: 20,
                }
            })

        books.value = response.data.items.map((item: any) => ({
            title: item.volumeInfo.title,
            authors: item.volumeInfo.authors || ['Unknown'],
            publishedDate: item.volumeInfo.publishedDate || 'Unknown',
            image: item.volumeInfo.imageLinks?.thumbnail
        }))
    } catch (error) {
        console.error('Error fetching books:', error)
    } finally {
        isLoading.value = false;
    }
}

const selectBook = (book: Book) => {
    router.push({
        name: 'NewPost',
        query: {
            title: book.title,
            authors: book.authors.join(', '),
            publishedDate: book.publishedDate,
            image: book.image
        }
    });
};

</script>
<template>
    <div>
        <BRow>
            <BCard>
                <BCardHeader class="align-items-center d-flex light-blue-bg">
                    投稿したい書籍を検索
                </BCardHeader>
                <BCardBody>
                    <input v-model="searchQuery" @keyup.enter="searchBooks" placeholder="書籍名">
                    <button @click="searchBooks" :disabled="isLoading">検索</button>

                    <div v-if="isLoading">Loading...</div>

                    <BCard v-else>
                        <BCardText v-for="book in books" :key="book.title">
                            <h4>{{ book.title }}</h4>
                            <p>著者: {{ book.authors.join(', ') }}</p>
                            <p>出版日: {{ book.publishedDate }}</p>
                            <img v-if="book.image" :src="book.image"></img>
                            <BButton class="align-bottom"@click="selectBook(book)">
                                選択
                            </BButton>
                        </BCardText>

                    </BCard>
                </BCardBody>
            </BCard>
        </BRow>
    </div>
</template>
<style scoped>
.light-blue-bg {
    background-color: #DDFFFF
}
</style>