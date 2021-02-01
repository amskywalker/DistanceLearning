<template>
    <div class="h-screen w-screen grid xl:grid-cols-2">
        <div class="image h-100 hidden  xl:flex justify-center items-center">
            <img src="img/student.svg" alt="Logo">
        </div>
        <div class="form h-100 flex flex-col justify-center items-center">
            <div class="flex mb-16">
                <logo width="297" height="37"/>
            </div>
            <slot></slot>
        </div>
    </div>
</template>
<script>
import Logo from '@/Components/Logo'
export default {
  components:{
    Logo
  }
}
</script>
