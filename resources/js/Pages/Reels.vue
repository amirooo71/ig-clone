<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import VideoPlayer from "@/Components/VideoPlayer.vue";
import { ref } from "vue";
import { useInfiniteScroll } from "@/Composables/useInfiniteScroll.js";
defineProps(["reels"]);

const landmark = ref(null);
const { items, reset, canLoadMoreItems } = useInfiniteScroll(
    "reels",
    landmark,
    true,
);
</script>

<template>
    <AppLayout>
        <div class="main__inner pt-6">
            <div class="mt-8">
                <!-- post heading -->
                <div class="flex items-center justify-between py-3">
                    <h1 class="text-xl font-bold text-black dark:text-white">
                        You may like
                    </h1>
                </div>

                <div
                    class="grid gap-3 lg:gap-4 lg:grid-cols-2 md:grid-cols-4 sm:grid-cols-3 grid-cols-2"
                    uk-scrollspy="target: > div; cls: uk-animation-scale-up; delay: 100"
                >
                    <div v-for="reel in items">
                        <div
                            class="relative w-full lg:h-[247px] aspect-[2.5/4] overflow-hidden rounded-lg shrink-0 uk-transition-toggle"
                        >
                            <VideoPlayer :src="reel.media.url" />
                            <div
                                class="w-full bottom-0 absolute left-0 bg-gradient-to-t from-black/60 pt-8 p-3 flex justify-between text-white uk-transition-slide-bottom"
                            >
                                <div class="flex items-center gap-2">
                                    <img
                                        :src="reel.user.profile_photo_url"
                                        alt="reel"
                                        class="w-5 rounded-full"
                                    />
                                    <div class="text-sm">
                                        {{ reel.user.name }}
                                    </div>
                                </div>
                                <div
                                    class="flex items-center gap-2 text-xs ml-auto"
                                >
                                    <ion-icon
                                        class="text-lg"
                                        name="chatbubble-ellipses"
                                    ></ion-icon>
                                    {{ reel.likers_count }}
                                </div>
                                <div
                                    class="flex items-center gap-2 text-xs ml-2"
                                >
                                    <ion-icon
                                        class="text-lg"
                                        name="heart-outline"
                                    ></ion-icon>
                                    {{ reel.comments_count }}
                                </div>
                            </div>
                        </div>
                        <div class="font-normal pt-3 pb-2.5">
                            <div class="line-clamp-2 text-sm">
                                {{ reel.description }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div ref="landmark"></div>
        </div>
    </AppLayout>
</template>

<style scoped></style>
