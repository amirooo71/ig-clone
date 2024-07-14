<script setup>
import PostHeading from "@/Components/Home/Posts/Partials/PostHeading.vue";
import PostImage from "@/Components/Home/Posts/Partials/PostImage.vue";
import PostIcons from "@/Components/Home/Posts/Partials/PostIcons.vue";
import VideoPlayer from "@/Components/VideoPlayer.vue";
import AddPostComment from "@/Components/Home/Posts/Partials/AddPostComment.vue";
import PostComments from "@/Components/Home/Posts/Partials/PostComments.vue";

defineProps(["post"]);
</script>

<template>
    <div
        class="bg-white rounded-xl shadow-sm text-sm font-medium border1 dark:bg-dark2"
    >
        <PostHeading :post="post" />
        <PostImage v-if="post.media.type === 'image'" :post="post" />
        <VideoPlayer v-else :src="post.media.url" />
        <PostIcons :post="post" :comment-count="post.comments_count" />
        <PostComments :post="post" />
        <AddPostComment v-if="!post.allow_commenting" :post-id="post.id" />
    </div>
</template>

<style scoped></style>
