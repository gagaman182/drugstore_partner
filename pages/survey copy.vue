<template>
  <v-container grid-list-xl fluid>
    <!-- <v-layout column> -->
    <v-layout row wrap justify-center align-center>
      <v-flex sm12>
        <v-widget title="  ข้อมูลยาที่พบจากการสำรวจในร้าน" icon="mdi-store ">
          <div slot="widget-content">
            <v-row>
              <v-col cols="12">
                <v-card class="teal lighten-1" dark>
                  <v-card-title>
                    <h3 class="yellow--text text--darken-2">
                      ค้นหาชื่อร้าน
                      <v-icon class="yellow--text text--darken-2" medium
                        >mdi-credit-card-search
                      </v-icon>
                    </h3>
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
                    ></v-autocomplete>
                  </v-card-text>
                </v-card>
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
            <surveydrug :storeid="storeid" @clear-form="clearform"></surveydrug>
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
import axios from 'axios'
export default {
  name: 'servey',
  components: {
    surveydrug,
    VWidget,
  },
  data: () => ({
    dialog: false,
    chips: false,

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
          // console.log(this.storedetails)
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
    clearform(payload) {
      if (payload.clears === 'clear') {
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
