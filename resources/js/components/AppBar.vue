<script lang="ts" setup>
import { defineComponent } from 'vue';
import { store } from '@/store'
</script>

<template>
    <v-app-bar 
        transition="slide-x-reverse-transition"
        scroll-behavior="elevate" 
        clipped-left
        flat
        app>
        <v-app-bar-nav-icon variant="text" @click.stop="store.navDrawerToggle()" />
        <v-toolbar-title>Webex App</v-toolbar-title>
    </v-app-bar>
</template>

<script lang="ts">
export default defineComponent({
    name: 'AppBar',
})
</script>