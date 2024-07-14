<script setup>
import ProfileLayout from "@/Pages/IgProfile/Patials/ProfileLayout.vue";
import { ref } from "vue";
import { Link } from "@inertiajs/vue3";
import { useInfiniteScroll } from "@/Composables/useInfiniteScroll.js";
defineProps(["user", "posts"]);
const landmark = ref(null);
const { items } = useInfiniteScroll("posts", landmark, true);
</script>

<template>
    <ProfileLayout :user="user">
        <div>
            <div class="mt-8">
                <div
                    class="grid lg:grid-cols-4 sm:grid-cols-3 grid-cols-2 gap-3 mt-6"
                >
                    <Link
                        v-for="post in items"
                        :href="route('comment.show', post.id)"
                        preserve-scroll
                        preserve-state
                    >
                        <div
                            class="lg:hover:scale-105 hover:shadow-lg hover:z-10 duration-500 delay-100"
                        >
                            <div
                                class="relative overflow-hidden rounded-lg uk-transition-toggle"
                            >
                                <div
                                    class="relative w-full lg:h-60 h-full aspect-[3/3]"
                                >
                                    <img
                                        :src="post.media.url"
                                        alt=""
                                        class="object-cover w-full h-full"
                                    />
                                </div>
                                <div
                                    class="absolute inset-0 bg-white/5 backdrop-blur-sm uk-transition-fade"
                                >
                                    <div
                                        class="flex items-center justify-center gap-4 text-white w-full h-full"
                                    >
                                        <div class="flex items-center gap-2">
                                            <ion-icon
                                                class="text-2xl"
                                                name="heart-circle"
                                            ></ion-icon>
                                            {{ post.hide_likes_count }}
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <ion-icon
                                                class="text-2xl"
                                                name="chatbubble-ellipses"
                                            ></ion-icon>
                                            {{ post.comments_count }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </Link>
                </div>
            </div>
            <div ref="landmark"></div>
        </div>
    </ProfileLayout>
</template>

<style scoped></style>
