<template>
  <div v-if="data.signature" class="container mx-auto space-y-2 lg:space-y-0 lg:gap-2 lg:grid lg:grid-cols-2">
    <div class="w-full rounded hover:shadow-2xl">
        <img :src="data.signature"
            alt="image">
    </div>
    <div v-if="data.logo" class="w-full rounded hover:opacity-50">
        <img :src="data.logo"
            alt="image">
    </div>
</div>
</template>

<script>
export default {
  props:{
    data: null
  }
}
</script>

<style>

</style>