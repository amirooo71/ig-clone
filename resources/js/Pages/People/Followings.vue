<script setup>
import PeopleLayout from "@/Pages/People/Partials/PeopleLayout.vue";
import { ref } from "vue";
import { useInfiniteScroll } from "@/Composables/useInfiniteScroll.js";
import ProfileLink from "@/Components/ProfileLink.vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps(["followings"]);
const landmark = ref(null);
const { items } = useInfiniteScroll("followings", landmark, true);
</script>

<template>
    <PeopleLayout>
        <div>
            <div class="space-y-6 text-sm font-normal text-gray-500">
                <div
                    v-for="following in items"
                    :key="following.id"
                    class="flex items-center justify-between gap-4"
                >
                    <ProfileLink :id="following.followable.id">
                        <div class="relative w-12 h-12">
                            <img
                                :src="following.followable.profile_photo_url"
                                class="object-cover w-full h-full rounded-full"
                                :alt="following.followable.name"
                            />
                        </div>
                    </ProfileLink>
                    <div class="flex-1">
                        <ProfileLink :id="following.followable.id">
                            <h4
                                class="text-base font-medium text-black dark:text-white"
                            >
                                {{ following.followable.name }}
                            </h4>
                        </ProfileLink>
                        <p class="mt-0.5">
                            {{ following.followable.followers_count }} followers
                        </p>
                    </div>
                    <div class="flex gap-3">
                        <button
                            type="button"
                            class="button bg-primary-soft text-primary border border-primary/10 dark:bg-slate-700 dark:border-slate-600 dark:text-white"
                        >
                            <span class="max-md:hidden">Following</span>
                        </button>
                        <Link
                            :href="
                                route(
                                    'conversation.create',
                                    following.followable.id,
                                )
                            "
                            type="button"
                            class="text-white bg-primary button"
                        >
                            <span class="max-md:hidden"> Message </span>
                        </Link>
                    </div>
                </div>
            </div>
            <div ref="landmark"></div>
        </div>
    </PeopleLayout>
</template>

<style scoped></style>
