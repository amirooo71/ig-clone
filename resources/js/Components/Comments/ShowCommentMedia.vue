<script setup>
import VideoPlayer from "@/Components/VideoPlayer.vue";
defineProps(["media"]);
</script>

<template>
    <div class="relative z-10 w-full h-full">
        <img
            v-if="media.type === 'image'"
            :src="media.url"
            alt="media"
            class="w-full h-full object-cover absolute"
        />
        <VideoPlayer v-else :src="media.url" />
    </div>
</template>

<style scoped></style>
