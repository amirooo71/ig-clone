<script setup>
import { ref } from "vue";
import { Link } from "@inertiajs/vue3";

const users = ref([]);
const query = ref("");

const searchUser = () => {
    axios
        .get(
            route("search", {
                query: query.value,
            }),
        )
        .then((res) => {
            users.value = res.data;
        });
};
</script>

<template>
    <div
        class="sm:w-[397px] w-full bg-white shadow-lg md:!left-[73px] hidden !left-0 dark:bg-dark2 dark:border1 max-md:bottom-[57px]"
        uk-drop="animation: uk-animation-slide-left-small , uk-transform-origin-center-left ;animate-out: true; pos: left ; mode:click; offset: 9"
    >
        <div class="md:h-screen overflow-y-auto h-[calc(100vh-120px)]">
            <!-- header -->
            <div
                class="px-5 py-4 space-y-5 border-b border-gray-100 dark:border-slate-700"
            >
                <h3
                    class="md:text-xl text-lg font-medium mt-3 text-black dark:text-white"
                >
                    Search
                </h3>

                <div class="relative -mx-1">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="2"
                        stroke="currentColor"
                        class="w-5 h-5 absolute left-3 bottom-1/2 translate-y-1/2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"
                        />
                    </svg>
                    <div class="flex justify-between items-center">
                        <input
                            type="text"
                            v-model="query"
                            placeholder="Search"
                            class="bg-transparen w-full !pl-10 !py-2 !rounded-lg"
                        />
                        <button
                            v-if="query"
                            @click="searchUser"
                            class="text-sm ml-2 bg-secondery p-2 rounded-lg cursor-pointer hover:bg-gray-300"
                        >
                            Search
                        </button>
                    </div>
                </div>
            </div>

            <!-- contents list -->
            <div class="p-2 space-y-2 dark:text-white">
                <Link
                    v-if="users.length"
                    v-for="user in users"
                    :href="route('profile.posts.show', user.id)"
                    :key="user.id"
                    class="relative flex items-center gap-3 p-2 duration-200 rounded-xl hover:bg-secondery"
                >
                    <img
                        :src="user.profile_photo_url"
                        alt="user"
                        class="bg-gray-200 rounded-full w-10 h-10"
                    />
                    <div class="fldex-1 min-w-0">
                        <h4
                            class="font-medium text-sm text-black dark:text-white"
                        >
                            {{ user.name }}
                        </h4>
                    </div>
                </Link>
                <div v-else class="flex justify-center">
                    <p class="font-bold">Find your best friend</p>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped></style>
