<script lang="ts" setup>
import { defineComponent } from 'vue'
import AppBar from '@/components/AppBar.vue'
import NavDrawer from '@/components/NavDrawer.vue'
import { person, scopes } from '@/props';

const props = defineProps({ person, scopes })
</script>

<template>
    <Head>
        <title>{{ $page.component }}</title>
    </Head>
    <v-app>
        <AppBar />
        <NavDrawer 
            :person="props.person"
            :scopes="props.scopes" />
        <v-main>
            <v-container class="pa-10" fluid>
                <slot />
            </v-container>
        </v-main>
    </v-app>
</template>

<script lang="ts">
export default defineComponent({
    name: 'UserLayout',
    components: {
        AppBar,
        NavDrawer
    },
})
</script>