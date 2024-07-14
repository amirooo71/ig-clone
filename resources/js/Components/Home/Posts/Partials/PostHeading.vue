<script setup>
import { relativeDate } from "@/Utillities/date.js";
import Follow from "@/Components/Follow.vue";
import ProfileLink from "@/Components/ProfileLink.vue";
defineProps(["post"]);
</script>

<template>
    <div class="flex gap-3 sm:p-4 p-2.5 text-sm font-medium">
        <ProfileLink :id="post.user.id">
            <img
                :src="post.user.profile_photo_url"
                :alt="post.user.name"
                class="w-9 h-9 rounded-full"
            />
        </ProfileLink>
        <div class="flex-1">
            <ProfileLink :id="post.user.id">
                <h4 class="text-black dark:text-white first-letter:uppercase">
                    {{ post.user.name }}
                </h4>
            </ProfileLink>
            <div class="text-xs text-gray-500 dark:text-white/80">
                {{ relativeDate(post.created_at) }} ago
            </div>
        </div>
        <div class="-mr-1">
            <button
                type="button"
                class="button__ico w-8 h-8"
                aria-haspopup="true"
                aria-expanded="false"
            >
                <ion-icon
                    class="text-xl md hydrated"
                    name="ellipsis-horizontal"
                    role="img"
                    aria-label="ellipsis horizontal"
                ></ion-icon>
            </button>
            <div
                class="w-[245px] uk-dropdown"
                uk-dropdown="pos: bottom-right; animation: uk-animation-scale-up uk-transform-origin-top-right; animate-out: true; mode: click"
            >
                <nav>
                    <Follow :id="post.user.id" class="bg-white text-red-600"
                        >Unfollow</Follow
                    >
                </nav>
            </div>
        </div>
    </div>
</template>

<style scoped></style>
