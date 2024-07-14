<script setup>
import { Link, router } from "@inertiajs/vue3";
</script>

<template>
    <nav class="border-b dark:border-slate-700">
        <ul
            class="flex gap-5 text-sm text-center text-gray-600 capitalize font-semibold -mb-px dark:text-white/80"
        >
            <li>
                <Link
                    :href="route('people.followers')"
                    :class="{
                        'border-gray-800': route().current('people.followers'),
                    }"
                    class="inline-block py-5 border-b-2 border-transparent"
                >
                    followers {{ $page.props.auth.user.followers_count }}
                </Link>
            </li>
            <li>
                <Link
                    :href="route('people.followings')"
                    :class="{
                        'border-gray-800': route().current('people.followings'),
                    }"
                    class="inline-block py-5 border-b-2 border-transparent"
                >
                    following {{ $page.props.auth.user.followings_count }}
                </Link>
            </li>
            <li>
                <Link
                    :href="route('people.suggestions')"
                    :class="{
                        'border-gray-800':
                            route().current('people.suggestions'),
                    }"
                    class="inline-block py-5 border-b-2 border-transparent"
                >
                    Suggestions
                </Link>
            </li>
        </ul>
    </nav>
</template>

<style scoped></style>
