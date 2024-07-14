<script setup>
import Follow from "@/Components/Follow.vue";
import PeopleLayout from "@/Pages/People/Partials/PeopleLayout.vue";
import { Link } from "@inertiajs/vue3";
import ProfileLink from "@/Components/ProfileLink.vue";
const props = defineProps(["followers"]);
</script>

<template>
    <PeopleLayout>
        <div>
            <div
                class="grid sm:grid-cols-2 gap-2 mt-5 mb-2 text-xs font-normal text-gray-500 dark:text-white/80"
            >
                <div
                    v-for="follower in followers.data"
                    :key="follower.id"
                    class="bg-white flex gap-4 items-center flex-wrap justify-between p-5 rounded-lg shadow-sm border1 dark:bg-dark2"
                >
                    <ProfileLink :id="follower.id">
                        <img
                            :src="follower.profile_photo_url"
                            :alt="follower.name"
                            class="rounded-full lg:w-16 lg:h-16 w-10 h-10"
                        />
                    </ProfileLink>
                    <div class="flex-1">
                        <ProfileLink :id="follower.id">
                            <h4
                                class="font-semibold text-sm text-black dark:text-white"
                            >
                                {{ follower.name }}
                            </h4>
                        </ProfileLink>
                        <div class="mt-0.5">
                            {{ follower.followers_count }} followers
                        </div>
                    </div>
                    <Follow :id="follower.id">
                        <span v-if="follower.has_followed" class="text-red-700"
                            >Unfollow</span
                        >
                        <span v-else class="text-blue-700">Follow</span>
                    </Follow>
                </div>
            </div>
            <div class="flex justify-between my-10">
                <Link
                    v-if="props.followers.prev_page_url"
                    :href="props.followers.prev_page_url"
                    type="button"
                    class="bg-white py-2 px-5 rounded-full shadow-md font-semibold text-sm dark:bg-dark2 mr-auto"
                >
                    Previous
                </Link>
                <Link
                    v-if="props.followers.next_page_url"
                    :href="props.followers.next_page_url"
                    type="button"
                    class="bg-white py-2 px-5 rounded-full shadow-md font-semibold text-sm dark:bg-dark2 ml-auto"
                >
                    Next
                </Link>
            </div>
        </div>
    </PeopleLayout>
</template>

<style scoped></style>
