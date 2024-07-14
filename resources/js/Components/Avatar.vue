<script setup>
import ProfileLink from "@/Components/ProfileLink.vue";

defineProps({
    size: String,
});
</script>

<template>
    <ProfileLink :id="$page.props.auth.user.id">
        <img
            :src="$page.props.auth.user.profile_photo_url"
            alt="avatar"
            class="rounded-full"
            :class="size"
        />
    </ProfileLink>
</template>

<style scoped></style>
