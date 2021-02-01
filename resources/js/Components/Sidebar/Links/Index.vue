<template>
    <inertia-link :href="href">
        <div class="h-10 w-full my-1 hover:bg-gray-200 flex items-center">
            <slot></slot>
        </div>
    </inertia-link>
</template>
<script>
export default {
    props: ['href'],
}
</script>
