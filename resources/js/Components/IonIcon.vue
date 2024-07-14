<script setup>


defineProps({
  name: {
    type: String,
    required: true,
  },
  size: {
    type: String,
    default: '',
  },
  color: {
    type: String,
    default: '',
  },
});

</script>

<template>
  <ion-icon :name="name" :size="size" :color="color"></ion-icon>
</template>

<style scoped>

</style>