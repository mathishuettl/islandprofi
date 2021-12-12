<template>
  <div class="grid grid-cols-4 gap-4 mt-4 mb-8">
    <div class="relative" v-for="image in images">
      <div class="absolute top-0 right-0 bg-black/75 z-9">
        <button @click="deleteImage(image.path)" type="button" class="button small">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
          </svg>
        </button>
      </div>
      <div class="w-full h-40 bg-cover border border-gray-300" :style="`background-image: url(${image.url})`"></div>
    </div>
  </div>
</template>

<script>
  export default {
    props: {
      images: []
    },
    mounted() {
      console.log(this.images)
    },
    methods: {
      deleteImage: function(path) {
        if (confirm("Dieses Bild wirklich unwiderruflich löschen")) {
          axios.post("/api/image/delete", { path }).then(response => {
            this.images = this.images.filter(x => x.path !== path)
          }).catch(err => {
            console.log(err)
            alert("Fehler beim löschen des Bildes")
          })
        }
      }
    }
  }
</script>
