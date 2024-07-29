<script setup lang="ts">
import { reactive } from 'vue'
import { routerKey } from 'vue-router';
import axios from '../../libs/apiClient'
import { useRouter } from 'vue-router'
import apiClient from './../../libs/apiClient';
import { ref } from 'vue';


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

type signUpParams = {
  nick_name : string;
  name : string;
  mail : string;
  gender : string;
  password : string;
}

const signUpInfo = ref<signUpParams>({
  nick_name: '',
  name: '',
  mail: '',
  gender: '',
  password: '',
});
</script>

<template>
  <!-- <div>
    <h1>ユーザー新規登録</h1>
    <input placeholder="NickName" type="text" v-model="data.nick_name" />
    <input placeholder="Name" type="text" v-model="data.name" />
    <input placeholder="Mail" type="text" v-model="data.mail" />
    <input placeholder="Gender" type="int" v-model="data.gender" />
    <input placeholder="Password" type="password" v-model="data.password" />
    <button class="btn" @click="signup">登録</button>
  </div> -->
  <div>
  <BButton>Button</BButton>

  <BContainer>
    <BRow>
      <BCol lg="12">
        <div class="text-center mt-sm-5 mb-4 text-white-50">
          <p class="mt-3 fs-15 fw-medium">JBCT MyPage</p>
        </div>
      </BCol>
    </BRow>

    <BRow class="justify-content-center">
      <BCol md="8" lg="6" xl="5">
        <BCard no-body class="mt-4">
          <BCardBody class="p-4">
            <div class="p-2 mt-4">
              <form>
                <div class="mb-3">
                  <input id="email" v-model="signUpInfo.mail" type="email" class="form-control" placeholder="メールアドレス" />
                  <div class="invalid-feedback">
                    <span></span>
                  </div>
                </div>
              </form>
            </div>
            <!-- <div class="mb-3">
                    <div class="position-relative auth-pass-inputgroup mb-3">
                      <input id="password-input" v-model="loginInfo.password" :type="showPassword ? 'text' : 'password'"
                        class="form-control pe-5" placeholder="パスワード" />
                      <BButton id="password-addon" variant="link"
                        class="position-absolute end-0 top-0 text-decoration-none text-muted" type="button"
                        @click="togglePasswordVisibility">
                        <i class="ri-eye-fill align-middle"></i>
                      </BButton>
                      <div class="invalid-feedback">
                        <span></span>
                      </div>
                    </div>
                  </div> -->

            <!-- <div class="mt-4">
                    <InlineDanger dismissible :error-message="props.errorMessage" :error-response="props.errorResponse"
                      @dismiss-error="closeApiError" />
                    <BButton variant="success" class="w-100" type="submit"
                      :disabled="props.processing || !isAllFieldsFilled" @click="onClickLogin">
                      {{ props.processing ? 'ログイン中' : 'ログイン' }}
                    </BButton>
                  </div> -->
            <!-- </form>
              </div> -->
          </BCardBody>
        </BCard>
      </BCol>
      <div class="fs-4">
        <div class="text-center">
          <p class="mb-0">
            <router-link :to="{ name: 'SampleView' }" class="fw-semibold text-primary text-decoration-underline">
              パスワードを忘れてしまった方はこちら
            </router-link>
          </p>
        </div>

        <!-- TODO 表示期間は2024年7月3日(水)13:00～7月23日(火)15:00 -->
        <div class="mt-2 text-center">
          <router-link :to="{ name: 'SampleView' }" class="fw-semibold text-danger text-decoration-underline">
            「教育セミナー・認定医試験」の申込をはじめてされる方はこちら
          </router-link>
        </div>
      </div>
    </BRow>
  </BContainer>
  </div>
</template>


