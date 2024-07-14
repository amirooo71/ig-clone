<script setup>
import IgModal from "@/Components/IgModal.vue";
import { ref, inject } from "vue";
import { router, useForm, Link, usePage } from "@inertiajs/vue3";
import Comment from "@/Components/Comments/Comment.vue";
import ShowCommentHeader from "@/Components/Comments/ShowCommentHeader.vue";
import ShowCommentMedia from "@/Components/Comments/ShowCommentMedia.vue";
import InputError from "@/Components/InputError.vue";
import Avatar from "@/Components/Avatar.vue";

const eventBus = inject("eventBus");

const props = defineProps(["comments", "post", "likes_count"]);
const items = ref(props.comments.data);

const loadMoreItems = () => {
    if (!props.comments.next_page_url) {
        return;
    }

    router.get(
        props.comments.next_page_url,
        {},
        {
            preserveScroll: true,
            preserveState: true,
            onSuccess: () => {
                // window.history.replaceState({}, "", initialUrl);
                items.value = [...items.value, ...props.comments.data];
            },
        },
    );
};

const commentForm = useForm({
    body: "",
});

const addComment = () => {
    commentForm.post(route("comment.store", props.post.id), {
        preserveScroll: true,
        onSuccess: () => {
            items.value = props.comments.data;
            commentForm.reset();
            eventBus.emit("load-home-data");
        },
    });
};
</script>

<template>
    <IgModal>
        <div
            class="tt relative mx-auto overflow-hidden shadow-xl rounded-lg lg:flex items-center ax-w-[86rem] w-full lg:h-[75vh]"
        >
            <div
                class="lg:h-full lg:w-[calc(100vw-400px)] w-full h-96 flex justify-center items-center relative"
            >
                <ShowCommentMedia :media="post.media" />
            </div>

            <div
                class="lg:w-[400px] w-full bg-white h-full relative overflow-y-auto shadow-xl dark:bg-dark2 flex flex-col justify-between"
            >
                <ShowCommentHeader :post="post" :likes_count="likes_count" />

                <div
                    class="p-5 h-full overflow-y-auto flex-1"
                    v-if="!post.allow_commenting"
                >
                    <div
                        class="relative text-sm font-medium space-y-5"
                        v-if="comments.data.length"
                    >
                        <Comment
                            v-for="comment in items"
                            :key="comment.id"
                            :comment="comment"
                        />
                        <div class="flex justify-center my-6">
                            <button
                                v-if="props.comments.next_page_url"
                                @click="loadMoreItems"
                                type="button"
                                class="bg-white py-2 px-5 rounded-full shadow-md font-semibold text-sm dark:bg-dark2"
                            >
                                Load more...
                            </button>
                        </div>
                    </div>
                    <div v-else class="flex justify-center items-center">
                        <p class="font-bold">No comments</p>
                    </div>
                </div>

                <div
                    v-if="!post.allow_commenting"
                    class="bg-white p-3 text-sm font-medium flex items-center gap-2"
                >
                    <img
                        class="rounded-full w-6 h-6"
                        :src="$page.props.auth.user.profile_photo_url"
                        :alt="$page.props.auth.user.name"
                    />

                    <form
                        @submit.prevent="addComment"
                        class="flex-1 relative overflow-hidden"
                    >
                        <textarea
                            v-model="commentForm.body"
                            placeholder="Add Comment...."
                            name="body"
                            rows="1"
                            class="w-full resize- px-4 py-2 focus:!border-transparent focus:!ring-transparent resize-y border-0 bg-gray-100 rounded"
                        ></textarea>

                        <div
                            class="flex items-center gap-2 absolute bottom-0.5 right-0 m-3"
                        >
                            <button
                                type="submit"
                                class="text-sm flex text-blue-700"
                            >
                                Post
                            </button>
                        </div>
                    </form>
                </div>
                <div class="pb-3" v-if="$page.props.errors.body">
                    <InputError :message="$page.props.errors.body" />
                </div>
            </div>
        </div>
    </IgModal>
</template>

<style scoped></style>
