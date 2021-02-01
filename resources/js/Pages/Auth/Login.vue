<template>
    <auth-layout>
        <form @submit.prevent="submit" class="h-4/4 w-3/4 sm:h-2/4 w-2/4 md:1/4 w-3/4">
            <div class="title mb-5">
                <h3 class="font-bold text-2xl">Entrar na sua conta</h3>
            </div>
            <div class="form-group flex flex-col justify-between my-7">
                <label for="email" class="mb-2 text-gray-400 font-bold">Email</label>
                <input
                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    id="email"
                    v-model='form.email' type="text">
            </div>
            <div class="form-group flex flex-col justify-between mb-2">
                <label for="password" class="mb-2 text-gray-400 font-bold">Senha</label>
                <input
                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    id="password"
                    v-model='form.password' type="password">
            </div>
            <div class="form-group flex flex-col justify-end items-end">
                <inertia-link v-if="canResetPassword" :href="route('password.request')"
                              class="mb-4 underline text-sm text-gray-500 hover:text-gray-900">
                    Esqueceu a sua senha?
                </inertia-link>
            </div>
            <div class="form-group mb-4">
                <button type="submit"
                        class="flex justify-center items-center w-full px-4 py-2 text-white rounded-md font-bold bg-blue-600 hover:bg-blue-700 transition ease-in-out duration-150">
                    Entrar
                </button>
            </div>
            <div class="form-group flex flex-col justify-center items-center">
                <p class="text-gray-600"> Não tem uma conta? Clique
                    <inertia-link :href="route('register')"
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

    props: {
        canResetPassword: Boolean,
        status: String
    },

    data() {
        return {
            form: this.$inertia.form({
                email: '',
                password: '',
                remember: false
            })
        }
    },

    methods: {
        submit() {
            console.log(this.form.email, this.form.password);
            this.form
                .transform(data => ({
                    ...data,
                    remember: this.form.remember ? 'on' : ''
                }))
                .post(this.route('login'), {
                    onFinish: () => this.form.reset('password'),
                })
        }
    }
}
</script>
