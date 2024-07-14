<script setup>
import PostItem from "@/Components/Home/Posts/Partials/PostItem.vue";

defineProps(["posts"]);
</script>

<template>
    <PostItem v-for="post in posts" :key="post" :post="post" />
</template>

<style scoped></style>
