<script setup>
import ChatBox from "@/Pages/Message/Partials/ChatBox.vue";
import ChatInput from "@/Pages/Message/Partials/ChatInput.vue";
import ChatHeading from "@/Pages/Message/Partials/ChatHeading.vue";
import Index from "@/Pages/Message/Index.vue";
import { onMounted, inject } from "vue";

defineProps(["conversations", "conversation", "cId", "messages"]);

const eventBus = inject("eventBus");

onMounted(() => {
    eventBus.emit("add-chat-message");
});
</script>

<template>
    <Index :show-banner="false" :conversations="conversations" :c-id="cId">
        <ChatHeading :conversation="conversation" />
        <ChatBox :messages="messages" />
        <ChatInput :c-id="cId" />
    </Index>
</template>

<style scoped></style>
