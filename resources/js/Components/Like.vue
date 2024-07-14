<script setup>
import { router } from "@inertiajs/vue3";
import { inject } from "vue";

const props = defineProps(["hasLiked", "url", "id"]);
const eventBus = inject("eventBus");

const toggleLike = () => {
    router.post(
        route(props.url, props.id),
        {},
        {
            preserveScroll: true,
            onSuccess: () => {
                eventBus.emit("load-home-data");
            },
        },
    );
};
</script>

<template>
    <button
        @click="toggleLike"
        class="button__ico bg-red-100 dark:bg-slate-700"
        :class="{ 'text-red-500': hasLiked }"
    >
        <ion-icon class="text-lg" name="heart"></ion-icon>
    </button>
</template>

<style scoped></style>
