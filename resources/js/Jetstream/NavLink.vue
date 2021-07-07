<template>
  <inertia-link :href="href" :class="classes">
    <slot></slot>
  </inertia-link>
</template>

<script>
  export default {
    props: ['href', 'active'],

    computed: {
      classes() {
        return this.active
          ? 'inline-flex items-center px-1 pt-1 border-b-2 border-red-500 text-base leading-5 text-gray-200 ' +
            'focus:outline-none focus:text-white focus:border-red-700 transition'
          : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm leading-5 text-gray-400 ' +
            'hover:text-white hover:border-red-300 focus:outline-none focus:text-white focus:border-red-300 transition'
        }
      }
  }
</script>
