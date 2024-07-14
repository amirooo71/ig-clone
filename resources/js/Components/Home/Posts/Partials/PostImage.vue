<script setup>
defineProps(["post"]);
</script>

<template>
    <div class="relative w-full lg:h-72 h-full sm:px-4">
        <img
            :src="post.media.url"
            alt=""
            class="sm:rounded-lg w-full h-full object-cover"
        />
    </div>
</template>

<style scoped></style>
