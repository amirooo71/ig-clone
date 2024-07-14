<script setup>
import ProfileLayout from "@/Pages/IgProfile/Patials/ProfileLayout.vue";
import { Link } from "@inertiajs/vue3";
import VideoPlayer from "@/Components/VideoPlayer.vue";
import { ref } from "vue";
import { useInfiniteScroll } from "@/Composables/useInfiniteScroll.js";

defineProps(["user", "reels"]);
const landmark = ref(null);
const { items } = useInfiniteScroll("reels", landmark, true);
</script>

<template>
    <ProfileLayout :user="user">
        <div class="pt-16">
            <div
                class="grid gap-3 lg:gap-4 lg:grid-cols-2 md:grid-cols-4 sm:grid-cols-3 grid-cols-2"
            >
                <div v-for="reel in items" :key="reel.id">
                    <div
                        class="lg:hover:scale-105 hover:shadow-lg hover:z-10 duration-500 delay-100"
                    >
                        <Link
                            :href="route('comment.show', reel.id)"
                            preserve-scroll
                            preserve-state
                        >
                            <div
                                class="relative w-full lg:h-[247px] aspect-[2.5/4] overflow-hidden rounded-lg shrink-0"
                            >
                                <VideoPlayer
                                    :src="reel.media.url"
                                    :preview="false"
                                />
                            </div>
                        </Link>
                    </div>
                </div>
            </div>
            <div ref="landmark"></div>
        </div>
    </ProfileLayout>
</template>

<style scoped></style>
