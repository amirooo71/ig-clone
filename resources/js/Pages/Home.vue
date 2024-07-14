<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Stories from "@/Components/Home/Stories/Stories.vue";
import Posts from "@/Components/Home/Posts/Posts.vue";
import Suggestions from "@/Components/Home/Suggestions/Suggestions.vue";
import OnlineFriends from "@/Components/Home/OnlineFriends/OnlineFriends.vue";
import { useInfiniteScroll } from "@/Composables/useInfiniteScroll.js";
import { router, Link, usePage } from "@inertiajs/vue3";
import { inject, onMounted, onUnmounted, ref } from "vue";
import CreatePostBox from "@/Components/Home/Posts/Partials/CreatePostBox.vue";
const props = defineProps(["posts", "suggestions"]);
const landmark = ref(null);
const eventBus = inject("eventBus");

eventBus.on("load-home-data", () => {
    router.reload({
        only: ["posts"],
        onSuccess: () => {
            reset();
        },
    });
});

const { items, reset, canLoadMoreItems } = useInfiniteScroll("posts", landmark);
</script>

<template>
    <AppLayout>
        <div class="main__inner">
            <!--            <Stories />-->
            <div
                class="flex max-lg:flex-col xl:gap-10 md:gap-3 md:mt-10"
                id="js-oversized"
            >
                <div
                    class="md:max-w-[510px] mx-auto flex-1 xl:space-y-6 space-y-3"
                >
                    <Posts :posts="items" />
                    <div
                        v-if="!canLoadMoreItems"
                        class="flex justify-center flex-col items-center"
                    >
                        <p class="font-extrabold text-gray-500 mt-6">
                            No posts to show :(
                        </p>
                        <Link :href="route('home')" class="text-blue-700"
                            >Go back</Link
                        >
                    </div>
                    <div ref="landmark"></div>
                </div>
                <div
                    class="lg:max-w-[370px] md:max-w-[510px] mx-auto max-md:!hidden"
                >
                    <div
                        class="xl:space-y-6 space-y-3 md:pb-12"
                        uk-sticky="end: #js-oversized; offset: 50; media:992"
                    >
                        <CreatePostBox />

                        <Suggestions :users="suggestions" />
                        <!--                        <OnlineFriends />-->
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped></style>
