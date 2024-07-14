<script setup>
import { Link } from "@inertiajs/vue3";
defineProps(["userId"]);
</script>

<template>
    <div>
        <nav
            class="text-sm text-center text-gray-500 capitalize font-semibold dark:text-white"
        >
            <ul
                class="flex gap-2 justify-center border-t dark:border-slate-700"
            >
                <li>
                    <Link
                        :href="route('profile.posts.show', userId)"
                        :class="{
                            'border-gray-800': route().current(
                                'profile.posts.show',
                                userId,
                            ),
                        }"
                        class="flex items-center p-4 py-2.5 -mb-px border-t-2 border-transparent"
                    >
                        <ion-icon
                            class="mr-2 text-2xl"
                            name="camera-outline"
                        ></ion-icon>
                        Posts
                    </Link>
                </li>
                <li>
                    <Link
                        :href="route('profile.reels.show', userId)"
                        :class="{
                            'border-gray-800': route().current(
                                'profile.reels.show',
                                userId,
                            ),
                        }"
                        class="flex items-center p-4 py-2.5 -mb-px border-t-2 border-transparent"
                    >
                        <ion-icon
                            class="mr-2 text-2xl"
                            name="play-outline"
                        ></ion-icon>
                        Reels
                    </Link>
                </li>
                <li>
                    <Link
                        :href="route('profile.saved.show', userId)"
                        :class="{
                            'border-gray-800': route().current(
                                'profile.saved.show',
                                userId,
                            ),
                        }"
                        class="flex items-center p-4 py-2.5 -mb-px border-t-2 border-transparent"
                    >
                        <ion-icon
                            class="mr-2 text-2xl"
                            name="bookmark-outline"
                        ></ion-icon>
                        Saved
                    </Link>
                </li>
            </ul>
        </nav>
    </div>
</template>

<style scoped></style>
