<script setup>
import StoryItem from "@/Components/Home/Stories/Partials/StoryItem.vue";
import AddStory from "@/Components/Home/Stories/Partials/AddStory.vue";
import StoryPagination from "@/Components/Home/Stories/Partials/StoryPagination.vue";
</script>

<template>
    <div>
        <h3 class="font-extrabold text-2xl text-black dark:text-white">
            Stories
        </h3>

        <div
            class="relative"
            tabindex="-1"
            uk-slider="autoplay: true;finite: true"
            uk-lightbox=""
        >
            <div class="py-5 uk-slider-container">
                <ul class="uk-slider-items w-[calc(100%+14px)]">
                    <AddStory />
                    <StoryItem v-for="i in 10" />
                </ul>
            </div>
            <StoryPagination />
        </div>
    </div>
</template>

<style scoped></style>
