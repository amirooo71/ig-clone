<script setup>
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <div class="flex justify-between text-black dark:text-white">
        <h3 class="font-bold text-base">Peaple You might know</h3>
        <Link :href="route('home')" preserve-scroll>
            <ion-icon name="sync-outline" class="text-xl"></ion-icon>
        </Link>
    </div>
</template>

<style scoped></style>
