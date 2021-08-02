<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-white leading-tight">
        Clientes
      </h2>
    </template>

    <div class="py-12 bg-gray-200">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <!-- Header section -->
        <div class="mb-6 flex justify-between items-center">
          <!-- ToDo: Add a filter here-->

          <inertia-link :href="route('customers.create')" class="inline-flex items-center px-4 py-2
            bg-blueMechanic700 border border-transparent rounded-md
            font-semibold text-xs text-white uppercase tracking-widest
            hover:bg-blueMechanic500 active:bg-blueMechanic700
            focus:outline-none focus:border-blueMechanic500 focus:ring focus:ring-blueMechanic700
            disabled:opacity-25 transition">
            <span>Crear Cliente</span>
          </inertia-link>
        </div>

        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <!-- Customers table -->
          <div class="bg-white rounded-md shadow overflow-x-auto">
            <table class="w-full whitespace-nowrap">
              <tr class="text-left font-bold">
                <th class="px-6 pt-6 pb-4">Nombre</th>
                <th class="px-6 pt-6 pb-4">RFC</th>
                <th class="px-6 pt-6 pb-4">Teléfono Móvil</th>
                <th class="px-6 pt-6 pb-4" colspan="2">Correo Electrónico</th>
              </tr>

              <tr v-for="customer in customers" :key="customer.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
                <td class="border-t">
                  {{ customer.first_name + ' ' + customer.last_name }}
                </td>
                <td class="border-t">
                  {{ customer.rfc }}
                </td>
                <td class="border-t">
                  {{ customer.cell_phone_number }}
                </td>
                <td class="border-t w-px">
                  {{ customer.email }}
                </td>
              </tr>

              <tr v-if="customers.length === 0">
                <td class="border-t px-6 py-4" colspan="4">
                  No hay clientes registrados aún.
                </td>
              </tr>
            </table>
          </div>

        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
  import AppLayout from '../../Layouts/AppLayout'

  export default {
    name: 'Index',

    components: {
      AppLayout
    },

    props: ['customers'],

  }
</script>

<style scoped>

</style>