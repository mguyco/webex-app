<script lang="ts" setup>
import { defineComponent } from 'vue';
import { person, scopes } from '../props';
import { store } from '../store';

const props = defineProps({ person, scopes });
</script>

<template>
    <v-navigation-drawer 
        v-model="store.navDrawer"
        clipped
        app>
        <template v-slot:prepend>
            <v-list-item
                lines="two"
                :prepend-avatar="props.person?.avatar"
                :href="`https://www.strava.com/athletes/${ props.person?.id }`">
                <v-list-item-title>
                    {{ props.person?.displayName }}
                </v-list-item-title>
                <v-list-item-subtitle>
                    <v-chip class="mt-1" size="small" density="comfortable" color="green">Full Administrator</v-chip>
                </v-list-item-subtitle>
            </v-list-item>
        </template>
        <v-list nav>
            <template v-for="(item, i) in items" :key="i">
                <v-list-item 
                    v-if="props.scopes?.includes(item.scope)" 
                    :active="$page.url === item.url" 
                    :href="item.url"
                    color="primary" 
                    :prepend-icon="item.icon"
                    :title="item.title"
                    :value="item.title" />
            </template>
        </v-list>
    </v-navigation-drawer>
</template>

<script lang="ts">
export default defineComponent({
    name: 'NavDrawer',
    data: () => ({
        items: [
            {
                title: 'Dashboard',
                url: '/dashboard',
                icon: 'mdi-view-dashboard',
                scope: 'spark:people_read',
            },
            {
                title: 'People',
                url: '/people',
                icon: 'mdi-account-group',
                scope: 'spark:people_read',
            },
            {
                title: 'Meetings',
                url: '/meetings',
                icon: 'mdi-calendar-blank',
                scope: 'meeting:schedules_read'
            },
            {
                title: 'Contacts',
                url: '/contacts',
                icon: 'mdi-book-account-outline',
                scope: 'Identity:contact'
            },
            {
                title: 'Devices',
                url: '/devices',
                icon: 'mdi-deskphone',
                scope: 'spark:devices_read'
            },
            {
                title: 'Locations',
                url: '/locations',
                icon: 'mdi-city',
                scope: 'spark-admin:locations_read'
            },
            {
                title: 'Licenses',
                url: '/licenses',
                icon: 'mdi-license',
                scope: 'spark-admin:licenses_read'
            },
            {
                title: 'Settings',
                url: '/settings',
                icon: 'mdi-cog',
                scope: 'spark:people_read'
            },
        ]
    })
})
</script>

<style>
.v-list-item--nav .v-list-item-title {
    font-size: 0.95rem;
    font-weight: 400;
}
</style>