<template>
  <v-container grid-list-xl fluid>
    <!-- <v-layout column> -->
    <v-layout row wrap justify-center align-center>
      <v-flex sm12>
        <v-widget title="ระบบสนับสนุน" icon="mdi-view-grid-plus ">
          <div slot="widget-content">
            <v-row>
              <v-col cols="12" md="6"><t-source></t-source> </v-col>
              <v-col cols="12" md="6"><t-motivation></t-motivation> </v-col>
            </v-row>
            <v-row>
              <v-col cols="12" md="6"><t-generic></t-generic> </v-col>
              <v-col cols="12" md="6"><t-tradename></t-tradename> </v-col>
            </v-row>
            <v-row>
              <v-col cols="12" md="6"><t-tambon></t-tambon> </v-col>
              <v-col cols="12" md="6"><t-pcucode></t-pcucode> </v-col>
            </v-row>
            <v-row>
              <v-col cols="12" md="6"><t-education></t-education> </v-col>
              <v-col cols="12" md="6"><t-training></t-training> </v-col>
            </v-row>
            <v-row>
              <v-col cols="12" md="6"><t-grocery></t-grocery> </v-col>
            </v-row>
          </div>
        </v-widget>
      </v-flex>
    </v-layout>
  </v-container>
</template>
<script>
import VWidget from '@/components/VWidget'

import axios from 'axios'
import t_source from '../components/t_source.vue'
import t_motivation from '../components/t_motivation.vue'
import t_generic from '../components/t_generic.vue'
import t_tradename from '../components/t_tradename.vue'
import t_tambon from '../components/t_tambon.vue'
import t_pcucode from '../components/t_tradename.vue'
import t_education from '../components/t_education.vue'
import t_training from '../components/t_training.vue'
import t_grocery from '../components/t_grocery.vue'
export default {
  name: 'backend',
  components: {
    VWidget,
    t_source,
    t_motivation,
    t_generic,
    t_tradename,
    t_tambon,
    t_pcucode,
    t_education,
    t_training,
    t_grocery,
  },
  data: () => ({}),

  mounted() {},
  methods: {},
}
</script>
