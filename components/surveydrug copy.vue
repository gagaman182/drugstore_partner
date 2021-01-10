<template>
  <div>
    <v-row>
      <v-col cols="12">
        <v-card>
          <v-card-title>
            <h4>
              ข้อมูลยาที่พบจากการสำรวจในร้าน
              <v-icon medium>mdi-credit-card-search</v-icon>
            </h4>
          </v-card-title>

          <v-card-text dark>
            <row>
              <v-col cols="12" justify-center align-center>
                <v-chip class="ma-2" color="cyan" label text-color="white">
                  <h3>ยาแผนปัจจุบัน</h3>
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
            <!-- row1---------------------------------------------------- -->
            <v-row>
              <v-col cols="12" md="3"
                ><div class="text-md-center">
                  <v-alert color="#cd5d7d" dark dense>
                    <h4>ยา NSAIDs</h4>
                  </v-alert>
                </div>
              </v-col>

              <v-col cols="12" md="1">
                <v-switch @change="change_row1" v-model="switch1"></v-switch>
              </v-col>
              <v-col cols="12" md="4"
                ><div
                  class="title grey--text text--darken-1 text-md-center"
                  v-if="row1"
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
                ><div class="title grey--text text--darken-1" v-if="row1">
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
                ><div class="text-md-center" v-if="row1">
                  <v-alert text color="purple darken-3">
                    <h4>ชื่อยา</h4></v-alert
                  >
                </div>
              </v-col>
              <v-col cols="12" md="4"
                ><div class="text-md-center" v-if="row1">
                  <v-alert text color="purple darken-3">
                    <h4>ชื่อการค้า</h4></v-alert
                  >
                </div>
              </v-col>

              <v-col cols="12" md="4"
                ><div class="text-md-center" v-if="row1">
                  <v-alert text color="purple darken-3">
                    <h4>ชื่อแหล่งซื้อ</h4></v-alert
                  >
                </div>
              </v-col>
            </v-row>
            <v-row>
              <v-col cols="12" md="4"
                ><div
                  class="title grey--text text--darken-1 text-md-center"
                  v-if="row1"
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
                  v-if="row1"
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
                  v-if="row1"
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
              <v-col><v-divider></v-divider></v-col>
            </v-row>
            <!-- row2-------------------------------------------- -->
            <v-row>
              <v-col cols="12" md="3"
                ><div class="text-md-center">
                  <v-alert color="#cd5d7d" dark dense>
                    <h4>ยาปฏิชีวนะ</h4>
                  </v-alert>
                </div>
              </v-col>

              <v-col cols="12" md="1">
                <v-switch @change="change_row2" v-model="switch2"></v-switch>
              </v-col>
              <v-col cols="12" md="4"
                ><div
                  class="title grey--text text--darken-1 text-md-center"
                  v-if="row2"
                >
                  <v-select
                    v-model="source2"
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
                ><div class="title grey--text text--darken-1" v-if="row2">
                  <v-select
                    v-model="motivation2"
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
                ><div class="text-md-center" v-if="row2">
                  <v-alert text color="purple darken-3">
                    <h4>ชื่อยา</h4></v-alert
                  >
                </div>
              </v-col>
              <v-col cols="12" md="4"
                ><div class="text-md-center" v-if="row2">
                  <v-alert text color="purple darken-3">
                    <h4>ชื่อการค้า</h4></v-alert
                  >
                </div>
              </v-col>

              <v-col cols="12" md="4"
                ><div class="text-md-center" v-if="row2">
                  <v-alert text color="purple darken-3">
                    <h4>ชื่อแหล่งซื้อ</h4></v-alert
                  >
                </div>
              </v-col>
            </v-row>
            <v-row>
              <v-col cols="12" md="4"
                ><div
                  class="title grey--text text--darken-1 text-md-center"
                  v-if="row2"
                >
                  <v-select
                    v-model="generic2"
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
                  v-if="row2"
                >
                  <v-select
                    v-model="tradename2"
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
                  v-if="row2"
                >
                  <v-select
                    v-model="drugstore2"
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
              <v-col><v-divider></v-divider></v-col>
            </v-row>

            <v-row>
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
            >
          </v-card-text>
        </v-card>
      </v-col>
    </v-row>
  </div>
</template>

<script>
import axios from 'axios'
export default {
  name: 'surveydrug',
  props: {
    storeid: null,
  },
  data: () => ({
    row1: false,
    row2: false,
    switch1: false,
    switch2: false,
    switch3: false,
    switch4: false,
    switch5: false,
    switch6: false,
    switch7: false,
    switch8: false,
    switch9: false,
    switch10: false,
    switch11: false,
    switch12: false,
    typedruggroup: '',
    sourceall: '',
    source: '',
    source2: '',
    source_list: [],
    motivationall: '',
    motivation: '',
    motivation2: '',
    motivation_list: [],
    genericall: '',
    generic: '',
    generic2: '',
    generic_list: [],
    tradenameall: '',
    tradename: '',
    tradename2: '',
    tradename_list: [],
    drugstoreall: '',
    drugstore: '',
    drugstore2: '',
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
      this.source2 = ''
      this.motivation2 = ''
      this.generic2 = ''
      this.tradename2 = ''
      this.drugstore2 = ''
      this.switch1 = false
      this.switch2 = false
      this.row1 = false
      this.row2 = false
    },
    change_row1() {
      this.row1 = !this.row1
    },
    change_row2() {
      this.row2 = !this.row2
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
      // alert(this.switch1)
      // alert(this.switch2)
      // if (this.source.length == 0) {
      //   alert('dd')
      // }
      if (this.switch1) {
        this.typedruggroup = '1'
        this.sourceall = this.source
        this.motivationall = this.motivation
        this.genericall = this.generic
        this.tradenameall = this.tradename
        this.drugstoreall = this.drugstore
        this.addselect()
      } else if (this.switch2) {
        this.typedruggroup = '2'
        this.sourceall = this.source2
        this.motivationall = this.motivation2
        this.genericall = this.generic2
        this.tradenameall = this.tradename2
        this.drugstoreall = this.drugstore2
        this.addselect()
      }
    },

    addselect() {
      //วนลูป แหล่งซื้อ
      for (
        this.isource = 0;
        this.isource < this.sourceall.length;
        this.isource++
      ) {
        axios
          .post(`${this.$axios.defaults.baseURL}source_add.php`, {
            storeid: this.storeid,
            sourceid: this.sourceall[this.isource],
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
              // this.clear()
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
        this.imotivation < this.motivationall.length;
        this.imotivation++
      ) {
        axios
          .post(`${this.$axios.defaults.baseURL}motivation_add.php`, {
            storeid: this.storeid,
            motivationid: this.motivationall[this.imotivation],
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
              // this.clear()
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
        this.idrugstore < this.drugstoreall.length;
        this.idrugstore++
      ) {
        axios
          .post(`${this.$axios.defaults.baseURL}drugstore_select_add.php`, {
            storeid: this.storeid,
            drugstoreid: this.drugstoreall[this.idrugstore],
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
              // this.clear()
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
        this.itradename < this.tradenameall.length;
        this.itradename++
      ) {
        axios
          .post(`${this.$axios.defaults.baseURL}tradename_add.php`, {
            storeid: this.storeid,
            tradenameid: this.tradenameall[this.itradename],
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
              // this.clear()
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
        this.igeneric < this.genericall.length;
        this.igeneric++
      ) {
        axios
          .post(`${this.$axios.defaults.baseURL}generic_add.php`, {
            storeid: this.storeid,
            genericid: this.genericall[this.igeneric],
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
              // this.clear()
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
      this.adddata
    },
  },
}
</script>
