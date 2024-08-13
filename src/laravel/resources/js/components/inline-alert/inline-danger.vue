<script lang="ts" setup>
import { MixedErrorMessage, ErrorObject } from '@/types/errors.d';

type Emits = {
    (e: 'dismissError', value: boolean | number): void;
};
type Props = {
    errorResponse: boolean;
    errorMessage: MixedErrorMessage;
};

const emit = defineEmits<Emits>();
const props = defineProps<Props>();

// MEMO 親側でerrorMessageを空にするので、v-modelのショートハンドを使わない。
//      そもそもpropsを更新していて、アンチパターンを踏んでいるので、
//      props.errorMessageも更新していいかもしれない。
const dismissClick = (value: boolean | number) => {
    emit('dismissError', value);
};
</script>

<template>
    <BAlert variant="danger" :model-value="props.errorResponse" @update:model-value="dismissClick">
        <template v-if="typeof props.errorMessage === 'object'">
            <span v-for="(error, index) in props.errorMessage" :key="index" class="text-danger">
                {{ (error as any[])[0] ?? (error as ErrorObject).$message ?? error }}
                <br />
            </span>
        </template>
        <template v-else>
            <span class="text-danger">{{ props.errorMessage }}</span>
        </template>
    </BAlert>
</template>
