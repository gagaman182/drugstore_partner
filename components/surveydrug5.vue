<template>
  <div>
    <v-row>
      <v-col cols="12">
        <v-card>
          <v-card-text dark>
            <v-row>
              <v-col cols="12" md="3"
                ><div class="text-md-center">
                  <h2>ยาชุด</h2>
                </div>
              </v-col>

              <v-col cols="12" md="1">
                <v-switch @change="change_row" v-model="switchs"></v-switch>
              </v-col>
              <v-col cols="12" md="4"
                ><div
                  class="title grey--text text--darken-1 text-md-center"
                  v-if="row"
                >
                  <v-select
                    v-model="source"
                    item-text="name"
                    item-value="source"
                    :items="source_list"
                    chips
                    label="แหล่ง"
                    multiple
                    outlined
                  ></v-select>
                </div>
              </v-col>
              <v-col cols="12" md="4"
                ><div class="title grey--text text--darken-1" v-if="row">
                  <v-select
                    v-model="motivation"
                    item-text="name"
                    item-value="motivation"
                    :items="motivation_list"
                    chips
                    label="เหตุผล"
                    multiple
                    outlined
                  ></v-select>
                </div>
              </v-col>
            </v-row>
            <v-row>
              <v-col cols="12" md="4"
                ><div class="text-md-center" v-if="row">
                  <v-alert text color="teal lighten-1">
                    <h4>ชื่อยา</h4></v-alert
                  >
                </div>
              </v-col>
              <v-col cols="12" md="4"
                ><div class="text-md-center" v-if="row">
                  <v-alert text color="teal lighten-1">
                    <h4>ชื่อการค้า</h4></v-alert
                  >
                </div>
              </v-col>

              <v-col cols="12" md="4"
                ><div class="text-md-center" v-if="row">
                  <v-alert text color="teal lighten-1">
                    <h4>ชื่อแหล่งซื้อ</h4></v-alert
                  >
                </div>
              </v-col>
            </v-row>
            <v-row>
              <v-col cols="12" md="4"
                ><div
                  class="title grey--text text--darken-1 text-md-center"
                  v-if="row"
                >
                  <v-select
                    v-model="generic"
                    item-text="name"
                    item-value="generic"
                    :items="generic_list"
                    chips
                    label="ชื่อยา"
                    multiple
                    outlined
                  ></v-select>
                </div>
              </v-col>
              <v-col cols="12" md="4"
                ><div
                  class="title grey--text text--darken-1 text-md-center"
                  v-if="row"
                >
                  <v-select
                    v-model="tradename"
                    item-text="name"
                    item-value="tradename"
                    :items="tradename_list"
                    chips
                    label="ชื่อการค้า"
                    multiple
                    outlined
                  ></v-select>
                </div>
              </v-col>

              <v-col cols="12" md="4"
                ><div
                  class="title grey--text text--darken-1 text-md-center"
                  v-if="row"
                >
                  <v-select
                    v-model="drugstore"
                    item-text="name"
                    item-value="drugstore"
                    :items="drugstore_list"
                    chips
                    label="ชื้อแหล่งซื้อ"
                    multiple
                    outlined
                  ></v-select>
                </div>
              </v-col>
            </v-row>
          </v-card-text>
        </v-card>
      </v-col>
    </v-row>
  </div>
</template>

<script>
import axios from 'axios'
export default {
  name: 'surveydrug5',
  props: {
    storeid: null,
    storeidedit: null,
  },
  data: () => ({
    row: false,
    switchs: false,
    typedruggroup: '',
    sourceall: '',
    source: '',
    source_list: [],
    motivationall: '',
    motivation: '',
    motivation_list: [],
    genericall: '',
    generic: '',
    generic_list: [],
    tradenameall: '',
    tradename: '',
    tradename_list: [],
    drugstoreall: '',
    drugstore: '',
    drugstore_list: [],
    message: '',
  }),
  mounted() {
    this.fetch_source()
    this.fecth_motivation()
    this.fecth_drugstore()
    this.fecth_tradename()
    this.fecth_generic()
  },
  methods: {
    //แก้ไข ข้อมูล
    edit_survey() {
      let typedruggroup = '5'
      this.source = ''
      this.motivation = ''
      this.generic = ''
      this.tradename = ''
      this.drugstore = ''
      this.other = ''

      //source แหล่ง
      axios
        .get(`${this.$axios.defaults.baseURL}surveydrug_source_edit.php`, {
          params: {
            storeid: this.storeidedit,
            typedruggroup: typedruggroup,
          },
        })
        .then((response) => {
          let source_edit = response.data
          this.source = source_edit.map((item) => item.source)

          this.switchs = true
          this.row = true
        })

      //motivation เหตุผล
      axios
        .get(`${this.$axios.defaults.baseURL}surveydrug_motivation_edit.php`, {
          params: {
            storeid: this.storeidedit,
            typedruggroup: typedruggroup,
          },
        })
        .then((response) => {
          let motivation_edit = response.data
          this.motivation = motivation_edit.map((item) => item.motivation)

          this.switchs = true
          this.row = true
        })

      //generic ชื่อยา
      axios
        .get(`${this.$axios.defaults.baseURL}surveydrug_generic_edit.php`, {
          params: {
            storeid: this.storeidedit,
            typedruggroup: typedruggroup,
          },
        })
        .then((response) => {
          let generic_edit = response.data
          this.generic = generic_edit.map((item) => item.generic)

          this.switchs = true
          this.row = true
        })

      //generic ชื่อทางการค้า
      axios
        .get(`${this.$axios.defaults.baseURL}surveydrug_tradename_edit.php`, {
          params: {
            storeid: this.storeidedit,
            typedruggroup: typedruggroup,
          },
        })
        .then((response) => {
          let tradename_edit = response.data
          this.tradename = tradename_edit.map((item) => item.tradename)
          this.switchs = true
          this.row = true
        })

      //generic ชื่อแหล่งซื้อ
      axios
        .get(`${this.$axios.defaults.baseURL}surveydrug_drugstore_edit.php`, {
          params: {
            storeid: this.storeidedit,
            typedruggroup: typedruggroup,
          },
        })
        .then((response) => {
          let drugstore_edit = response.data
          this.drugstore = drugstore_edit.map((item) => item.drugstore)

          this.switchs = true
          this.row = true
        })

      //other
      axios
        .get(`${this.$axios.defaults.baseURL}other_edit.php`, {
          params: {
            storeid: this.storeidedit,
          },
        })
        .then((response) => {
          this.other = response.data[0].other
          console.log(this.other)
          this.row = true
        })
    },
    clear() {
      this.source = ''
      this.motivation = ''
      this.generic = ''
      this.tradename = ''
      this.drugstore = ''
      this.other = ''
      this.switchs = false
      this.row = false
    },
    change_row() {
      this.row = !this.row
    },

    //แหลง่ที่มา
    async fetch_source() {
      await axios
        .get(`${this.$axios.defaults.baseURL}t_source.php`)
        .then((response) => {
          this.source_list = response.data
        })
    },
    //เหตุผลการจำหน่าย
    async fecth_motivation() {
      await axios
        .get(`${this.$axios.defaults.baseURL}t_motivation.php`)
        .then((response) => {
          this.motivation_list = response.data
        })
    },
    //ชื่อแหล่งซื้อ
    async fecth_drugstore() {
      await axios
        .get(`${this.$axios.defaults.baseURL}t_drugstore.php`)
        .then((response) => {
          this.drugstore_list = response.data
        })
    },
    //ชื่อการค้า
    async fecth_tradename() {
      await axios
        .get(`${this.$axios.defaults.baseURL}t_tradename.php`)
        .then((response) => {
          this.tradename_list = response.data
        })
    },
    //ชื่อยา
    async fecth_generic() {
      await axios
        .get(`${this.$axios.defaults.baseURL}t_generic.php`)
        .then((response) => {
          this.generic_list = response.data
        })
    },
    //เพิ่มข้อมูล
    adddata() {
      if (this.switchs) {
        this.typedruggroup = '5'
        this.addselect()
      }
    },

    //update ข้อมูล
    update_survey() {
      this.typedruggroup = '5'

      this.updatesurvey()
      this.addselect()
    },

    addselect() {
      //วนลูป แหล่งซื้อ
      // for (
      //   this.isource = 0;
      //   this.isource < this.source.length;
      //   this.isource++
      // )
      let s = ''
      for (s in this.source) {
        axios
          .post(`${this.$axios.defaults.baseURL}source_add.php`, {
            storeid: this.storeid,
            sourceid: this.source[s],
            typedruggroup: this.typedruggroup,
          })
          .then((response) => {
            this.message = response.data

            if (this.message[0].message === 'เพิ่มข้อมูลสำเร็จ') {
              this.$swal({
                title: 'สถานะการเพิ่ม',
                text: this.message[0].message,
                icon: 'success',
                confirmButtonText: 'ตกลง',
              })
              this.clear()
              //สั้ง clear from ข้างนอก
              // this.$emit('clear-form', {
              //   clears: 'clear',
              // })
            } else {
              this.$swal({
                title: 'สถานะการเพิ่ม',
                text: this.message[0].message,
                icon: 'error',
                confirmButtonText: 'ตกลง',
              })
            }
          })
      }

      //วนลูป เหตุผลการจำหน่าย
      // for (
      //   this.imotivation = 0;
      //   this.imotivation < this.motivation.length;
      //   this.imotivation++
      // )
      let m = ''
      for (m in this.motivation) {
        axios
          .post(`${this.$axios.defaults.baseURL}motivation_add.php`, {
            storeid: this.storeid,
            motivationid: this.motivation[m],
            typedruggroup: this.typedruggroup,
          })
          .then((response) => {
            this.message = response.data
            // console.log(this.message)
            if (this.message[0].message === 'เพิ่มข้อมูลสำเร็จ') {
              this.$swal({
                title: 'สถานะการเพิ่ม',
                text: this.message[0].message,
                icon: 'success',
                confirmButtonText: 'ตกลง',
              })
              this.clear()
              //สั้ง clear from ข้างนอก
              // this.$emit('clear-form', {
              //   clears: 'clear',
              // })
            } else {
              this.$swal({
                title: 'สถานะการเพิ่ม',
                text: this.message[0].message,
                icon: 'error',
                confirmButtonText: 'ตกลง',
              })
            }
          })
      }

      //วนลูป ชื่อแหล่งซื้อ
      // for (
      //   this.idrugstore = 0;
      //   this.idrugstore < this.drugstore.length;
      //   this.idrugstore++
      // )
      let d = ''
      for (d in this.drugstore) {
        axios
          .post(`${this.$axios.defaults.baseURL}drugstore_select_add.php`, {
            storeid: this.storeid,
            drugstoreid: this.drugstore[d],
            typedruggroup: this.typedruggroup,
          })
          .then((response) => {
            this.message = response.data
            // console.log(this.message)
            if (this.message[0].message === 'เพิ่มข้อมูลสำเร็จ') {
              this.$swal({
                title: 'สถานะการเพิ่ม',
                text: this.message[0].message,
                icon: 'success',
                confirmButtonText: 'ตกลง',
              })
              this.clear()
              //สั้ง clear from ข้างนอก
              // this.$emit('clear-form', {
              //   clears: 'clear',
              // })
            } else {
              this.$swal({
                title: 'สถานะการเพิ่ม',
                text: this.message[0].message,
                icon: 'error',
                confirmButtonText: 'ตกลง',
              })
            }
          })
      }

      //วนลูป ชื่อการค้า
      // for (
      //   this.itradename = 0;
      //   this.itradename < this.tradename.length;
      //   this.itradename++
      // )
      let t = ''
      for (t in this.tradename) {
        axios
          .post(`${this.$axios.defaults.baseURL}tradename_add.php`, {
            storeid: this.storeid,
            tradenameid: this.tradename[t],
            typedruggroup: this.typedruggroup,
          })
          .then((response) => {
            this.message = response.data
            // console.log(this.message)
            if (this.message[0].message === 'เพิ่มข้อมูลสำเร็จ') {
              this.$swal({
                title: 'สถานะการเพิ่ม',
                text: this.message[0].message,
                icon: 'success',
                confirmButtonText: 'ตกลง',
              })
              this.clear()
              //สั้ง clear from ข้างนอก
              // this.$emit('clear-form', {
              //   clears: 'clear',
              // })
            } else {
              this.$swal({
                title: 'สถานะการเพิ่ม',
                text: this.message[0].message,
                icon: 'error',
                confirmButtonText: 'ตกลง',
              })
            }
          })
      }

      //วนลูป ชื่อยา
      // for (
      //   this.igeneric = 0;
      //   this.igeneric < this.generic.length;
      //   this.igeneric++
      // )
      let g = ''
      for (g in this.generic) {
        axios
          .post(`${this.$axios.defaults.baseURL}generic_add.php`, {
            storeid: this.storeid,
            genericid: this.generic[g],
            typedruggroup: this.typedruggroup,
          })
          .then((response) => {
            this.message = response.data
            // console.log(this.message)
            if (this.message[0].message === 'เพิ่มข้อมูลสำเร็จ') {
              this.$swal({
                title: 'สถานะการเพิ่ม',
                text: this.message[0].message,
                icon: 'success',
                confirmButtonText: 'ตกลง',
              })
              this.clear()
              //สั้ง clear from ข้างนอก
              // this.$emit('clear-form', {
              //   clears: 'clear',
              // })
            } else {
              this.$swal({
                title: 'สถานะการเพิ่ม',
                text: this.message[0].message,
                icon: 'error',
                confirmButtonText: 'ตกลง',
              })
            }
          })
      }
    },
    updatesurvey() {
      //วนลูป แหล่งซื้อ

      axios
        .put(`${this.$axios.defaults.baseURL}source_update.php`, {
          storeid: this.storeid,

          typedruggroup: this.typedruggroup,
        })
        .then((response) => {
          this.message = response.data
        })

      //วนลูป เหตุผลการจำหน่าย

      axios
        .put(`${this.$axios.defaults.baseURL}motivation_update.php`, {
          storeid: this.storeid,

          typedruggroup: this.typedruggroup,
        })
        .then((response) => {
          this.message = response.data
        })

      //วนลูป ชื่อแหล่งซื้อ

      axios
        .put(`${this.$axios.defaults.baseURL}drugstore_select_update.php`, {
          storeid: this.storeid,

          typedruggroup: this.typedruggroup,
        })
        .then((response) => {
          this.message = response.data
        })

      //วนลูป ชื่อการค้า
      axios
        .put(`${this.$axios.defaults.baseURL}tradename_update.php`, {
          storeid: this.storeid,

          typedruggroup: this.typedruggroup,
        })
        .then((response) => {
          this.message = response.data
        })

      //วนลูป ชื่อยา

      axios
        .put(`${this.$axios.defaults.baseURL}generic_update.php`, {
          storeid: this.storeid,

          typedruggroup: this.typedruggroup,
        })
        .then((response) => {
          this.message = response.data
        })
    },
  },
}
</script>
