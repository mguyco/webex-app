<script setup lang="ts">
import { defineComponent } from 'vue'
import GuestLayout from '../layouts/GuestLayout.vue'
</script>

<template>
  <v-row align="center" justify="center" style="height: 100vh">
      <v-col cols="10" sm="6" md="4" lg="3" xl="3">
        <v-card :class="`${ $vuetify.theme.name }-opacity pa-3 rounded-lg elevation-8`">
          <v-card-title>
            <div class="d-flex justify-center mb-4">
              <v-img 
                width="96"
                height="96" 
                src="../../img/icons/icons8-webex-96.png" />
            </div>
            <span class="text-h5">Login with Webex</span>
          </v-card-title>
          <v-card-text>
            <p class="text-body-2 text-disabled">
              This applications needs permission to access your Webex data. 
              Click sign in with Webex to get started. 
            </p>
          </v-card-text>
          <v-card-actions>
            <a href="/auth/webex/login">
              <v-btn color="primary">Sign in with Webex</v-btn>
            </a>
          </v-card-actions>
        </v-card>
      </v-col>
  </v-row>
</template>

<script lang="ts">
export default defineComponent({
  layout: GuestLayout,
  name: 'Welcome'
})
</script>

<style scoped>
.light-opacity {
  background-color: rgba(255,255,255,0.95);
}

.dark-opacity {
  background-color: rgba(25,25,25,0.95);
}
</style>