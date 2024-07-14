<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Navbar from "@/Pages/People/Partials/Navbar.vue";
</script>

<template>
    <AppLayout>
        <div class="max-w-3xl p-6 mx-auto">
            <Navbar />
            <div class="mt-10">
                <slot />
            </div>
        </div>
    </AppLayout>
</template>

<style scoped></style>
