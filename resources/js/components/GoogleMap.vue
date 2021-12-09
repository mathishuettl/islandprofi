<template>
  <GmapMap :center='center' :zoom='5' style='width:100%;  height: 400px;'>
    <GmapMarker
    :key="index"
    v-for="(location, index) in locations"
    :position="{ lat: parseFloat(location.lat), lng: parseFloat(location.lng) }"
    :clickable="true"
    :draggable="false"
  />
  </GmapMap>
</template>

<script>

  export default {
    props: {
      locations: []
    },
    data() {
      return {
        center: { lat: 64.963051, lng: -19.020836 },
      }
    },
    mounted() {
      console.log(this.locations)
    }
  }
</script>
