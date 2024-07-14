<script setup>
import Follow from "@/Components/Follow.vue";
import ProfileLink from "@/Components/ProfileLink.vue";

const props = defineProps(["user"]);
</script>

<template>
    <div class="flex items-center gap-3">
        <ProfileLink :id="user.id">
            <img
                :src="user.profile_photo_url"
                :alt="user.name"
                class="bg-gray-200 rounded-full w-10 h-10"
            />
        </ProfileLink>
        <div class="flex-1">
            <ProfileLink :id="user.id">
                <h4 class="font-semibold text-sm text-black dark:text-white">
                    {{ user.name }}
                </h4>
            </ProfileLink>
            <div class="mt-0.5">Suggested For You</div>
        </div>
        <Follow :id="user.id">Follow</Follow>
    </div>
</template>

<style scoped></style>
