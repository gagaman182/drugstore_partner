<template>
  <div>
    <v-row>
      <v-col cols="12">
        <v-card>
         

          <v-card-text dark>
            <row>
              <v-col cols="12" justify-center align-center>
                <v-chip class="ma-2" color="cyan" label text-color="white">
                  <h3>ยาสมุนไพร/แผนโบราณ</h3>
                </v-chip>
              </v-col>
              <v-col><v-divider></v-divider></v-col>
            </row>
            <v-row>
              <v-col cols="12" md="3"
                ><div class="text-md-center">
                  <v-alert text color="purple darken-3"
                    ><h4>ประเด็น</h4>
                  </v-alert>
                </div>
              </v-col>
              <v-col cols="12" md="1"
                ><div class="text-md-center">
                  <v-alert text color="purple darken-3">
                    <h4>ไม่พบ/พบ</h4></v-alert
                  >
                </div>
              </v-col>

              <v-col cols="12" md="4"
                ><div class="text-md-center">
                  <v-alert text color="purple darken-3">
                    <h4>แหล่งซื้อ</h4></v-alert
                  >
                </div>
              </v-col>
              <v-col cols="12" md="4"
                ><div class="text-md-center">
                  <v-alert text color="purple darken-3">
                    <h4>เหตุผลการจำหน่าย</h4>
                  </v-alert>
                </div>
              </v-col>
              <v-col><v-divider></v-divider></v-col>
            </v-row>

            <v-row>
              <v-col cols="12" md="3"
                ><div class="text-md-center">
                 
                    <h2>ยาไม่มีทะเบียน(ยาผง ยาลูกกลอน ยาน้ำ)</h2>
                 
                </div>
              </v-col>

              <v-col cols="12" md="1">
                
                <v-switch @change="change_row" v-model="switchs"></v-switch>
                 </v-switch
                >
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

            <!-- <v-row>
              <v-col><v-divider></v-divider></v-col>
              <v-col cols="12" align="end">
                <v-btn
                  large
                  class="red--text text--lighten-5"
                  color="teal lighten-1"
                  flat
                  @click="adddata"
                >
                  <v-icon medium>mdi-content-save </v-icon>เพิ่ม</v-btn
                >
              </v-col></v-row
            > -->
          </v-card-text>
        </v-card>
      </v-col>
    </v-row>
  </div>
</template>

<script>
import axios from 'axios'
export default {
  name: 'surveydrug8',
  props: {
    storeid: null,
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
    clear() {
      this.source = ''
      this.motivation = ''
      this.generic = ''
      this.tradename = ''
      this.drugstore = ''
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
        this.typedruggroup = '8'
        this.addselect()
      }
    },

    addselect() {
      //วนลูป แหล่งซื้อ
      for (
        this.isource = 0;
        this.isource < this.source.length;
        this.isource++
      ) {
        axios
          .post(`${this.$axios.defaults.baseURL}source_add.php`, {
            storeid: this.storeid,
            sourceid: this.source[this.isource],
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
      for (
        this.imotivation = 0;
        this.imotivation < this.motivation.length;
        this.imotivation++
      ) {
        axios
          .post(`${this.$axios.defaults.baseURL}motivation_add.php`, {
            storeid: this.storeid,
            motivationid: this.motivation[this.imotivation],
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
      for (
        this.idrugstore = 0;
        this.idrugstore < this.drugstore.length;
        this.idrugstore++
      ) {
        axios
          .post(`${this.$axios.defaults.baseURL}drugstore_select_add.php`, {
            storeid: this.storeid,
            drugstoreid: this.drugstore[this.idrugstore],
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
      for (
        this.itradename = 0;
        this.itradename < this.tradename.length;
        this.itradename++
      ) {
        axios
          .post(`${this.$axios.defaults.baseURL}tradename_add.php`, {
            storeid: this.storeid,
            tradenameid: this.tradename[this.itradename],
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
      for (
        this.igeneric = 0;
        this.igeneric < this.generic.length;
        this.igeneric++
      ) {
        axios
          .post(`${this.$axios.defaults.baseURL}generic_add.php`, {
            storeid: this.storeid,
            genericid: this.generic[this.igeneric],
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
  },
}
</script>
