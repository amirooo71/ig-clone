<script setup>
import { useForm } from "@inertiajs/vue3";
import { inject } from "vue";
import InputError from "@/Components/InputError.vue";
import Avatar from "@/Components/Avatar.vue";
import ProfileLink from "@/Components/ProfileLink.vue";

const eventBus = inject("eventBus");

const props = defineProps(["postId"]);

const commentForm = useForm({
    body: "",
});
const addComment = () => {
    commentForm.post(route("comment.store", props.postId), {
        preserveScroll: true,
        onSuccess: () => {
            commentForm.reset();
            eventBus.emit("load-home-data");
        },
    });
};
</script>

<template>
    <form
        @submit.prevent="addComment"
        class="sm:px-4 sm:py-3 p-2.5 border-t border-gray-100 flex items-center gap-1 dark:border-slate-700/40"
    >
        <Avatar size="w-6 h-6" />
        <div class="flex-1 relative overflow-hidden h-10">
            <textarea
                v-model="commentForm.body"
                name="body"
                placeholder="Add Comment...."
                rows="1"
                class="w-full resize-none !bg-transparent px-4 py-2 focus:!border-transparent focus:!ring-transparent border-0"
            ></textarea>
        </div>
        <button
            type="submit"
            class="text-sm rounded-full py-1.5 px-3.5 bg-secondery"
        >
            Replay
        </button>
    </form>
    <div class="pb-3" v-if="$page.props.errors.body">
        <InputError :message="$page.props.errors.body" />
    </div>
</template>

<style scoped></style>
