<script setup>
import ProfileLayout from "@/Pages/IgProfile/Patials/ProfileLayout.vue";
import VideoPlayer from "@/Components/VideoPlayer.vue";
import { Link } from "@inertiajs/vue3";
import { ref } from "vue";
import { useInfiniteScroll } from "@/Composables/useInfiniteScroll.js";
const landmark = ref(null);
defineProps(["user", "saved"]);
const { items } = useInfiniteScroll("saved", landmark);
</script>

<template>
    <ProfileLayout :user="user">
        <div class="pt-16">
            <div class="grid lg:grid-cols-3 grid-cols-2 gap-4">
                <div
                    v-for="save in items"
                    :key="save.id"
                    class="relative lg:rounded-xl rounded-md overflow-hidden shadow bg-white dark:bg-dark2"
                >
                    <Link
                        :href="route('profile.posts.show', save.user.id)"
                        class="flex items-center gap-3 sm:px-4 py-3 p-2 text-sm font-normal"
                    >
                        <a href="#" class="max-md:hidden">
                            <img
                                :src="save.user.profile_photo_url"
                                alt="saved"
                                class="w-6 h-6 rounded-full"
                            />
                        </a>
                        <div class="flex-1">
                            <a href="#"
                                ><h4 class="text-black dark:text-white">
                                    {{ save.user.name }}
                                </h4></a
                            >
                        </div>
                    </Link>
                    <Link
                        :href="route('comment.show', save.id)"
                        preserve-scroll
                        preserve-state
                    >
                        <div class="relative w-full h-48">
                            <img
                                v-if="save.type === 'post'"
                                :src="save.media.url"
                                alt="saved"
                                class="w-full h-full object-cover inset-0"
                            />
                            <VideoPlayer
                                v-else
                                :src="save.media.url"
                                :preview="false"
                            />
                        </div>
                    </Link>
                </div>
            </div>
            <div ref="landmark"></div>
        </div>
    </ProfileLayout>
</template>

<style scoped></style>
