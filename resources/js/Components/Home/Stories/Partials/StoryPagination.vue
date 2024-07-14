<script setup></script>

<template>
    <div class="max-md:hidden">
        <button
            type="button"
            class="absolute -translate-y-1/2 bg-white shadow rounded-full top-1/2 -left-3.5 grid w-8 h-8 place-items-center dark:bg-dark3"
            uk-slider-item="previous"
        >
            <ion-icon name="chevron-back" class="text-2xl"></ion-icon>
        </button>
        <button
            type="button"
            class="absolute -right-2 -translate-y-1/2 bg-white shadow rounded-full top-1/2 grid w-8 h-8 place-items-center dark:bg-dark3"
            uk-slider-item="next"
        >
            <ion-icon name="chevron-forward" class="text-2xl"></ion-icon>
        </button>
    </div>
</template>

<style scoped></style>
