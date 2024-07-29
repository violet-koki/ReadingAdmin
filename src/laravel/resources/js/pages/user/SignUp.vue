<script setup lang="ts">
import { reactive } from 'vue'
import { routerKey } from 'vue-router';
import axios from '../../libs/apiClient'
import { useRouter } from 'vue-router'
import apiClient from './../../libs/apiClient';


const data = reactive({
  nick_name: '',
  name: '',
  mail: '',
  gender: '',
  password: '',
})

const router = useRouter();
const signup = async () => {
  await apiClient.post('/api/user/register', data)
  router.push({ name: 'UserArticleList'})
}
</script>

<template>
  <div>
    <h1>ユーザー新規登録</h1>
    <input placeholder="NickName" type="text" v-model="data.nick_name" />
    <input placeholder="Name" type="text" v-model="data.name" />
    <input placeholder="Mail" type="text" v-model="data.mail" />
    <input placeholder="Gender" type="int" v-model="data.gender" />
    <input placeholder="Password" type="password" v-model="data.password" />
    <button class="btn" @click="signup">登録</button>
  </div>
</template>


