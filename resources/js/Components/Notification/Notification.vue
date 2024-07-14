<script setup>
import { formatDistance, parseISO } from "date-fns";
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <div
        class="sm:w-[397px] w-full bg-white shadow-lg md:!left-[73px] hidden !left-0 dark:bg-dark2 dark:border1 max-md:bottom-[57px]"
        uk-drop="pos: left-center;animate-out: true; animation: uk-animation-slide-left-medium ; mode:click"
    >
        <div class="md:h-screen overflow-y-auto h-[calc(100vh-120px)]">
            <!-- header -->
            <div class="flex items-center justify-between px-5 py-4 mt-3">
                <h3
                    class="md:text-xl text-lg font-medium mt-3 text-black dark:text-white"
                >
                    Notification
                </h3>
            </div>

            <!-- contents list -->
            <div class="px-2 -mt-2 text-sm font-normal">
                <Link
                    v-if="$page.props.notifications.length"
                    v-for="notificatin in $page.props.notifications"
                    :href="route('notification.mark-as-read', notificatin.id)"
                    preserve-state
                    preserve-scroll
                    class="relative flex items-center gap-3 p-2 duration-200 rounded-xl hover:bg-secondery cursor-pointer"
                >
                    <div class="relative w-12 h-12 shrink-0">
                        <img
                            :src="notificatin.data.profile_photo_url"
                            alt=""
                            class="object-cover w-full h-full rounded-full"
                        />
                    </div>
                    <div class="flex-1">
                        <p>
                            <b class="font-bold mr-1">
                                {{ notificatin.data.name }}</b
                            >
                            {{ notificatin.data.message }}
                        </p>
                        <div
                            class="text-xs text-gray-500 mt-1.5 dark:text-white/80"
                        >
                            {{
                                formatDistance(
                                    parseISO(notificatin.created_at),
                                    new Date(),
                                )
                            }}
                        </div>
                    </div>
                </Link>
                <div v-else class="flex justify-center">
                    <p>Nothing here.</p>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped></style>
