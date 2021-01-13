<template>
  <v-app>
    <v-navigation-drawer
      v-model="drawer"
      :mini-variant="miniVariant"
      :clipped="clipped"
      fixed
      app
      class="purple darken-3"
    >
      <v-list-item>
        <v-list-item-content class="red--text text--lighten-5">
          <v-list-item-title class="title"> แบบบันทึกร้านชำ </v-list-item-title>
          <v-list-item-subtitle class="red--text text--lighten-5">
            แบบสำรวจการจำหน่ายยาที่ไม่เหมาะสม
          </v-list-item-subtitle>
        </v-list-item-content>
      </v-list-item>

      <v-divider></v-divider>
      <v-list>
        <v-list-item
          v-for="(item, i) in items"
          :key="i"
          :to="item.to"
          router
          exact
        >
          <v-list-item-action>
            <v-icon class="red--text text--lighten-5">{{ item.icon }}</v-icon>
          </v-list-item-action>
          <v-list-item-content class="red--text text--lighten-5">
            <v-list-item-title v-text="item.title" />
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>
    <v-app-bar :clipped-left="clipped" fixed app class="teal lighten-1">
      <!-- <v-app-bar-nav-icon @click.stop="drawer = !drawer" /> -->
      <!-- <v-btn icon @click.stop="miniVariant = !miniVariant">
        <v-icon>mdi-{{ `chevron-${miniVariant ? 'right' : 'left'}` }}</v-icon>
      </v-btn>
      <v-btn icon @click.stop="clipped = !clipped">
        <v-icon>mdi-application</v-icon>
      </v-btn> -->

      <!-- <v-toolbar-title v-text="title" class="red--text text--lighten-5" /> -->
      <v-avatar> <img src="@/assets/logo.jpg" alt="John" /> </v-avatar>&nbsp;
      <h2 class="red--text text--lighten-5">{{ title }}</h2>
      <v-spacer />
    </v-app-bar>
    <v-main>
      <v-container>
        <nuxt />
      </v-container>
    </v-main>

    <v-footer :absolute="!fixed" app>
      <span
        >&copy;
        {{ new Date().getFullYear() }}
        กลุ่มงานเภสัชกรรมและคุ้มครองผู้บริโภค</span
      >
    </v-footer>
  </v-app>
</template>

<script>
export default {
  data() {
    return {
      clipped: true,
      drawer: true,
      fixed: false,
      items: [
        {
          icon: 'mdi-store  ',
          title: 'ข้อมูลทั่วไป',
          to: '/',
        },
        {
          icon: 'mdi-pill',
          title: 'สำรวจยาในร้าน',
          to: '/survey',
        },
        {
          icon: 'mdi-view-grid-plus ',
          title: 'ระบบสนับสนุน',
          to: '/backend',
        },
        {
          icon: 'mdi-monitor-dashboard',
          title: 'รายงาน',
          to: '/report',
        },
      ],
      miniVariant: false,
      right: true,
      rightDrawer: false,
      title: 'กลุ่มงานเวชกรรมสังคม รพ.หาดใหญ่  ',
    }
  },
}
</script>
<style scoped>
div {
  font-family: 'Prompt', sans-serif;
}
</style>
