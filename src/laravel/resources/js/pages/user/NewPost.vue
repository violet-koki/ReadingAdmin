<script setup lang="ts">
import { reactive } from 'vue'
import { useRouter } from 'vue-router';
import apiClient from './../../libs/apiClient';
import { ref } from 'vue';

const searchQuery = ref('');
const searchBooks = async () => {
    if (!searchQuery.value) return;
    const response = async () => {
        await apiClient.get('https://www.googleapis.com/books/v1/volumes', {
            params: {
                q: searchQuery.value,
                key: ''
            }
        })
    }
}
</script>