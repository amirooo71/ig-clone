<script setup>
import { computed } from "vue";
import { usePage } from "@inertiajs/vue3";
import Follow from "@/Components/Follow.vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps(["user"]);
const page = usePage();

const ownProfile = computed(() => page.props.auth.user.id === props.user.id);
</script>

<template>
    <div class="py-6 relative">
        <div class="flex md:gap-16 gap-4 max-md:flex-col">
            <div
                class="relative md:p-1 rounded-full h-full max-md:w-16 bg-gradient-to-tr from-pink-400 to-pink-600 shadow-md hover:scale-110 duration-500"
            >
                <div
                    class="relative md:w-40 md:h-40 h-16 w-16 rounded-full overflow-hidden md:border-[6px] border-gray-100 shrink-0 dark:border-slate-900"
                >
                    <img
                        :src="user.profile_photo_url"
                        :alt="user.name"
                        class="w-full h-full absolute object-cover"
                    />
                </div>
                <Link :href="route('profile.show')">
                    <button
                        type="button"
                        class="absolute -bottom-2 left-1/2 -translate-x-1/2 bg-white shadow p-1.5 rounded-full sm:flex hidden"
                    >
                        <ion-icon name="camera" class="text-2xl"></ion-icon>
                    </button>
                </Link>
            </div>
            <div class="max-w-2x flex-1">
                <h3
                    class="md:text-xl text-base font-semibold text-black dark:text-white first-letter:uppercase"
                >
                    {{ user.name }}
                </h3>

                <p class="sm:text-sm text-blue-600 mt-1 font-normal text-xs">
                    @{{ user.name }}
                </p>

                <p class="text-sm mt-2 md:font-normal font-light">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Debitis dolores doloribus, dolorum ducimus, eum hic illum
                    impedit incidunt magni nostrum quaerat qui reiciendis sunt
                    temporibus vel vero voluptatem! Nemo, similique. 🥰 📚 🌈 😊
                </p>
                <div
                    class="flex md:items-end justify-between md:mt-8 mt-4 max-md:flex-col gap-4"
                >
                    <div
                        class="flex sm:gap-10 gap-6 sm:text-sm text-xs max-sm:absolute max-sm:top-10 max-sm:left-36"
                    >
                        <div>
                            <p>Posts</p>
                            <h3
                                class="sm:text-xl sm:font-bold mt-1 text-black dark:text-white text-base font-normal"
                            >
                                {{ user.posts_count }}
                            </h3>
                        </div>
                        <div>
                            <p>Following</p>
                            <h3
                                class="sm:text-xl sm:font-bold mt-1 text-black dark:text-white text-base font-normal"
                            >
                                {{ user.followings_count }}
                            </h3>
                        </div>
                        <div>
                            <p>Followers</p>
                            <h3
                                class="sm:text-xl sm:font-bold mt-1 text-black dark:text-white text-base font-normal"
                            >
                                {{ user.followers_count }}
                            </h3>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 text-sm">
                        <Follow
                            v-if="!ownProfile"
                            :id="user.id"
                            class="button bg-pink-100 text-pink-600 border border-pink-200 cursor-pointer"
                        >
                            <span v-if="!user.has_followed">Follow</span>
                            <span v-else>Unfollow</span>
                        </Follow>
                        <Link
                            :href="route('conversation.create', user.id)"
                            v-if="!ownProfile"
                            type="submit"
                            class="button bg-pink-600 text-white"
                        >
                            Message
                        </Link>
                        <div>
                            <Link :href="route('profile.show')">
                                <button
                                    type="submit"
                                    class="rounded-lg flex px-2 py-1.5 dark:bg-dark2"
                                >
                                    <ion-icon
                                        class="text-xl w-6 h-6"
                                        name="settings-outline"
                                    ></ion-icon>
                                </button>
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped></style>
