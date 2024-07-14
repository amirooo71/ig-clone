<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { useInfiniteScroll } from "@/Composables/useInfiniteScroll.js";
import { ref } from "vue";
import { Link } from "@inertiajs/vue3";
defineProps(["posts"]);
const landmark = ref(null);
const { items, reset, canLoadMoreItems } = useInfiniteScroll(
    "posts",
    landmark,
    true,
);
</script>

<template>
    <AppLayout>
        <!-- explore -->
        <div class="main__inner">
            <div
                class="gallery"
                uk-scrollspy="target: > div; cls: uk-animation-scale-up; delay: 100"
            >
                <div v-for="post in items" class="gallery__card">
                    <Link
                        :href="route('comment.show', post.id)"
                        preserve-scroll
                        preserve-state
                    >
                        <div class="card__image">
                            <img :src="post.media.url" alt="post" />
                        </div>
                    </Link>
                </div>
            </div>
        </div>
        <div ref="landmark"></div>
    </AppLayout>
</template>

<style scoped></style>
