<script setup lang="ts">
const backgroundImage = `url('./img/wallpapers/Virtual_Background-ProductBackground_${Math.ceil(Math.random() * 4)}.jpg')`;
</script>

<template>
    <Head title="Welcome" />
    <v-app class="bg" :style="{ backgroundImage }">
        <v-main>
            <v-container fluid>
                <slot />
            </v-container>
        </v-main>
    </v-app>
</template>

<style scoped>
.bg {
  background-size: cover;
  background-position: 25% 75%;
}
</style>