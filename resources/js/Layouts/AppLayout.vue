<script setup>
import { router, usePage } from "@inertiajs/vue3";
import Sidebar from "@/Layouts/Sidebar.vue";
import { Modal } from "momentum-modal";
import Banner from "@/Components/Banner.vue";
import { onMounted, onUnmounted, inject } from "vue";

const page = usePage();
const eventBus = inject("eventBus");

defineProps({
    title: String,
});

const logout = () => {
    router.post(route("logout"));
};

onMounted(() => {
    Echo.private(`App.Models.User.${page.props.auth.user.id}`).notification(
        (notification) => {
            router.reload();
            eventBus.emit("add-chat-message");
        },
    );
});

onUnmounted(() => {
    Echo.leave(`App.Models.User.${page.props.auth.user.id}`);
});
</script>

<template>
    <Banner />
    <div id="wrapper">
        <Sidebar />
        <main
            class="2xl:ml-[--w-side] xl:ml-[--w-side-md] md:ml-[--w-side-small]"
        >
            <slot />
        </main>
    </div>
    <Modal />
</template>
