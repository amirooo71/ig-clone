<script setup>
import { relativeDate } from "@/Utillities/date.js";
import Like from "@/Components/Like.vue";
import { Link } from "@inertiajs/vue3";
import Favorite from "@/Components/Favorite.vue";
defineProps(["post", "likes_count"]);
</script>

<template>
    <div class="p-5 pb-0">
        <!-- story heading -->
        <div class="flex gap-3 text-sm font-medium">
            <img
                :src="post.user.profile_photo_url"
                :alt="post.user.name"
                class="w-9 h-9 rounded-full"
            />
            <div class="flex-1">
                <h4 class="text-black font-medium dark:text-white">
                    {{ post.user.name }}
                </h4>
                <div class="text-gray-500 text-xs dark:text-white/80">
                    {{ relativeDate(post.created_at) }} ago
                </div>
            </div>
        </div>

        <p class="font-normal text-sm leading-6 mt-4">
            {{ post.description }}
        </p>

        <div class="shadow relative -mx-5 px-5 py-3 mt-3">
            <div class="flex items-center gap-4 text-xs font-semibold">
                <div class="flex items-center gap-2.5">
                    <Like
                        url="post.like-toggle"
                        :id="post.id"
                        :has-liked="post.has_liked"
                    />
                    <span v-if="!post.hide_likes_count">{{ likes_count }}</span>
                    <span v-else>likes</span>
                </div>
                <div
                    v-if="!post.allow_commenting"
                    class="flex items-center gap-3"
                >
                    <Link
                        :href="route('comment.show', post.id)"
                        preserve-scroll
                        type="button"
                        class="button__ico bg-slate-100 dark:bg-slate-700"
                    >
                        <ion-icon
                            class="text-lg"
                            name="chatbubble-ellipses"
                        ></ion-icon>
                    </Link>
                    <span>{{ post.comments_count }}</span>
                </div>
                <Favorite
                    url="post.like-favorite"
                    :id="post.id"
                    :has-favorited="post.has_favorited"
                />
            </div>
        </div>
    </div>
</template>

<style scoped></style>
