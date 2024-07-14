<script setup>
import { Link } from "@inertiajs/vue3";
import LastComment from "@/Components/Home/Posts/Partials/LastComment.vue";
import ProfileLink from "@/Components/ProfileLink.vue";
defineProps(["post"]);
</script>

<template>
    <div
        class="sm:p-4 p-2.5 border-t border-gray-100 font-normal space-y-3 relative dark:border-slate-700/40"
    >
        <div class="flex items-start gap-3 relative">
            <ProfileLink :id="post.user.id">
                <img
                    :src="post.user.profile_photo_url"
                    :alt="post.user.name"
                    class="w-6 h-6 mt-1 rounded-full"
                />
            </ProfileLink>
            <div class="flex-1">
                <ProfileLink
                    :id="post.user.id"
                    class="text-black font-medium inline-block dark:text-white first-letter:uppercase"
                >
                    {{ post.user.name }}
                </ProfileLink>
                <p class="mt-0.5">{{ post.description }}</p>
            </div>
        </div>
        <div class="flex items-start gap-3 relative">
            <LastComment v-if="post.comments.length > 0" :post="post" />
        </div>

        <button
            type="button"
            class="flex items-center gap-1.5 text-gray-500 hover:text-blue-500 mt-2"
        >
            <ion-icon
                name="arrow-forward-outline"
                class="ml-auto duration-200 group-aria-expanded:rotate-180"
            ></ion-icon>
            <Link :href="route('comment.show', post)" preserve-scroll>
                <span v-if="!post.allow_commenting">See all comments</span>
                <span v-else>Commenting is disabled for this post</span>
            </Link>
        </button>
    </div>
</template>

<style scoped></style>
