<template>
  <v-container grid-list-xl fluid>
    <!-- <v-layout column> -->
    <v-layout row wrap justify-center align-center>
      <v-flex sm12>
        <v-widget title="  ข้อมูลยาที่พบจากการสำรวจในร้าน" icon="mdi-pill ">
          <div slot="widget-content">
            <v-row>
              <v-col cols="12">
                <v-card class="teal lighten-1" dark>
                  <v-card-title>
                    <h4 class="yellow--text text--darken-2">
                      บันทึกการสำรวจยาในร้าน
                      <!-- <v-icon class="yellow--text text--darken-2" medium
                        >mdi-credit-card-search
                      </v-icon> -->
                    </h4>
                  </v-card-title>
                  <v-card-text dark>
                    <v-autocomplete
                      v-model="store_name_select"
                      :items="store_name_all"
                      item-text="storename"
                      item-value="storeid"
                      dense
                      filled
                      label="ชื่อแหล่งซื้อ"
                      v-on:change="onChange"
                      prepend-icon="mdi-database-search"
                    ></v-autocomplete>
                  </v-card-text>
                </v-card>
              </v-col>
            </v-row>

            <v-row>
              <v-col cols="12"
                ><survey_data
                  @show-dialog="showdiag"
                  ref="refresh"
                ></survey_data>
              </v-col>
            </v-row>

            <v-row>
              <v-col cols="12">
                <v-card>
                  <v-card-title>
                    <h4>
                      ข้อมูลทั่วไป
                      <v-icon medium>mdi-store </v-icon>
                    </h4>
                    <div v-if="textedit">
                      <v-chip class="ma-2" color="orange" text-color="white">
                        แก้ไข
                      </v-chip>
                    </div>
                    <div v-if="textadd">
                      <v-chip
                        class="ma-2"
                        color="teal lighten-1"
                        text-color="white"
                      >
                        เพิ่ม
                      </v-chip>
                    </div>
                  </v-card-title>

                  <v-card-text dark>
                    <v-row>
                      <v-col cols="12" md="3"
                        ><div class="title grey--text text--darken-1">
                          หมายเลข ID:

                          <v-chip class="ma-2" v-if="chips">
                            <strong> {{ storeid }}</strong>
                          </v-chip>
                        </div>
                      </v-col>
                      <v-col cols="12" md="3"
                        ><div class="title grey--text text--darken-1">
                          ชื่อ-สกุล :

                          <v-chip class="ma-2" v-if="chips">
                            <strong> {{ name }}</strong>
                            <strong> {{ lastname }}</strong>
                          </v-chip>
                        </div>
                      </v-col>
                      <v-col cols="12" md="2"
                        ><div class="title grey--text text--darken-1">
                          เพศ:
                          <v-chip class="ma-2" v-if="chips">
                            <strong> {{ sex }}</strong>
                          </v-chip>
                        </div>
                      </v-col>
                      <v-col cols="12" md="2"
                        ><div class="title grey--text text--darken-1">
                          อายุ:
                          <v-chip class="ma-2" v-if="chips">
                            <strong> {{ age }}</strong>
                          </v-chip>

                          ปี
                        </div>
                      </v-col>
                    </v-row>
                    <v-row>
                      <v-col cols="12" md="3"
                        ><div class="title grey--text text--darken-1">
                          ชื่อร้าน:
                          <v-chip class="ma-2" v-if="chips">
                            <strong> {{ storename }}</strong>
                          </v-chip>
                        </div>
                      </v-col>
                      <v-col cols="12" md="2"
                        ><div class="title grey--text text--darken-1">
                          ที่ตั้งเลขที่:
                          <v-chip class="ma-2" v-if="chips">
                            <strong> {{ address }}</strong>
                          </v-chip>
                        </div>
                      </v-col>
                      <v-col cols="12" md="1"
                        ><div class="title grey--text text--darken-1">
                          หมู่:
                          <v-chip class="ma-2" v-if="chips">
                            <strong> {{ village }}</strong>
                          </v-chip>
                        </div>
                      </v-col>
                      <v-col cols="12" md="2"
                        ><div class="title grey--text text--darken-1">
                          หมู่:

                          <v-chip class="ma-2" v-if="chips">
                            <strong> {{ tambon }}</strong>
                          </v-chip>
                        </div>
                      </v-col>
                      <v-col cols="12" md="4"
                        ><div class="title grey--text text--darken-1">
                          พื้นที่ รพสต:

                          <v-chip class="ma-2" v-if="chips">
                            <strong> {{ pcucode }}</strong>
                          </v-chip>
                        </div>
                      </v-col>
                    </v-row>
                    <v-row>
                      <v-col cols="12" md="3"
                        ><div class="title grey--text text--darken-1">
                          ประเภทร้าน:

                          <v-chip class="ma-2" v-if="chips">
                            <strong> {{ grocery }}</strong>
                          </v-chip>
                        </div>
                      </v-col>
                      <v-col cols="12" md="3"
                        ><div class="title grey--text text--darken-1">
                          การศึกษา:

                          <v-chip class="ma-2" v-if="chips">
                            <strong> {{ education }}</strong>
                          </v-chip>
                        </div>
                      </v-col>
                      <v-col cols="12" md="5"
                        ><div class="title grey--text text--darken-1">
                          ผ่านการอบรม:

                          <v-chip class="ma-2" v-if="chips">
                            <strong> {{ training }}</strong>
                          </v-chip>
                        </div>
                      </v-col>
                      <v-col cols="12"
                        ><div class="title grey--text text--darken-1">
                          ผู้เก็บข้อมูล
                        </div>
                      </v-col>
                      <v-col cols="12" md="6"
                        ><div class="title grey--text text--darken-1">
                          1:
                          <v-chip class="ma-2" v-if="chips">
                            <strong> {{ datacollector1 }}</strong>
                          </v-chip>
                        </div>
                      </v-col>
                      <v-col cols="12" md="6"
                        ><div class="title grey--text text--darken-1">
                          สังกัด:
                          <v-chip class="ma-2" v-if="chips">
                            <strong> {{ affiliate1 }}</strong>
                          </v-chip>
                        </div>
                      </v-col>
                      <v-col cols="12" md="6"
                        ><div class="title grey--text text--darken-1">
                          2:
                          <v-chip class="ma-2" v-if="chips">
                            <strong> {{ datacollector2 }}</strong>
                          </v-chip>
                        </div>
                      </v-col>
                      <v-col cols="12" md="6"
                        ><div class="title grey--text text--darken-1">
                          สังกัด:
                          <v-chip class="ma-2" v-if="chips">
                            <strong> {{ affiliate2 }}</strong>
                          </v-chip>
                        </div>
                      </v-col>
                      <v-col cols="12" md="6"
                        ><div class="title grey--text text--darken-1">
                          3:
                          <v-chip class="ma-2" v-if="chips">
                            <strong> {{ datacollector3 }}</strong>
                          </v-chip>
                        </div>
                      </v-col>
                      <v-col cols="12" md="6"
                        ><div class="title grey--text text--darken-1">
                          สังกัด:
                          <v-chip class="ma-2" v-if="chips">
                            <strong> {{ affiliate3 }}</strong>
                          </v-chip>
                        </div>
                      </v-col>
                      <v-col cols="12" md="6"
                        ><div class="title grey--text text--darken-1">
                          วันที่เก็บข้อมูล:
                          <v-chip class="ma-2" v-if="chips">
                            <strong> {{ datestart }}</strong>
                          </v-chip>
                        </div>
                      </v-col>
                      <v-col cols="12" md="6"
                        ><div class="title grey--text text--darken-1">
                          เวลา:
                          <v-chip class="ma-2" v-if="chips">
                            <strong> {{ timestart }}</strong>
                          </v-chip>
                        </div>
                      </v-col>
                    </v-row>
                  </v-card-text>
                </v-card>
              </v-col>
            </v-row>
            <v-row>
              <v-col cols="12">
                <surveydrug
                  :storeid="storeid"
                  :storeidedit="storeidedit"
                  ref="child"
                ></surveydrug>
                <surveydrug2
                  :storeid="storeid"
                  :storeidedit="storeidedit"
                  ref="child2"
                ></surveydrug2>
                <surveydrug3
                  :storeid="storeid"
                  :storeidedit="storeidedit"
                  ref="child3"
                ></surveydrug3>
                <surveydrug4
                  :storeid="storeid"
                  :storeidedit="storeidedit"
                  ref="child4"
                ></surveydrug4>
                <surveydrug5
                  :storeid="storeid"
                  :storeidedit="storeidedit"
                  ref="child5"
                ></surveydrug5>
                <surveydrug6
                  :storeid="storeid"
                  :storeidedit="storeidedit"
                  ref="child6"
                ></surveydrug6>
                <surveydrug7
                  :storeid="storeid"
                  :storeidedit="storeidedit"
                  ref="child7"
                ></surveydrug7>
                <surveydrug8
                  :storeid="storeid"
                  :storeidedit="storeidedit"
                  ref="child8"
                ></surveydrug8>
                <surveydrug9
                  :storeid="storeid"
                  :storeidedit="storeidedit"
                  ref="child9"
                ></surveydrug9>
                <surveydrug10
                  :storeid="storeid"
                  :storeidedit="storeidedit"
                  ref="child10"
                ></surveydrug10>
                <surveydrug11
                  :storeid="storeid"
                  :storeidedit="storeidedit"
                  ref="child11"
                ></surveydrug11>
                <surveydrug12
                  :storeid="storeid"
                  :storeidedit="storeidedit"
                  ref="child12"
                ></surveydrug12>
                <other
                  :storeid="storeid"
                  :storeidedit="storeidedit"
                  ref="other"
                ></other>
              </v-col>
              <v-col cols="12" align="end">
                <v-btn
                  large
                  v-if="!btnshow"
                  class="red--text text--lighten-5"
                  color="teal lighten-1"
                  flat
                  @click="adds"
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
import surveydrug from '@/components/surveydrug'
import surveydrug2 from '@/components/surveydrug2'
import surveydrug3 from '@/components/surveydrug3'
import surveydrug4 from '@/components/surveydrug4'
import surveydrug5 from '@/components/surveydrug5'
import surveydrug6 from '@/components/surveydrug6'
import surveydrug7 from '@/components/surveydrug7'
import surveydrug8 from '@/components/surveydrug8'
import surveydrug9 from '@/components/surveydrug9'
import surveydrug10 from '@/components/surveydrug10'
import surveydrug11 from '@/components/surveydrug11'
import surveydrug12 from '@/components/surveydrug12'
import other from '@/components/other'
import survey_data from '@/components/survey_data'
import axios from 'axios'
export default {
  name: 'servey',
  components: {
    surveydrug,
    surveydrug2,
    surveydrug3,
    surveydrug4,
    surveydrug5,
    surveydrug6,
    surveydrug7,
    surveydrug8,
    surveydrug9,
    surveydrug10,
    surveydrug11,
    surveydrug12,
    other,
    VWidget,
    survey_data,
  },
  data: () => ({
    dialog: false,
    chips: false,
    btnshow: false,

    store_name_all: '',
    store_name: '',
    store_name_select: '',
    storenamedetail: '',
    storedetail: '',
    storeid: '',
    name: '',
    lastname: '',
    sex: '',
    age: '',
    storeidedit: '',
    textedit: false,
    textadd: false,
  }),
  //เวลาของ diaglog
  watch: {
    dialog(val) {
      if (!val) return

      setTimeout(() => (this.dialog = false), 500)
    },
  },
  mounted() {
    this.fetch_store()
  },
  methods: {
    //แสดงข้อมูลชื่อร้าน
    fetch_store() {
      axios
        .get(`${this.$axios.defaults.baseURL}store_auto_search.php`)
        .then((response) => {
          this.store_name_all = response.data
        })
    },
    //เลือก store ตาม id และ แสดง progress
    async onChange() {
      this.textadd = true
      this.btnshow = false
      this.textedit = false

      //clear ใน component
      this.$refs.child.clear()
      this.$refs.child2.clear()
      this.$refs.child3.clear()
      this.$refs.child4.clear()
      this.$refs.child5.clear()
      this.$refs.child6.clear()
      this.$refs.child7.clear()
      this.$refs.child8.clear()
      this.$refs.child9.clear()
      this.$refs.child10.clear()
      this.$refs.child11.clear()
      this.$refs.child12.clear()
      this.$refs.other.clear()
      // refresh table
      this.$refs.refresh.refresh_drugstore()
      //หลับไปด้านบน
      window.scrollTo(0, 0)
      await axios
        .get(`${this.$axios.defaults.baseURL}store_search.php`, {
          params: {
            storeid: this.store_name_select,
          },
        })
        .then((response) => {
          this.dialog = true
          this.change = true
          this.storedetails = response.data

          this.storedetails.forEach((storenamedetail) => {
            this.storeid = storenamedetail.storeid
            this.name = storenamedetail.name
            this.lastname = storenamedetail.lastname
            this.sex = storenamedetail.sex
            this.age = storenamedetail.age
            this.storename = storenamedetail.storename
            this.address = storenamedetail.address
            this.village = storenamedetail.village
            this.tambon = storenamedetail.tambon
            this.pcucode = storenamedetail.pcucode
            this.grocery = storenamedetail.grocery
            this.education = storenamedetail.education
            this.training = storenamedetail.training
            this.datacollector1 = storenamedetail.datacollector1
            this.affiliate1 = storenamedetail.affiliate1
            this.datacollector2 = storenamedetail.datacollector2
            this.affiliate2 = storenamedetail.affiliate2
            this.datacollector3 = storenamedetail.datacollector3
            this.affiliate3 = storenamedetail.affiliate3
            this.datestart = storenamedetail.datestart
            this.timestart = storenamedetail.timestart
          })

          window.scrollTo(0, 0)

          this.chips = true
        })
    },
    clearform() {
      this.storeid = ''
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
      this.datestart = ''
      this.timestart = ''
      this.store_name_select = ''
      this.chips = false
      this.dialog = false
      this.btnshow = false
      this.textedit = false
      this.textadd = false
    },
    //เรียกใช้ function ในแต่ล่ะ components
    adds() {
      this.addsurvey()
      this.$refs.child.adddata()
      this.$refs.child2.adddata()
      this.$refs.child3.adddata()
      this.$refs.child4.adddata()
      this.$refs.child5.adddata()
      this.$refs.child6.adddata()
      this.$refs.child7.adddata()
      this.$refs.child8.adddata()
      this.$refs.child9.adddata()
      this.$refs.child10.adddata()
      this.$refs.child11.adddata()
      this.$refs.child12.adddata()
      this.$refs.other.adddata()
      this.clearform()
      window.scrollTo(0, 0)
      this.$refs.refresh.fetch_drugstore()
      //clear ใน component
      this.$refs.child.clear()
      this.$refs.child2.clear()
      this.$refs.child3.clear()
      this.$refs.child4.clear()
      this.$refs.child5.clear()
      this.$refs.child6.clear()
      this.$refs.child7.clear()
      this.$refs.child8.clear()
      this.$refs.child9.clear()
      this.$refs.child10.clear()
      this.$refs.child11.clear()
      this.$refs.child12.clear()
      this.$refs.other.clear()
    },

    addsurvey() {
      axios
        .post(`${this.$axios.defaults.baseURL}main_survey.php`, {
          storeid: this.storeid,
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
          } else {
            this.$swal({
              title: 'สถานะการเพิ่ม',
              text: this.message[0].message,
              icon: 'error',
              confirmButtonText: 'ตกลง',
            })
          }
        })
    },

    //เลือก store ตาม id และ แสดง progress
    async showdiag(payload) {
      this.store_name_select = ''
      this.textedit = true
      this.textadd = false
      this.dialog = payload.dialog
      this.storeidedit = payload.storeid

      await axios
        .get(`${this.$axios.defaults.baseURL}store_search.php`, {
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
          this.chips = true
          // window.scrollTo(0, 0)
        })

      this.$refs.child.edit_survey()
      this.$refs.child2.edit_survey()
      this.$refs.child3.edit_survey()
      this.$refs.child4.edit_survey()
      this.$refs.child5.edit_survey()
      this.$refs.child6.edit_survey()
      this.$refs.child7.edit_survey()
      this.$refs.child8.edit_survey()
      this.$refs.child9.edit_survey()
      this.$refs.child10.edit_survey()
      this.$refs.child11.edit_survey()
      this.$refs.child12.edit_survey()
      this.$refs.other.edit_survey()
      this.btnshow = true
    },

    updatestore() {
      this.$refs.child.update_survey()
      this.$refs.child2.update_survey()
      this.$refs.child3.update_survey()
      this.$refs.child4.update_survey()
      this.$refs.child5.update_survey()
      this.$refs.child6.update_survey()
      this.$refs.child7.update_survey()
      this.$refs.child8.update_survey()
      this.$refs.child9.update_survey()
      this.$refs.child10.update_survey()
      this.$refs.child11.update_survey()
      this.$refs.child12.update_survey()
      this.$refs.other.update_survey()
      this.btnshow = false
      this.textedit = false
      this.clearform()
      window.scrollTo(0, 0)
      this.$refs.refresh.fetch_drugstore()
      //clear ใน component
      this.$refs.child.clear()
      this.$refs.child2.clear()
      this.$refs.child3.clear()
      this.$refs.child4.clear()
      this.$refs.child5.clear()
      this.$refs.child6.clear()
      this.$refs.child7.clear()
      this.$refs.child8.clear()
      this.$refs.child9.clear()
      this.$refs.child10.clear()
      this.$refs.child11.clear()
      this.$refs.child12.clear()
      this.$refs.other.clear()
    },
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
            //romvoe source
            axios
              .put(`${this.$axios.defaults.baseURL}source_delete.php`, {
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
                  this.clearform()
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
            //romvoe motivation
            axios
              .put(`${this.$axios.defaults.baseURL}motivation_delete.php`, {
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
                  this.clearform()
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

            //romvoe generic
            axios
              .put(`${this.$axios.defaults.baseURL}generic_delete.php`, {
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
                  this.clearform()
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

            //romvoe drugstore_select
            axios
              .put(
                `${this.$axios.defaults.baseURL}drugstore_select_delete.php`,
                {
                  storeid: this.storeid,
                }
              )
              .then((response) => {
                this.message = response.data
                if (this.message[0].message === 'ลบข้อมูลสำเร็จ') {
                  this.$swal({
                    title: 'สถานะการลบ',
                    text: this.message[0].message,
                    icon: 'success',
                    confirmButtonText: 'ตกลง',
                  })
                  this.clearform()
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

            //romvoe tradename
            axios
              .put(`${this.$axios.defaults.baseURL}tradename_delete.php`, {
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
                  this.clearform()
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

            //romvoe other
            axios
              .put(`${this.$axios.defaults.baseURL}other_delete.php`, {
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
                  this.clearform()
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

            //romvoe main
            axios
              .put(`${this.$axios.defaults.baseURL}main_survey_delete.php`, {
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
                  this.clearform()
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

            //clear ใน component
            this.$refs.child.clear()
            this.$refs.child2.clear()
            this.$refs.child3.clear()
            this.$refs.child4.clear()
            this.$refs.child5.clear()
            this.$refs.child6.clear()
            this.$refs.child7.clear()
            this.$refs.child8.clear()
            this.$refs.child9.clear()
            this.$refs.child10.clear()
            this.$refs.child11.clear()
            this.$refs.child12.clear()
            this.$refs.other.clear()
            // refresh table
            this.$refs.refresh.refresh_drugstore()
            //หลับไปด้านบน
            window.scrollTo(0, 0)
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
