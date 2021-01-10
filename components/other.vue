<template>
  <div>
    <v-row>
      <v-col cols="12">
        <v-card>
          <v-card-text dark>
            <v-row>
              <v-col cols="12">
                <h2>
                  ระบุรายละเอียด เหตุผลอื่นๆในการขายยาในร้านชำ หรือ
                  รายการยาอื่นๆที่พบในร้านทุกรายการ
                </h2>
              </v-col>
              <v-col cols="12">
                <v-textarea
                  filled
                  auto-grow
                  row-height="30"
                  shaped
                  v-model="other"
                ></v-textarea>
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
  name: 'other',
  props: {
    storeid: null,
  },
  data: () => ({
    other: '',
  }),
  mounted() {},
  methods: {
    adddata() {
      if (this.other) {
        axios
          .post(`${this.$axios.defaults.baseURL}other_add.php`, {
            storeid: this.storeid,
            other: this.other,
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
    clear() {
      this.other = ''
    },
  },
}
</script>
