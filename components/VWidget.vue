<template>
  <div id="v-widget">
    <v-card>
      <v-toolbar
        color="purple darken-3"
        flat
        dense
        dark
        card
        v-if="enableHeader"
      >
        <v-toolbar-title
          ><h5>
            <v-icon dark>{{ icon }}</v-icon> {{ title }}
          </h5></v-toolbar-title
        >
        <v-spacer></v-spacer>
        <slot name="widget-header-action"></slot>
      </v-toolbar>
      <v-divider v-if="enableHeader"></v-divider>
      <v-card-text :class="contentBg">
        <slot name="widget-content"></slot>
      </v-card-text>
    </v-card>
  </div>
</template>

<script>
export default {
  name: 'v-widget',
  props: {
    title: {
      type: String,
    },
    icon: {
      type: String,
      default: '',
    },
    enableHeader: {
      type: Boolean,
      default: true,
    },
    contentBg: {
      type: String,
      default: 'white',
    },
  },

  data() {
    return {}
  },
  computed: {},
}
</script>
