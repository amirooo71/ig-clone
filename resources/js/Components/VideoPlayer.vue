<script setup>
import { VideoPlayer } from "@videojs-player/vue";
import "video.js/dist/video-js.css";
import { ref } from "vue";

defineProps({
    src: String,
    isFluid: {
        type: Boolean,
        default: true,
    },
    preview: {
        type: Boolean,
        default: true,
    },
});

const player = ref(null);
const playing = ref(false);
const isMuted = ref(false);

const handlePlay = () => {
    player.value.play();
    playing.value = true;
};

const handlePause = () => {
    player.value.pause();
    playing.value = false;
};

const handleMuted = () => {
    player.value.muted(true);
    isMuted.value = !isMuted.value;
};
const handleOnMuted = () => {
    player.value.muted(false);
    isMuted.value = !isMuted.value;
};

const handleMounted = (payload) => {
    player.value = payload.player;
};

const onClickOutside = () => {
    player.value.pause();
    player.value.currentTime(0);
    playing.value = false;
};
</script>

<template>
    <div v-click-outside="onClickOutside" class="relative h-full w-full m-auto">
        <video-player
            :responsive="true"
            :fluid="isFluid"
            :src="src"
            class="h-full max-h-[500px] w-full"
            @mounted="handleMounted"
        />

        <div
            v-show="!playing && preview"
            class="absolute z-10 inset-0 flex items-center justify-center w-full h-full cursor-pointer"
            @click="handlePlay"
        >
            <svg
                class="bi bi-play-fill w-16 h-16 text-white"
                fill="currentColor"
                height="16"
                viewBox="0 0 16 16"
                width="16"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393"
                />
            </svg>
        </div>

        <div
            v-show="playing && preview"
            class="absolute z-10 inset-0 flex items-center justify-center w-full h-full cursor-pointer"
            @click="handlePause"
        >
            <svg
                class="bi bi-pause-fill w-16 h-16 text-white invisible"
                fill="currentColor"
                height="16"
                viewBox="0 0 16 16"
                width="16"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    d="M5.5 3.5A1.5 1.5 0 0 1 7 5v6a1.5 1.5 0 0 1-3 0V5a1.5 1.5 0 0 1 1.5-1.5m5 0A1.5 1.5 0 0 1 12 5v6a1.5 1.5 0 0 1-3 0V5a1.5 1.5 0 0 1 1.5-1.5"
                />
            </svg>
        </div>

        <div
            v-if="preview"
            class="absolute bottom-2 right-2 m-4 bg-gray-900 text-white rounded-lg p-1 cursor-pointer z-10"
        >
            <svg
                v-show="!isMuted"
                class="bi bi-volume-mute-fill h-4 w-4"
                fill="currentColor"
                height="16"
                viewBox="0 0 16 16"
                width="16"
                xmlns="http://www.w3.org/2000/svg"
                @click="handleMuted"
            >
                <path
                    d="M6.717 3.55A.5.5 0 0 1 7 4v8a.5.5 0 0 1-.812.39L3.825 10.5H1.5A.5.5 0 0 1 1 10V6a.5.5 0 0 1 .5-.5h2.325l2.363-1.89a.5.5 0 0 1 .529-.06m7.137 2.096a.5.5 0 0 1 0 .708L12.207 8l1.647 1.646a.5.5 0 0 1-.708.708L11.5 8.707l-1.646 1.647a.5.5 0 0 1-.708-.708L10.793 8 9.146 6.354a.5.5 0 1 1 .708-.708L11.5 7.293l1.646-1.647a.5.5 0 0 1 .708 0"
                />
            </svg>

            <svg
                v-show="isMuted"
                class="bi bi-volume-off-fill h-4 w-4"
                fill="currentColor"
                height="16"
                viewBox="0 0 16 16"
                width="16"
                xmlns="http://www.w3.org/2000/svg"
                @click="handleOnMuted"
            >
                <path
                    d="M10.717 3.55A.5.5 0 0 1 11 4v8a.5.5 0 0 1-.812.39L7.825 10.5H5.5A.5.5 0 0 1 5 10V6a.5.5 0 0 1 .5-.5h2.325l2.363-1.89a.5.5 0 0 1 .529-.06"
                />
            </svg>
        </div>
    </div>
</template>

<style scoped></style>
