<script setup></script>

<template>
    <li class="md:pr-2.5 pr-2 hover:scale-[1.15] hover:-rotate-2 duration-300">
        <a
            :href="`/assets/images/avatars/avatar-lg-${Math.floor(Math.random() * 5) + 1}.jpg`"
            data-caption="Caption 1"
        >
            <div
                class="md:w-20 md:h-20 w-12 h-12 relative md:border-4 border-2 shadow border-white rounded-full overflow-hidden dark:border-slate-700"
            >
                <img
                    :src="`assets/images/avatars/avatar-${Math.floor(Math.random() * 7) + 1}.jpg`"
                    alt=""
                    class="absolute w-full h-full object-cover"
                />
            </div>
        </a>
    </li>
</template>

<style scoped></style>
