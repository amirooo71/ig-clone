<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import ProfileHeader from "@/Pages/IgProfile/Patials/ProfileHeader.vue";
import ProfileNavs from "@/Pages/IgProfile/Patials/ProfileNavs.vue";
defineProps(["user"]);
</script>

<template>
    <AppLayout>
        <div class="main__inner">
            <ProfileHeader :user="user" />
            <div class="mt-10">
                <ProfileNavs :user-id="user.id" />
                <div>
                    <slot />
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped></style>
