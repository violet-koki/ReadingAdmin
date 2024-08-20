<script setup lang="ts">
import { ref } from 'vue';
import { useRouter } from 'vue-router';
import axios from 'axios';

interface Book {
    title: string;
    authors: string[];
    publishDate: string;
    image: string;
}

const searchQuery = ref('');
const books = ref<Book[]>([]);
const isLoading = ref(false);
const router = useRouter();

const searchBooks = async () => {
    if (!searchQuery.value) return;
    isLoading.value = true;
    try {
        const response = await axios.get('https://www.googleapis.com/books/v1/volumes', {
            params: {
                q: searchQuery.value,
                key: '',
                maxResults: 20,
            }
        });

        books.value = response.data.items.map((item: any) => ({
            title: item.volumeInfo.title,
            authors: item.volumeInfo.authors || ['Unknown'],
            publishedDate: item.volumeInfo.publishedDate || 'Unknown',
            image: item.volumeInfo.imageLinks?.thumbnail
        }));
    } catch (error) {
        console.error('Error fetching books:', error);
    } finally {
        isLoading.value = false;
    }
};

const selectBook = (book: Book) => {
    router.push({
        name: 'BookDetail',
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
        <input v-model="searchQuery" @keyup.enter="searchBooks" placeholder="Search books...">
        <button @click="searchBooks" :disabled="isLoading">Search</button>

        <div v-if="isLoading">Loading...</div>

        <ul v-else>
            <li v-for="book in books" :key="book.title" @click="selectBook(book)">
                <h3>{{ book.title }}</h3>
                <p>著者: {{ book.authors.join(', ') }}</p>
                <p>出版日: {{ book.publishedDate }}</p>
                <img v-if="book.image" :src="book.image"></img>
            </li>
        </ul>
    </div>
</template>
