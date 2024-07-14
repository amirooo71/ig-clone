<script setup>
import { computed, onMounted, inject, ref } from "vue";
import { formatDate, formatDistance, parseISO } from "date-fns";
import { usePage } from "@inertiajs/vue3";

const props = defineProps(["messages"]);
const page = usePage();
const eventBus = inject("eventBus");
const messageContainer = ref(null);
const authIsSender = (messageSenderId) => {
    return messageSenderId === page.props.auth.user.id;
};

const scrollToBottom = () => {
    const container = messageContainer.value;
    if (container) {
        container.scrollTop = container.scrollHeight;
    }
};

onMounted(() => {
    eventBus.on("add-chat-message", () => {
        scrollToBottom();
    });
});
</script>

<template>
    <div
        ref="messageContainer"
        class="w-full p-5 py-10 overflow-y-auto md:h-[calc(100vh-137px)] h-[calc(100vh-250px)]"
    >
        <div
            v-for="message in messages"
            :key="message.id"
            class="text-sm font-medium space-y-6"
        >
            <!-- received -->
            <div
                v-if="authIsSender(message.sender_id)"
                class="flex gap-2 flex-row-reverse items-end my-6"
            >
                <img
                    :src="$page.props.auth.user.profile_photo_url"
                    alt="user"
                    class="w-9 h-9 rounded-full shadow"
                />
                <div class="px-4 py-2 rounded-[20px] max-w-sm bg-secondery">
                    {{ message.body }}
                </div>
                <div class="flex justify-center">
                    <div
                        class="font-medium text-gray-500 text-sm dark:text-white/70"
                    >
                        {{
                            formatDate(
                                parseISO(message.created_at),
                                "MMMM do, yyyy h:mm a",
                            )
                        }}
                    </div>
                </div>
            </div>

            <!-- send -->
            <div v-else class="flex gap-3 my-6">
                <img
                    :src="message.profile_photo_url"
                    alt="user"
                    class="w-5 h-5 rounded-full shadow"
                />
                <div
                    class="px-4 py-2 rounded-[20px] max-w-sm bg-gradient-to-tr from-sky-500 to-blue-500 text-white shadow"
                >
                    {{ message.body }}
                </div>
                <div class="flex justify-center">
                    <div
                        class="font-medium text-gray-500 text-sm dark:text-white/70"
                    >
                        {{
                            formatDate(
                                parseISO(message.created_at),
                                "MMMM do, yyyy h:mm a",
                            )
                        }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped></style>
