<script setup>
const props = defineProps(["hasFavorited", "url", "id"]);
import { router } from "@inertiajs/vue3";
import { inject } from "vue";

const eventBus = inject("eventBus");

const toggleFavorite = () => {
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
        @click="toggleFavorite"
        class="button__ico ml-auto dark:bg-slate-700 text-gray-300"
        :class="{ 'text-gray-900': hasFavorited }"
    >
        <ion-icon class="text-xl" name="bookmark"></ion-icon>
    </button>
</template>

<style scoped></style>
