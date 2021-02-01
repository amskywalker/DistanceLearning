<template>
  <auth-layout>
    <form @submit.prevent="submit" class="h-4/4 w-3/4 sm:h-2/4 w-2/4">
      <div class="title mb-5">
        <h3 class="font-bold text-2xl">Criar sua conta</h3>
      </div>
      <div class="form-group flex flex-col justify-between my-7">
        <label for="name" class="mb-2 text-gray-400 font-bold">Nome</label>
        <input
          class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
          id="name"
          v-model='form.name' type="text">
      </div>
      <div class="form-group flex flex-col justify-between my-7">
        <label for="email" class="mb-2 text-gray-400 font-bold">Email</label>
        <input
          class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
          id="email"
          v-model='form.email' type="email">
      </div>
      <div class="form-group flex flex-col justify-between my-7">
        <label for="password" class="mb-2 text-gray-400 font-bold">Senha</label>
        <input
          class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
          id="password"
          v-model='form.password' type="password">
      </div>
      <div class="form-group flex flex-col justify-between mb-5">
        <label for="password_confirmation" class="mb-2 text-gray-400 font-bold">Confirme a sua senha</label>
        <input
          class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
          id="password_confirmation"
          v-model='form.password_confirmation' type="password">
      </div>
      <div class="form-group mb-4">
        <button type="submit"
                class="flex justify-center items-center w-full px-4 py-2 text-white rounded-md font-bold bg-blue-600 hover:bg-blue-700 transition ease-in-out duration-150">
          Registrar
        </button>
      </div>
      <div class="form-group flex flex-col justify-center items-center">
        <p class="text-gray-600"> Já tem uma conta? Clique
          <inertia-link :href="route('login')"
                        class="mb-4 underline text-sm text-blue-600 hover:text-blue-900">
            aqui
          </inertia-link>
        </p>
      </div>
    </form>
  </auth-layout>
</template>

<script>
import AuthLayout from '@/Layouts/AuthLayout'

    export default {
        components: {
            AuthLayout
        },

        data() {
            return {
                form: this.$inertia.form({
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                    terms: false,
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('register'), {
                    onFinish: () => this.form.reset('password', 'password_confirmation'),
                })
            }
        }
    }
</script>
