<template>
  <inertia-link :href="'/'">
    <img class="w-60" :src="image" alt="Mechanicus mark logo">
  </inertia-link>
</template>

<script>
import image from '../../../image/mechanicus-mark-logo.png'

export default {
  data() {
    return {
      image: image
    }
  }
}
</script>
