<script setup>
import OnlineFriendItem from "@/Components/Home/OnlineFriends/Partials/OnlineFriendItem.vue";
</script>

<template>
    <div class="bg-white rounded-xl shadow-sm p-5 px-6 border1 dark:bg-dark2">
        <div class="flex justify-between text-black dark:text-white">
            <h3 class="font-bold text-base">Online Friends</h3>
            <button type="button">
                <ion-icon name="sync-outline" class="text-xl"></ion-icon>
            </button>
        </div>

        <div class="grid grid-cols-6 gap-3 mt-4">
            <OnlineFriendItem v-for="i in 6" />
        </div>
    </div>
</template>

<style scoped></style>
