<script setup>
import { relativeDate } from "@/Utillities/date.js";

defineProps(["comment"]);
</script>

<template>
    <div class="flex items-start gap-3 relative">
        <img
            :src="comment.user.profile_photo_url"
            alt=""
            class="w-6 h-6 mt-1 rounded-full"
        />
        <div class="flex-1">
            <a
                href="#"
                class="text-black font-medium inline-block dark:text-white"
            >
                {{ comment.user.name }}
            </a>
            <p class="mt-0.5">
                {{ comment.body }}
            </p>
            <span class="text-xs text-gray-500"
                >{{ relativeDate(comment.created_at) }} ago</span
            >
        </div>
    </div>
</template>

<style scoped></style>
