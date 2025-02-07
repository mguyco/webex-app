<script lang="ts" setup>
import { defineComponent } from 'vue';
import { person } from '@/props';

const props = defineProps({ person });
</script>

<template>
    You're logged in, {{ props.person?.firstName }}!
</template>

<script lang="ts">
export default defineComponent({
    name: 'Dashboard',
})
</script>