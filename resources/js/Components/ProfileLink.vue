<script setup>
import { Link } from "@inertiajs/vue3";
defineProps(["id"]);
</script>

<template>
    <Link :href="route('profile.posts.show', id)">
        <span>
            <slot />
        </span>
    </Link>
</template>

<style scoped></style>
