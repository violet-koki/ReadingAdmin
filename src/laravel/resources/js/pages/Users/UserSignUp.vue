<script setup lang="ts">
import { reactive } from 'vue'
import { routerKey } from 'vue-router';
import axios from '../../libs/apiClient'
import { useRouter } from 'vue-router'
import apiClient from './../../libs/apiClient';


const data = reactive({
  name: '',
  email: '',
  password: '',
})

const router = useRouter();
const signup = async () => {
  await apiClient.post('/api/users/register', data)
  router.push({ name: 'UserArticleList'})
}
</script>

<template>
</template>


