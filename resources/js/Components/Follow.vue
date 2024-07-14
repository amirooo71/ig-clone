<script setup>
import { router } from "@inertiajs/vue3";
import { inject } from "vue";

const eventBus = inject("eventBus");
const props = defineProps({
    id: Number,
    class: {
        type: String,
        default: "bg-secondery",
    },
    preserve: {
        type: Boolean,
        default: false,
    },
});

const toggleFollow = () => {
    router.post(
        route("people.toggle-follow", props.id),
        {},
        {
            preserveScroll: props.preserve,
            preserveState: props.preserve,
            onSuccess: () => {
                eventBus.emit("load-home-data");
                eventBus.emit("load-people-data");
            },
        },
    );
};
</script>

<template>
    <button
        @click="toggleFollow"
        :class="class"
        type="button"
        class="text-sm rounded-full py-1.5 px-4 font-semibold"
    >
        <slot />
    </button>
</template>

<style scoped></style>
