<script setup>
import SuggestionItem from "@/Components/Home/Suggestions/Partials/SuggestionItem.vue";
import SuggestionHeader from "@/Components/Home/Suggestions/Partials/SuggestionHeader.vue";

defineProps(["users"]);
</script>

<template>
    <div class="bg-white rounded-xl shadow-sm p-5 px-6 border1 dark:bg-dark2">
        <SuggestionHeader />
        <div
            class="space-y-4 capitalize text-xs font-normal mt-5 mb-2 text-gray-500 dark:text-white/80"
        >
            <SuggestionItem v-for="user in users" :key="user.id" :user="user" />
        </div>
    </div>
</template>

<style scoped></style>
