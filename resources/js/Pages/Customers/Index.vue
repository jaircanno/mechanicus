<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-white leading-tight">
        Clientes
      </h2>
    </template>

    <div>
      <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <!-- ToDo: Implemented the Customer list section -->

      </div>
    </div>
  </app-layout>
</template>

<script>
  import AppLayout from '../../Layouts/AppLayout';

  export default {
    name: 'Index',

    props: ['customers'],

    components: {
      AppLayout
    },
  }
</script>

<style scoped>

</style>