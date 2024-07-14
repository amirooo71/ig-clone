<script setup>
import { Link, router } from "@inertiajs/vue3";
import Search from "@/Components/Search/Search.vue";
import Notification from "@/Components/Notification/Notification.vue";
import Avatar from "@/Components/Avatar.vue";

const logout = () => {
    router.post(route("logout"));
};
</script>

<template>
    <div
        id="sidebar"
        class="fixed top-0 left-0 z-40 max-md:top-auto max-md:bottom-0"
    >
        <div
            id="sidebar__inner"
            class="flex md:flex-col justify-between md:h-screen md:p-2 p-1 transition-all duration-500 bg-white shadow dark:bg-dark2 2xl:w-72 xl:w-60 max-xl:w-[73px] max-md:w-screen max-md:border-t max-md:dark:border-slate-700"
        >
            <!-- logo -->
            <div
                class="flex h-20 px-2 max-md:fixed max-md:top-0 max-md:w-full max-md:bg-white/80 max-md:left-0 max-md:px-4 max-md:h-14 max-md:shadow-sm max-md:dark:bg-slate-900/80 backdrop-blur-xl"
            >
                <Link
                    :href="route('home')"
                    id="logo"
                    class="flex items-center gap-3"
                >
                    <!-- logo icon -->
                    <img
                        id="logo__icon"
                        src="/assets/images/free-logo.svg"
                        alt=""
                        class="md:w-8 hidden text-2xl max-xl:!block max-md:!hidden shrink-0 uk-animation-scale-up"
                    />

                    <!-- text logo -->
                    <img
                        id="logo__text"
                        src="/assets/images/free-logo.svg"
                        alt=""
                        class="w-full h-6 ml-1 max-xl:hidden max-md:block dark:!hidden"
                    />
                    <img
                        id="logo__text"
                        src="/assets/images/free-logo.svg"
                        alt=""
                        class="w-full h-6 ml-1 !hidden max-xl:!hidden max-md:block dark:max-md:!block dark:!block"
                    />
                </Link>
            </div>

            <!-- nav -->
            <nav class="flex-1 max-md:flex max-md:justify-around md:space-y-2">
                <!-- Home -->
                <Link :href="route('home')" class="active">
                    <svg
                        id="icon__outline"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="2"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"
                        />
                    </svg>
                    <svg
                        id="icon__solid"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                        class="hidden"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M9.293 2.293a1 1 0 011.414 0l7 7A1 1 0 0117 11h-1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-3a1 1 0 00-1-1H9a1 1 0 00-1 1v3a1 1 0 01-1 1H5a1 1 0 01-1-1v-6H3a1 1 0 01-.707-1.707l7-7z"
                            clip-rule="evenodd"
                        />
                    </svg>
                    <span class="max-xl:hidden"> Home </span>
                </Link>

                <!-- Search -->
                <a href="#">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="2"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"
                        />
                    </svg>
                    <span class="max-xl:hidden"> Search </span>
                </a>
                <Search />
                <!-- Explore -->
                <Link :href="route('explore')" class="max-md:!hidden">
                    <svg
                        id="icon__outline"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        class="bi bi-compass"
                        viewBox="0 0 16 16"
                    >
                        <path
                            d="M8 16.016a7.5 7.5 0 0 0 1.962-14.74A1 1 0 0 0 9 0H7a1 1 0 0 0-.962 1.276A7.5 7.5 0 0 0 8 16.016zm6.5-7.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"
                        />
                        <path
                            d="m6.94 7.44 4.95-2.83-2.83 4.95-4.949 2.83 2.828-4.95z"
                        />
                    </svg>
                    <svg
                        id="icon__solid"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                        class="hidden"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M13.5 4.938a7 7 0 11-9.006 1.737c.202-.257.59-.218.793.039.278.352.594.672.943.954.332.269.786-.049.773-.476a5.977 5.977 0 01.572-2.759 6.026 6.026 0 012.486-2.665c.247-.14.55-.016.677.238A6.967 6.967 0 0013.5 4.938zM14 12a4 4 0 01-4 4c-1.913 0-3.52-1.398-3.91-3.182-.093-.429.44-.643.814-.413a4.043 4.043 0 001.601.564c.303.038.531-.24.51-.544a5.975 5.975 0 011.315-4.192.447.447 0 01.431-.16A4.001 4.001 0 0114 12z"
                            clip-rule="evenodd"
                        />
                    </svg>
                    <span class="max-xl:hidden"> Explore </span>
                </Link>

                <Link
                    :href="route('conversation.index')"
                    class="max-md:!fixed max-md:top-2 max-md:right-2"
                >
                    <svg
                        id="icon__outline"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="2"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z"
                        />
                    </svg>
                    <svg
                        id="icon__solid"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        class="hidden"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M4.848 2.771A49.144 49.144 0 0112 2.25c2.43 0 4.817.178 7.152.52 1.978.292 3.348 2.024 3.348 3.97v6.02c0 1.946-1.37 3.678-3.348 3.97a48.901 48.901 0 01-3.476.383.39.39 0 00-.297.17l-2.755 4.133a.75.75 0 01-1.248 0l-2.755-4.133a.39.39 0 00-.297-.17 48.9 48.9 0 01-3.476-.384c-1.978-.29-3.348-2.024-3.348-3.97V6.741c0-1.946 1.37-3.68 3.348-3.97zM6.75 8.25a.75.75 0 01.75-.75h9a.75.75 0 010 1.5h-9a.75.75 0 01-.75-.75zm.75 2.25a.75.75 0 000 1.5H12a.75.75 0 000-1.5H7.5z"
                            clip-rule="evenodd"
                        ></path>
                    </svg>
                    <span class="max-xl:hidden"> Messages </span>
                </Link>

                <!-- reels -->
                <Link :href="route('reels')">
                    <svg
                        id="icon__outline"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3.75 7.5l16.5-4.125M12 6.75c-2.708 0-5.363.224-7.948.655C2.999 7.58 2.25 8.507 2.25 9.574v9.176A2.25 2.25 0 004.5 21h15a2.25 2.25 0 002.25-2.25V9.574c0-1.067-.75-1.994-1.802-2.169A48.329 48.329 0 0012 6.75zm-1.683 6.443l-.005.005-.006-.005.006-.005.005.005zm-.005 2.127l-.005-.006.005-.005.005.005-.005.005zm-2.116-.006l-.005.006-.006-.006.005-.005.006.005zm-.005-2.116l-.006-.005.006-.005.005.005-.005.005zM9.255 10.5v.008h-.008V10.5h.008zm3.249 1.88l-.007.004-.003-.007.006-.003.004.006zm-1.38 5.126l-.003-.006.006-.004.004.007-.006.003zm.007-6.501l-.003.006-.007-.003.004-.007.006.004zm1.37 5.129l-.007-.004.004-.006.006.003-.004.007zm.504-1.877h-.008v-.007h.008v.007zM9.255 18v.008h-.008V18h.008zm-3.246-1.87l-.007.004L6 16.127l.006-.003.004.006zm1.366-5.119l-.004-.006.006-.004.004.007-.006.003zM7.38 17.5l-.003.006-.007-.003.004-.007.006.004zm-1.376-5.116L6 12.38l.003-.007.007.004-.004.007zm-.5 1.873h-.008v-.007h.008v.007zM17.25 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zm0 4.5a.75.75 0 110-1.5.75.75 0 010 1.5z"
                        />
                    </svg>
                    <svg
                        id="icon__solid"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        class="hidden"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M20.432 4.103a.75.75 0 00-.364-1.455L4.128 6.632l-.2.033C2.498 6.904 1.5 8.158 1.5 9.575v9.175a3 3 0 003 3h15a3 3 0 003-3V9.574c0-1.416-.997-2.67-2.429-2.909a49.016 49.016 0 00-7.255-.658l7.616-1.904zm-9.585 8.56a.75.75 0 010 1.06l-.005.006a.75.75 0 01-1.06 0l-.006-.005a.75.75 0 010-1.061l.005-.005a.75.75 0 011.06 0l.006.005zM9.781 15.85a.75.75 0 001.061 0l.005-.005a.75.75 0 000-1.061l-.005-.005a.75.75 0 00-1.06 0l-.006.005a.75.75 0 000 1.06l.005.006zm-1.055-1.066a.75.75 0 010 1.06l-.005.006a.75.75 0 01-1.061 0l-.005-.005a.75.75 0 010-1.06l.005-.006a.75.75 0 011.06 0l.006.005zM7.66 13.73a.75.75 0 001.061 0l.005-.006a.75.75 0 000-1.06l-.005-.005a.75.75 0 00-1.06 0l-.006.005a.75.75 0 000 1.06l.005.006zM9.255 9.75a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75h-.008a.75.75 0 01-.75-.75V10.5a.75.75 0 01.75-.75h.008zm3.624 3.28a.75.75 0 00.275-1.025L13.15 12a.75.75 0 00-1.025-.275l-.006.004a.75.75 0 00-.275 1.024l.004.007a.75.75 0 001.024.274l.007-.003zm-1.38 5.126a.75.75 0 01-1.024-.274l-.004-.007a.75.75 0 01.275-1.024l.006-.004a.75.75 0 011.025.274l.004.007a.75.75 0 01-.275 1.024l-.006.004zm.282-6.776a.75.75 0 00-.274-1.025l-.007-.003a.75.75 0 00-1.024.274l-.004.007a.75.75 0 00.274 1.024l.007.004a.75.75 0 001.024-.274l.004-.007zm1.369 5.129a.75.75 0 01-1.025.274l-.006-.003a.75.75 0 01-.275-1.025l.004-.006a.75.75 0 011.025-.275l.006.004a.75.75 0 01.275 1.024l-.004.007zm-.145-1.502a.75.75 0 00.75-.75v-.007a.75.75 0 00-.75-.75h-.008a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008zm-3.75 2.243a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75h-.008a.75.75 0 01-.75-.75V18a.75.75 0 01.75-.75h.008zm-2.871-.47a.75.75 0 00.274-1.025l-.003-.006a.75.75 0 00-1.025-.275l-.006.004a.75.75 0 00-.275 1.025l.004.006a.75.75 0 001.024.274l.007-.003zm1.366-5.12a.75.75 0 01-1.025-.274l-.004-.006a.75.75 0 01.275-1.025l.006-.003a.75.75 0 011.025.274l.004.007a.75.75 0 01-.275 1.024l-.006.004zm.281 6.215a.75.75 0 00-.275-1.024l-.006-.004a.75.75 0 00-1.025.274l-.003.007a.75.75 0 00.274 1.024l.007.004a.75.75 0 001.024-.274l.004-.007zM6.655 12.76a.75.75 0 01-1.025.274l-.006-.003a.75.75 0 01-.275-1.025L5.353 12a.75.75 0 011.025-.275l.006.004a.75.75 0 01.275 1.024l-.004.007zm-1.15 2.248a.75.75 0 00.75-.75v-.007a.75.75 0 00-.75-.75h-.008a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008zM17.25 10.5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zm1.5 6a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z"
                            clip-rule="evenodd"
                        />
                    </svg>
                    <span class="max-xl:hidden"> reels </span>
                </Link>

                <!-- Notification -->
                <a
                    href="#!"
                    class="max-md:!fixed max-md:top-2 max-md:right-14 relative"
                >
                    <svg
                        id="icon__outline"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"
                        />
                    </svg>
                    <svg
                        id="icon__solid"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        class="hidden"
                    >
                        <path
                            d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z"
                        />
                    </svg>
                    <span class="max-xl:hidden"> Notifications </span>
                    <div
                        v-show="$page.props.notifications.length"
                        class="w-2 h-2 bg-red-600 rounded-full absolute left-7 top-2.5"
                    ></div>
                </a>
                <Notification />
                <!-- peaple -->
                <Link :href="route('people.followers')" class="max-md:!hidden">
                    <svg
                        id="icon__outline"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"
                        />
                    </svg>
                    <svg
                        id="icon__solid"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                        class="hidden"
                    >
                        <path
                            d="M7 8a3 3 0 100-6 3 3 0 000 6zM14.5 9a2.5 2.5 0 100-5 2.5 2.5 0 000 5zM1.615 16.428a1.224 1.224 0 01-.569-1.175 6.002 6.002 0 0111.908 0c.058.467-.172.92-.57 1.174A9.953 9.953 0 017 18a9.953 9.953 0 01-5.385-1.572zM14.5 16h-.106c.07-.297.088-.611.048-.933a7.47 7.47 0 00-1.588-3.755 4.502 4.502 0 015.874 2.636.818.818 0 01-.36.98A7.465 7.465 0 0114.5 16z"
                        />
                    </svg>
                    <span class="max-xl:hidden"> People </span>
                </Link>
                <Link
                    :href="
                        route('profile.posts.show', $page.props.auth.user.id)
                    "
                    class="max-md:!hidden"
                >
                    <Avatar size="w-6 h-6" />
                    <span class="max-xl:hidden"> Profile </span>
                </Link>
            </nav>

            <!-- profile -->
            <div>
                <a id="profile-link" class="flex items-center gap-3 p-3 group">
                    <img
                        :src="$page.props.auth.user.profile_photo_url"
                        alt="user"
                        class="rounded-full md:w-7 md:h-7 w-5 h-5 shrink-0"
                    />
                    <span class="font-semibold text-sm max-xl:hidden">
                        {{ $page.props.auth.user.name }}
                    </span>
                    <ion-icon
                        name="chevron-forward-outline"
                        class="text-xl ml-auto duration-200 group-aria-expanded:-rotate-90 max-xl:hidden"
                    ></ion-icon>
                </a>
                <div
                    class="bg-white sm:w-64 2xl:w-[calc(100%-16px)] w-full shadow-lg border rounded-xl overflow-hidden max-md:!top-auto max-md:bottom-16 border2 dark:bg-dark2 hidden"
                    uk-drop="animation:uk-animation-slide-bottom-medium ;animate-out: true"
                >
                    <div
                        class="w-full h-1.5 bg-gradient-to-r to-purple-500 via-red-500 from-pink-500"
                    ></div>

                    <div class="p-4 text-xs font-medium">
                        <a href="#">
                            <img
                                :src="$page.props.auth.user.profile_photo_url"
                                class="w-8 h-8 rounded-full"
                                alt=""
                            />
                            <div class="mt-2 space-y-0.5">
                                <div class="text-base font-semibold">
                                    {{ $page.props.auth.user.name }}
                                </div>
                                <div class="text-gray-400 dark:text-white/80">
                                    @{{ $page.props.auth.user.name }}
                                </div>
                            </div>
                        </a>
                        <div class="mt-3 flex gap-3.5">
                            <div>
                                <a href="#">
                                    <strong>
                                        {{
                                            $page.props.auth.user
                                                .followings_count
                                        }}
                                    </strong>
                                    <span
                                        class="text-gray-400 dark:text-white/80 ml-1"
                                        >Following
                                    </span>
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    <strong>
                                        {{
                                            $page.props.auth.user
                                                .followers_count
                                        }}
                                    </strong>
                                    <span
                                        class="text-gray-400 dark:text-white/80 ml-1"
                                        >Followers
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <hr class="opacity-60" />
                    <ul class="text-sm font-semibold p-2">
                        <li>
                            <Link
                                :href="route('profile.show')"
                                class="flex gap-3 rounded-md p-2 hover:bg-secondery"
                            >
                                <ion-icon
                                    name="settings-outline"
                                    class="text-lg"
                                ></ion-icon>
                                Acount Setting
                            </Link>
                        </li>
                        <li>
                            <a
                                @click="logout"
                                class="flex gap-3 rounded-md p-2 hover:bg-secondery"
                            >
                                <ion-icon
                                    name="log-out-outline"
                                    class="text-lg"
                                ></ion-icon>
                                Log Out</a
                            >
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped></style>
