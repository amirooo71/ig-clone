<script setup>
import { Link, router } from "@inertiajs/vue3";
import Like from "@/Components/Like.vue";
import Favorite from "@/Components/Favorite.vue";

const props = defineProps(["post", "commentCount"]);
</script>

<template>
    <div class="sm:p-4 p-2.5 flex items-center gap-4 text-xs font-semibold">
        <div class="flex items-center gap-2.5">
            <Like
                url="post.like-toggle"
                :id="post.id"
                :has-liked="post.has_liked"
            />
            <span v-if="!post.hide_likes_count">{{ post.likers_count }}</span>
            <span v-else>likes</span>
        </div>
        <div class="flex items-center gap-3" v-if="!post.allow_commenting">
            <Link
                :href="route('comment.show', post.id)"
                preserve-scroll
                preserve-state
                type="button"
                class="button__ico bg-slate-200/70 dark:bg-slate-700"
            >
                <ion-icon class="text-lg" name="chatbubble-ellipses"></ion-icon>
            </Link>
            <span>{{ commentCount }}</span>
        </div>
        <Favorite
            url="post.like-favorite"
            :id="post.id"
            :has-favorited="post.has_favorited"
        />
    </div>
</template>

<style scoped></style>
