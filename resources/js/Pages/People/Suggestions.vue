<script setup>
import Follow from "@/Components/Follow.vue";
import PeopleLayout from "@/Pages/People/Partials/PeopleLayout.vue";
import { Link } from "@inertiajs/vue3";
import ProfileLink from "@/Components/ProfileLink.vue";
const props = defineProps(["suggestions"]);
</script>

<template>
    <PeopleLayout>
        <div>
            <div
                class="grid lg:grid-cols-4 sm:grid-cols-3 grid-cols-2 gap-4 text-xs font-normal text-gray-500 dark:text-white/80"
            >
                <div
                    v-for="user in suggestions.data"
                    :key="user.id"
                    class="flex flex-col items-center shadow-sm p-2 rounded-xl bg-white border1 dark:bg-dark2"
                >
                    <ProfileLink :id="user.id">
                        <div class="relative w-20 h-20 mx-auto mt-3">
                            <img
                                :src="user.profile_photo_url"
                                :alt="user.name"
                                class="h-full object-cover rounded-full shadow w-full"
                            />
                        </div>
                    </ProfileLink>
                    <div class="mt-5 text-center w-full">
                        <ProfileLink :id="user.id">
                            <h4
                                class="font-semibold text-sm text-black dark:text-white"
                            >
                                {{ user.name }}
                            </h4>
                        </ProfileLink>
                        <div class="mt-1">
                            {{ user.followers_count }} Followers
                        </div>
                        <Follow
                            :id="user.id"
                            class="mt-2 bg-secondery"
                            :preserve="true"
                        >
                            Follow
                        </Follow>
                    </div>
                </div>
            </div>
            <div class="flex justify-between my-10">
                <Link
                    v-if="props.suggestions.prev_page_url"
                    :href="props.suggestions.prev_page_url"
                    type="button"
                    class="bg-white py-2 px-5 rounded-full shadow-md font-semibold text-sm dark:bg-dark2 mr-auto"
                >
                    Previous
                </Link>
                <Link
                    v-if="props.suggestions.next_page_url"
                    :href="props.suggestions.next_page_url"
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
