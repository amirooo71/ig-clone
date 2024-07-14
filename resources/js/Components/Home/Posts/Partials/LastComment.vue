<script setup>
import ProfileLink from "@/Components/ProfileLink.vue";

defineProps(["post"]);
</script>

<template>
    <ProfileLink :id="$page.props.auth.user.id">
        <img
            :src="$page.props.auth.user.profile_photo_url"
            alt=""
            class="w-6 h-6 mt-1 rounded-full"
        />
    </ProfileLink>
    <div class="flex-1">
        <ProfileLink
            :id="$page.props.auth.user.id"
            class="text-black font-medium inline-block dark:text-white"
        >
            {{ $page.props.auth.user.name }}
        </ProfileLink>
        <p class="mt-0.5">{{ post.comments[0].body }}</p>
    </div>
</template>

<style scoped></style>
