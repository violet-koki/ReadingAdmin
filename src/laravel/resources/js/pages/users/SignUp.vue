<script setup lang="ts">
import { reactive } from 'vue'
import { routerKey } from 'vue-router';
import axios from '../../libs/apiClient'
import { useRouter } from 'vue-router'
import apiClient from './../../libs/apiClient';


const data = reactive({
  user_id: '',
  nick_name: '',
  name: '',
  mail: '',
  password: '',
})

const router = useRouter();
const signup = async () => {
  await apiClient.post('/api/users/register', data)
  router.push({ name: 'UserArticleList'})
}
</script>

<template>
  <div>
    <h1>ユーザー新規登録</h1>
    <input placeholder="UserID" type="text" v-model="data.user_id"/>
    <input placeholder="NickName" type="text" v-model="data.nick_name"/>
    <input placeholder="Username" type="text" v-model="data.name"/>
    <input placeholder="Mail" type="text" v-model="data.mail"/>
    <input placeholder="Password" type="password" v-model="data.password"/>
    <button class="btn" @click="signup">登録</button>
  </div>
</template>


