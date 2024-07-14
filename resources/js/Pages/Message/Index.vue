<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import MessageSidebar from "@/Pages/Message/Partials/MessageSidebar.vue";

defineProps({
    showBanner: {
        type: Boolean,
        default: true,
    },
    conversations: {
        type: Object,
    },
    cId: {
        type: Number,
        required: false,
    },
});
</script>

<template>
    <AppLayout>
        <div
            class="2xl:max-w-6xl mx-auto h-screen relative shadow-lg overflow-hidden border1 max-md:pt-14"
        >
            <div class="flex bg-white dark:bg-dark2">
                <MessageSidebar :conversations="conversations" :c-id="cId" />
                <div class="flex-1">
                    <slot />
                    <div
                        class="w-full p-5 py-10 overflow-y-auto md:h-[calc(100vh-137px)] h-[calc(100vh-250px)]"
                    >
                        <div
                            v-if="showBanner"
                            class="flex items-center justify-center h-screen"
                        >
                            <div class="text-center text-sm">
                                <ion-icon
                                    name="chatbubble-ellipses-outline"
                                    class="h-16 w-16"
                                ></ion-icon>
                                <p>Send private messages</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped></style>
