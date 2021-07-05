<template>
  <inertia-link :href="'/'">
    <img class="w-60" :src="image" alt="Mechanicus logo">
  </inertia-link>
</template>

<script>
  import image from '../../../image/mechanicus-logo.png'

  export default {
    data() {
      return {
        image: image
      }
    }
  }
</script>
