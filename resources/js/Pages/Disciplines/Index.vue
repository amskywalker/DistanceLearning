<template>
  <app-layout>
    <div class="container p-10">
      <div class="header mb-6">
        <h4 class="text-2xl text-gray-400 font-bold">Disciplinas</h4>
      </div>
      <inertia-link :href="href" :key="discipline.id" v-for="discipline in disciplines">
        <div class="card h-32 w-60 bg-white shadow flex flex-col justify-center items-center">
          <div class="card-content h-full flex flex-col justify-center items-center">
            <h3 class="text-xl text-blue-600 font-bold">{{ discipline.name }}</h3>
            <h2 class="text-base text-black font-bold">{{ discipline.teacher }}</h2>
          </div>
        </div>
      </inertia-link>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'

export default {
  props: {
    disciplines: Array | Object,
  },
  components: {
    AppLayout
  },
}
</script>
