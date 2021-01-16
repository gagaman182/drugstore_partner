<template>
  <div>
    <v-flex sm12 lg12>
      <v-card class="teal lighten-1">
        <v-card-title>
          <h4 class="yellow--text text--darken-2">ข้อมูลร้านชำ</h4>
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
            :rows-per-page-items="[10, 25, 50, { text: 'All', value: -1 }]"
            class="elevation-1"
            @click:row="handleClick"
          >
            <!-- <template slot="items" slot-scope="props" :item.actions="{ item }">
              
            </template> -->
          </v-data-table>
        </v-card-text>
      </v-card>
    </v-flex>
  </div>
</template>

<script>
import axios from 'axios'
export default {
  name: 'datageneral',

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
          text: 'ชื่อ-สกุล',
          value: 'name',
        },
        {
          text: 'เพศ',
          value: 'sex',
        },
        {
          text: 'อายุ',
          value: 'age',
        },
        {
          text: 'ร้านค้า',
          value: 'storename',
        },
        {
          text: 'ที่ตั้งเลขที่',
          value: 'address',
        },
        {
          text: 'หมู่ที่',
          value: 'village',
        },
        {
          text: 'ตำบล',
          value: 'tambon',
        },
        {
          text: 'พื้นที่',
          value: 'pcucode',
        },
        {
          text: 'ประเภทร้าน',
          value: 'grocery',
        },
        {
          text: 'การศึกษา',
          value: 'education',
        },
        {
          text: 'อบรม',
          value: 'training',
        },
        {
          text: 'วันที่เก็บข้อมูล',
          value: 'datestart',
        },
        {
          text: 'เวลา',
          value: 'timestart',
        },
      ],
      items: [],
      leavedetails: null,
    },
  }),
  mounted() {
    this.fetch_drugstore()
  },
  methods: {
    //แสดงข้อมูลร้านค้า
    fetch_drugstore() {
      axios
        .get(`${this.$axios.defaults.baseURL}drugstore_add_data.php`)
        .then((response) => {
          this.complex.items = response.data
        })
    },
    handleClick(value) {
      // alert(value.storeid)
      this.dialog = true
      this.$emit('show-dialog', { dialog: this.dialog, storeid: value.storeid })
    },
    refresh_drugstore() {
      this.fetch_drugstore()
    },
  },
}
</script>
