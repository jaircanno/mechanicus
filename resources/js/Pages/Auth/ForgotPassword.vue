<template>
  <authentication-card>
    <template #logo>
      <authentication-card-logo />
    </template>

    <div class="mb-4 text-sm text-gray-600">
      ¿Olvidó su contraseña? No hay problema. Simplemente díganos su dirección de correo electrónico y le enviaremos
      un enlace para restablecer la contraseña y le permita elegir una nueva.
    </div>

    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
      {{ status }}
    </div>

    <jet-validation-errors class="mb-4" />

    <form @submit.prevent="submit">
      <div>
        <jet-label for="email" value="Correo Electrónico" />
        <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus />
      </div>

      <div class="flex items-center justify-end mt-4">
        <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
            Enviar Correo
        </jet-button>
      </div>
    </form>

  </authentication-card>
</template>

<script>
  import AuthenticationCard from '@/Components/Auth/AuthenticationCard'
  import AuthenticationCardLogo from '@/Components/Auth/AuthenticationCardLogo'
  import JetButton from '@/Jetstream/Button'
  import JetInput from '@/Jetstream/Input'
  import JetLabel from '@/Jetstream/Label'
  import JetValidationErrors from '@/Jetstream/ValidationErrors'

  export default {
    components: {
      AuthenticationCard,
      AuthenticationCardLogo,
      JetButton,
      JetInput,
      JetLabel,
      JetValidationErrors
    },

    props: {
      status: String
    },

    data() {
      return {
        form: this.$inertia.form({
            email: ''
        })
      }
    },

    methods: {
      submit() {
        this.form.post(this.route('password.email'))
      }
    }
  }
</script>
