import { reactive } from 'vue';

export const store = reactive({
    activePage: 'dashboard',
    navMini: false,
    navDrawer: true,
    navDrawerToggle() {
        this.navDrawer = !this.navDrawer
    },
});