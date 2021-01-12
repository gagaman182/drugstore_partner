<template>
  <div>
    <v-row>
      <v-col sm12>
        <v-card class="purple darken-3">
          <v-card-title>
            <h4 class="white--text text--darken-2">
              ข้อมูลร้านชำที่บันทึกการสำรวจยาแล้ว
            </h4>
          </v-card-title>
          <v-toolbar card>
            <v-text-field
              v-model="search"
              flat
              solo
              prepend-icon="mdi-home-search-outline "
              placeholder="ค้นหา"
              hide-details
              class="hidden-sm-and-down"
            ></v-text-field>
          </v-toolbar>

          <v-divider></v-divider>
          <v-card-text class="pa-0">
            <v-data-table
              v-model="complex.selected"
              :headers="complex.headers"
              :search="search"
              :items="complex.items"
              class="elevation-1"
              @click:row="handleClick"
            >
            </v-data-table>
          </v-card-text>
        </v-card>
      </v-col>
    </v-row>
  </div>
</template>

<script>
import axios from 'axios'
export default {
  name: 'survey_data',

  data: () => ({
    search: '',
    complex: {
      selected: [],
      headers: [
        {
          text: 'ไอดี',
          value: 'storeid',
        },
        {
          text: 'ชื่อร้าน',
          value: 'storename',
        },
        {
          text: 'วันที่บันทึกข้อมูล',
          value: 'dataadd',
        },
      ],
      items: [],
    },
  }),
  mounted() {
    this.fetch_drugstore()
  },
  methods: {
    //แสดงข้อมูลร้านค้า
    async fetch_drugstore() {
      await axios
        .get(`${this.$axios.defaults.baseURL}survey_data.php`)
        .then((response) => {
          this.complex.items = response.data
        })
    },
    handleClick(value) {
      this.dialog = true
      this.$emit('show-dialog', { dialog: this.dialog, storeid: value.storeid })
    },

    refresh_drugstore() {
      this.fetch_drugstore()
    },
  },
}
</script>
