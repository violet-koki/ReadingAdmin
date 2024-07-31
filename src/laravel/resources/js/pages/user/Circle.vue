<script setup>
import {ref, computed} from "vue";

const radiusInit = Math.round(Math.random() * 10);
const PI = ref(3.14);
const radius = ref(radiusInit);
const areaInit = PI.value * radiusInit * radiusInit;
const area = ref(areaInit);
// const area = computed(
//     (): number => {
//         return radius.value * ra
//     }
// )

</script>

<template>
    <p>半径{{ radius }}の円の面積を計算すると、{{ area }}</p>
</template>