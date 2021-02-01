<template>
    <aside class="menu h-full bg-white shadow">
        <div class="menu-header h-20 flex justify-center items-center">
            <logo width="247" height="31"></logo>
        </div>
        <div class="menu-options flex flex-col pl-6 relative">
            <div class="account-options flex flex-col mb-4">
                <h3 class="text-black font-bold">CONTA</h3>
                <div class="text-gray-500 font-bold flex flex-col">
                    <slot name="account-options-links"></slot>
                </div>
            </div>
            <div class="study-options flex flex-col justify-between mb-4">
                <h3 class="text-black font-bold mb-1">MEU ESTUDO</h3>
                <div class="text-gray-500 font-bold flex flex-col">
                    <slot name="study-options-links"></slot>
                </div>
            </div>
            <div class="support-options flex flex-col mb-4">
                <h3 class="text-black font-bold">SUPORTE</h3>
                <div class="text-gray-500 font-bold flex flex-col">
                    <slot name="support-options-links"></slot>
                </div>
            </div>
            <div class="logout-option flex flex-col mb-4">
                <div class="text-gray-500 font-bold flex flex-col">
                    <h3 class="text-black font-bold">SAIR</h3>
                    <slot name="logout-option-link"></slot>
                </div>
            </div>
        </div>
    </aside>
</template>
<script>
import Logo from '@/Components/Logo';
import SidebarLinks from '@/Components/Sidebar/Links/Index';

export default {
    components: {
        Logo,
        SidebarLinks,
    }
}
</script>
