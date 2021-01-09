<template>
  <v-container grid-list-xl fluid>
    <!-- <v-layout column> -->
    <v-layout row wrap justify-center align-center>
      <v-flex sm12>
        <v-widget title="  ข้อมูลทั่วไป" icon="mdi-store ">
          <div slot="widget-content">
            <v-row>
              <v-col cols="12" md="4">
                <v-text-field
                  v-model="name"
                  label="ชื่อ เจ้าของร้าน/ผู้ดูแล "
                  outlined
                  shaped
                ></v-text-field>
              </v-col>
              <v-col cols="12" md="4">
                <v-text-field
                  v-model="lastname"
                  label="นามสกุล เจ้าของร้าน/ผู้ดูแล "
                  outlined
                  shaped
                ></v-text-field>
              </v-col>

              <v-col cols="12" md="2">
                <v-radio-group v-model="sex" row label="เพศ">
                  <v-radio label="ชาย" value="m"></v-radio>
                  <v-radio label="หญิง" value="f"></v-radio>
                </v-radio-group>
              </v-col>

              <v-col cols="12" md="2">
                <v-text-field
                  v-model="age"
                  label="อายุ"
                  type="number"
                  outlined
                  shaped
                ></v-text-field>
              </v-col>
            </v-row>
            <v-row>
              <v-col cols="12" md="4">
                <v-text-field
                  v-model="storename"
                  label="ชื่อร้าน "
                  outlined
                  shaped
                ></v-text-field>
              </v-col>
              <v-col cols="12" md="2">
                <v-text-field
                  v-model="address"
                  label="ที่ตั้งเลขที่ "
                  outlined
                  shaped
                ></v-text-field>
              </v-col>
              <v-col cols="12" md="1">
                <v-select
                  :items="village_list"
                  v-model="village"
                  outlined
                  shaped
                  label="หมู่"
                ></v-select>
              </v-col>
              <v-col cols="12" md="2">
                <v-select
                  :items="tambon_list"
                  v-model="tambon"
                  item-text="name"
                  item-value="tambon"
                  outlined
                  shaped
                  label="ตำบล"
                ></v-select>
              </v-col>
              <v-col cols="12" md="3">
                <v-select
                  :items="pcucode_list"
                  v-model="pcucode"
                  item-text="name"
                  item-value="pcucode"
                  outlined
                  shaped
                  label="พื้นที่ รพสต."
                ></v-select>
              </v-col>
            </v-row>
            <v-row>
              <v-col cols="12" md="4">
                <v-select
                  :items="grocery_list"
                  v-model="grocery"
                  item-text="name"
                  item-value="grocery"
                  outlined
                  shaped
                  label="ประเภทร้าน"
                ></v-select>
              </v-col>
              <v-col cols="12" md="4">
                <v-select
                  :items="education_list"
                  v-model="education"
                  item-text="name"
                  item-value="education"
                  outlined
                  shaped
                  label="การศึกษา"
                ></v-select>
              </v-col>
              <v-col cols="12" md="4">
                <v-select
                  :items="training_list"
                  v-model="training"
                  item-text="name"
                  item-value="training"
                  outlined
                  shaped
                  label="การอบรมจากเจ้าหน้าที่"
                ></v-select>
              </v-col>
            </v-row>
            <v-row>
              <v-col cols="12"><h3>ผู้เก็บข้อมูล</h3> </v-col>
            </v-row>
            <v-row>
              <v-col cols="12" md="6">
                <v-text-field
                  v-model="datacollector1"
                  label="1 "
                  outlined
                  shaped
                ></v-text-field>
              </v-col>
              <v-col cols="12" md="6">
                <v-text-field
                  v-model="affiliate1"
                  label="สังกัด "
                  outlined
                  shaped
                ></v-text-field>
              </v-col>
            </v-row>
            <v-row>
              <v-col cols="12" md="6">
                <v-text-field
                  v-model="datacollector2"
                  label="2 "
                  outlined
                  shaped
                ></v-text-field>
              </v-col>
              <v-col cols="12" md="6">
                <v-text-field
                  v-model="affiliate2"
                  label="สังกัด "
                  outlined
                  shaped
                ></v-text-field>
              </v-col>
            </v-row>
            <v-row>
              <v-col cols="12" md="6">
                <v-text-field
                  v-model="datacollector3"
                  label="3 "
                  outlined
                  shaped
                ></v-text-field>
              </v-col>
              <v-col cols="12" md="6">
                <v-text-field
                  v-model="affiliate3"
                  label="สังกัด "
                  outlined
                  shaped
                ></v-text-field>
              </v-col>
            </v-row>
            <v-row>
              <v-col cols="12" md="6" class="text-center">
                <v-col>
                  <h2>วันที่เก็บข้อมูล</h2>
                  <v-date-picker
                    v-model="datestart"
                    color="#7579e7"
                    locale="th-TH"
                  ></v-date-picker>
                </v-col>
              </v-col>
              <v-col cols="12" md="6" class="text-center">
                <v-col>
                  <h2>เวลา</h2>
                  <v-time-picker
                    v-model="timestart"
                    :allowed-minutes="allowedStep"
                    color="#7579e7"
                    format="24hr"
                    locale="th-TH"
                  ></v-time-picker>
                </v-col>
              </v-col>
            </v-row>

            <v-row>
              <v-col><v-divider></v-divider></v-col>
              <v-col cols="12" align="end">
                <v-btn
                  large
                  v-if="!btnshow"
                  class="red--text text--lighten-5"
                  color="teal lighten-1"
                  flat
                  @click="adddata"
                >
                  <v-icon medium>mdi-content-save </v-icon>เพิ่ม</v-btn
                >
                <v-btn
                  large
                  v-if="btnshow"
                  color="#0e49b5"
                  @click="updatestore()"
                  dark
                >
                  <v-icon medium>mdi-content-save-edit </v-icon>
                  <h4>แก้ไข</h4></v-btn
                >
                <v-btn
                  large
                  v-if="btnshow"
                  color="#c56183"
                  @click="removeleave()"
                  dark
                >
                  <v-icon medium>mdi-delete-forever </v-icon>
                  <h4>ลบ</h4></v-btn
                >
                <v-btn
                  large
                  color="#b088f9"
                  class="red--text text--lighten-5"
                  flat
                  @click="cleartext"
                >
                  <v-icon medium>mdi-autorenew </v-icon>ยกเลิก</v-btn
                >
              </v-col></v-row
            >
          </div>
        </v-widget>
      </v-flex>
      <v-flex sm12>
        <v-widget title="ตารางข้อมูลทั่วไป" icon="mdi-folder-table-outline ">
          <div slot="widget-content">
            <v-row>
              <v-col cols="12">
                <datageneral @show-dialog="showdiag" ref="child"></datageneral>
              </v-col>
            </v-row>
          </div>
        </v-widget>
      </v-flex>
      <v-dialog v-model="dialog" hide-overlay persistent width="300">
        <v-card color="purple darken-3" dark>
          <v-card-text>
            ประมวลผล
            <v-progress-linear
              indeterminate
              color="white"
              class="mb-0"
            ></v-progress-linear>
          </v-card-text>
        </v-card>
      </v-dialog>
    </v-layout>
  </v-container>
</template>

<script>
import VWidget from '@/components/VWidget'
import datageneral from '@/components/datageneral'
import axios from 'axios'
export default {
  name: 'index',
  components: { VWidget, datageneral },
  data: () => ({
    dialog: false,
    btnshow: false,

    storeid: '',
    name: '',
    lastname: '',
    sex: '',
    age: '',
    storename: '',
    address: '',
    village: '',
    village_list: [
      '1',
      '2',
      '3',
      '4',
      '5',
      '6',
      '7',
      '8',
      '9',
      '10',
      '11',
      '12',
    ],
    tambon: '',
    tambon_list: [],
    pcucode: '',
    pcucode_list: [],
    grocery: '',
    grocery_list: [],
    education: '',
    education_list: [],
    training: '',
    training_list: [],
    datacollector1: '',
    affiliate1: '',
    datacollector2: '',
    affiliate2: '',
    datacollector3: '',
    affiliate3: '',

    datestart: new Date().toISOString().substr(0, 10),
    timestart: new Date().toString().substr(16, 5),

    cleardate: new Date().toISOString().substr(0, 10),
    cleartime: new Date().toString().substr(16, 5),
    message: '',
    drugstoredetails: '',
    aa: '',
  }),
  //เวลาของ diaglog
  watch: {
    dialog(val) {
      if (!val) return

      setTimeout(() => (this.dialog = false), 500)
    },
  },
  mounted() {
    this.fetch_tambon()
    this.fetch_pcucode()
    this.fetch_grocery()
    this.fetch_education()
    this.fetch_training()
  },
  methods: {
    //ตำบล
    async fetch_tambon() {
      await axios
        .get(`${this.$axios.defaults.baseURL}t_tambon.php`)
        .then((response) => {
          this.tambon_list = response.data
          this.aa = this.tambon_list.map((item) => item.tambon)
        })
    },

    //สถานบริการ
    async fetch_pcucode() {
      await axios
        .get(`${this.$axios.defaults.baseURL}t_pcucode.php`)
        .then((response) => {
          this.pcucode_list = response.data
        })
    },
    //ประเภทร้าน
    async fetch_grocery() {
      await axios
        .get(`${this.$axios.defaults.baseURL}t_grocery.php`)
        .then((response) => {
          this.grocery_list = response.data
        })
    },
    //การศึกษา
    async fetch_education() {
      await axios
        .get(`${this.$axios.defaults.baseURL}t_education.php`)
        .then((response) => {
          this.education_list = response.data
        })
    },
    //การอบรมจากเจ้าหน้าที่
    async fetch_training() {
      await axios
        .get(`${this.$axios.defaults.baseURL}t_training.php`)
        .then((response) => {
          this.training_list = response.data
        })
    },
    //เพิ่มข้อมูล
    adddata() {
      if (
        !this.name ||
        !this.lastname ||
        !this.sex ||
        !this.age ||
        !this.storename ||
        !this.address ||
        !this.village ||
        !this.tambon ||
        !this.pcucode ||
        !this.grocery ||
        !this.education ||
        !this.training ||
        this.datestart ||
        this.timestart
      ) {
        this.$swal({
          title: 'แจ้งเตือน',
          text: 'ระบุข้อมูลไม่ครบหรือระบุไม่ถูกต้อง',
          icon: 'error',
          confirmButtonText: 'ตกลง',
        })
      } else {
        axios
          .post(`${this.$axios.defaults.baseURL}drugstore_add.php`, {
            name: this.name,
            lastname: this.lastname,
            sex: this.sex,
            age: this.age,
            storename: this.storename,
            address: this.address,
            village: this.village,
            tambon: this.tambon,
            pcucode: this.pcucode,
            grocery: this.grocery,
            education: this.education,
            training: this.training,
            datacollector1: this.datacollector1,
            affiliate1: this.affiliate1,
            datacollector2: this.datacollector2,
            affiliate2: this.affiliate2,
            datacollector3: this.datacollector3,
            affiliate3: this.affiliate3,
            datestart: this.datestart,
            timestart: this.timestart,
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
              this.cleartext()
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
    // reset ข้อมูล
    cleartext() {
      this.name = ''
      this.lastname = ''
      this.sex = ''
      this.age = ''
      this.storename = ''
      this.address = ''
      this.village = ''
      this.tambon = ''
      this.pcucode = ''
      this.grocery = ''
      this.education = ''
      this.training = ''
      this.datacollector1 = ''
      this.affiliate1 = ''
      this.datacollector2 = ''
      this.affiliate2 = ''
      this.datacollector3 = ''
      this.affiliate3 = ''
      this.datestart = this.cleardate
      this.timestart = this.cleartime
      this.btnshow = false
      window.scrollTo(0, 0)
    },
    //เลือก store ตาม id และ แสดง progress
    async showdiag(payload) {
      this.dialog = payload.dialog

      await axios
        .get(`${this.$axios.defaults.baseURL}drugstore_edit.php`, {
          params: {
            storeid: payload.storeid,
          },
        })
        .then((response) => {
          this.drugstoredetails = response.data
          this.drugstoredetails.forEach((leavedetail) => {
            this.storeid = leavedetail.storeid
            this.name = leavedetail.name
            this.lastname = leavedetail.lastname
            this.sex = leavedetail.sex
            this.age = leavedetail.age
            this.storename = leavedetail.storename
            this.address = leavedetail.address
            this.village = leavedetail.village
            this.tambon = leavedetail.tambon
            this.pcucode = leavedetail.pcucode
            this.grocery = leavedetail.grocery
            this.education = leavedetail.education
            this.training = leavedetail.training
            this.datacollector1 = leavedetail.datacollector1
            this.affiliate1 = leavedetail.affiliate1
            this.datacollector2 = leavedetail.datacollector2
            this.affiliate2 = leavedetail.affiliate2
            this.datacollector3 = leavedetail.datacollector3
            this.affiliate3 = leavedetail.affiliate3
            this.datestart = leavedetail.datestart
            this.timestart = leavedetail.timestart
          })
          this.btnshow = true
          window.scrollTo(0, 0)
        })
    },
    //update store

    updatestore: function () {
      if (!this.storeid) {
        this.$swal({
          title: 'แจ้งเตือน',
          text: 'ไม่พบข้อมูล',
          icon: 'error',
          confirmButtonText: 'ตกลง',
        })
      } else {
        axios
          .put(`${this.$axios.defaults.baseURL}drugstore_update.php`, {
            storeid: this.storeid,
            name: this.name,
            lastname: this.lastname,
            sex: this.sex,
            age: this.age,
            storename: this.storename,
            address: this.address,
            village: this.village,
            tambon: this.tambon,
            pcucode: this.pcucode,
            grocery: this.grocery,
            education: this.education,
            training: this.training,
            datacollector1: this.datacollector1,
            affiliate1: this.affiliate1,
            datacollector2: this.datacollector2,
            affiliate2: this.affiliate2,
            datacollector3: this.datacollector3,
            affiliate3: this.affiliate3,
            datestart: this.datestart,
            timestart: this.timestart,
          })
          .then((response) => {
            this.message = response.data
            if (this.message[0].message === 'แก้ไขข้อมูลสำเร็จ') {
              this.$swal({
                title: 'สถานะการแก้ไข',
                text: this.message[0].message,
                icon: 'success',
                confirmButtonText: 'ตกลง',
              })
              this.cleartext()
              //เรียก refresh table ใน component
              this.$refs.child.refresh_drugstore()
            } else {
              this.$swal({
                title: 'สถานะการแก้ไข',
                text: this.message[0].message,
                icon: 'error',
                confirmButtonText: 'ตกลง',
              })
            }
          })
      }
    },
    //ลบข้อมูล
    removeleave() {
      if (!this.storeid) {
        this.$swal({
          title: 'แจ้งเตือน',
          text: 'ไม่พบข้อมูล',
          icon: 'error',
          confirmButtonText: 'ตกลง',
        })
      } else {
        this.$swal({
          title: 'คุณแน่ใจว่าต้องการลบข้อมูลนี้?',
          text: 'ไอดี: ' + this.storeid,
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#51adcf',
          cancelButtonColor: '#686d76',
          confirmButtonText: 'ลบ',
          cancelButtonText: 'ยกเลิก',
        }).then((result) => {
          if (result.isConfirmed) {
            axios
              .put(`${this.$axios.defaults.baseURL}drugstore_delete.php`, {
                storeid: this.storeid,
              })
              .then((response) => {
                this.message = response.data

                if (this.message[0].message === 'ลบข้อมูลสำเร็จ') {
                  this.$swal({
                    title: 'สถานะการลบ',
                    text: this.message[0].message,
                    icon: 'success',
                    confirmButtonText: 'ตกลง',
                  })
                  this.cleartext()
                  //เรียก refresh table ใน component
                  this.$refs.child.refresh_drugstore()
                } else {
                  this.$swal({
                    title: 'สถานะการลบ',
                    text: this.message[0].message,
                    icon: 'error',
                    confirmButtonText: 'ตกลง',
                  })
                }
              })
          }
        })
      }
    },
  },
}
</script>
<style>
.v-text-field input {
  font-size: 1.2em;
}
</style>
