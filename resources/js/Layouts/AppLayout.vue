<template>
  <div class="app h-screen w-screen bg-gray-100">
    <sidebar>
      <template v-slot:study-options-links>
        <sidebar-links :href="route('disciplines.index')">
          Disciplinas
        </sidebar-links>
        <sidebar-links href="">
          Atividades
        </sidebar-links>
      </template>
      <template v-slot:account-options-links>
        <sidebar-links :href="route('profile.show')">
          Meu Perfil
        </sidebar-links>
      </template>
      <template v-slot:support-options-links>
        <sidebar-links href="">
          Sugestões
        </sidebar-links>
      </template>
      <template v-slot:logout-option-link>
        <form method="POST" @submit.prevent="logout">
          <button class="h-10 w-full my-1 hover:bg-gray-200 flex items-center">
            Logout
          </button>
        </form>
      </template>
    </sidebar>
    <main class="main">
      <slot></slot>
    </main>
  </div>
</template>

<script>
import Sidebar from '@/Components/Sidebar/Index';
import SidebarLinks from '@/Components/Sidebar/Links/Index';
import '/css/layout/app-layout.css'
import Button from "@/Jetstream/Button";

export default {
  components: {
    Button,
    Sidebar,
    SidebarLinks
  },

  data() {
    return {
      showingNavigationDropdown: false,
    }
  },

  methods: {
    switchToTeam(team) {
      this.$inertia.put(route('current-team.update'), {
        'team_id': team.id
      }, {
        preserveState: false
      })
    },

    logout() {
      this.$inertia.post(route('logout'));
    },
  }
}
</script>
