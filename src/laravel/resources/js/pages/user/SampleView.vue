<script setup>
import SampleComponent from './SampleComponent.vue';
import Child from './Child.vue';
import {ref} from 'vue';

const userName = ref('太郎');
const userAge = ref(20);
</script>

<template>
    <div>
        <SampleComponent :name="userName" :age="userAge" />
        <Child message="testest" />
    </div>
</template>