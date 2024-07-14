<script setup>
import vueFilePond from "vue-filepond";
import FilePondPluginImagePreview from "filepond-plugin-image-preview";
import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
import FilePondPluginFileValidateSize from "filepond-plugin-file-validate-size";
import IgModal from "@/Components/IgModal.vue";
import { reactive, ref, inject } from "vue";
import { router } from "@inertiajs/vue3";

import "filepond/dist/filepond.min.css";
import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css";
import InputError from "@/Components/InputError.vue";

const eventBus = inject("eventBus");

const FilePond = vueFilePond(
    FilePondPluginImagePreview,
    FilePondPluginFileValidateType,
    FilePondPluginFileValidateSize,
);

const files = ref([]);

const form = reactive({
    description: "",
    location: "",
    hide_likes_count: false,
    allow_commenting: false,
    media: files,
});

const handleFiles = (fileItems) => {
    files.value = fileItems.map((fileItem) => fileItem.file);
};

const onSubmit = () => {
    router.post("/post", form, {
        onSuccess: () => {
            eventBus.emit("load-home-data");
        },
    });
};
</script>

<template>
    <IgModal>
        <div
            class="tt relative mx-auto bg-white shadow-xl rounded-lg max-lg:w-full dark:bg-dark2"
        >
            <ul class="hidden" uk-switcher="connect: .posTabs">
                <li><a href="#">...</a></li>
                <li><a href="#">...</a></li>
            </ul>
            <ul
                class="uk-switcher posTabs p-3.5 border-b text-center text-sm font-semibold text-black dark:text-white dark:border-slate-700"
            >
                <!-- tab 1 -->
                <li>
                    <div>Upload Photo</div>
                    <a
                        v-if="files.length"
                        href="#"
                        class="absolute top-0 m-3 right-1 text-blue-600"
                        uk-switcher-item="next"
                    >
                        Next</a
                    >
                </li>

                <!-- tab 2 -->
                <li>
                    <a
                        href="#"
                        class="absolute top-0 m-3.5 left-0"
                        uk-switcher-item="previous"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-6 h-6"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"
                            />
                        </svg>
                    </a>
                    <div v-if="files.length">Premission Photo</div>
                    <p v-else class="text-red-600 font-bold">
                        Please upload photo
                    </p>

                    <!-- submit button -->
                    <button
                        v-if="files.length"
                        @click="onSubmit"
                        class="text-white bg-blue-600 rounded-lg py-1.5 px-5 text-sm absolute top-0 m-2.5 right-0 uk-animation-slide-right-small"
                    >
                        Share
                    </button>
                </li>
            </ul>

            <div class="lg:inline-flex">
                <!-- photo upload -->
                <div class="lg:w-[600px] w-full">
                    <div
                        class="w-full lg:h-[600px] h-80 relative overflow-hidden flex justify-center items-center"
                    >
                        <file-pond
                            :instantUpload="false"
                            maxFiles="1"
                            label-idle="Select from the computer"
                            accepted-file-types="image/jpeg, image/png, image/jpg, video/mp4"
                            max-file-size="3MB"
                            class="w-full px-4"
                            @updatefiles="handleFiles"
                        ></file-pond>
                    </div>
                </div>

                <!-- right sidebar -->
                <div
                    class="relative w-auto border-l dark:border-slate-700 text-left"
                >
                    <ul class="uk-switcher posTabs">
                        <!-- tab 1 -->
                        <li></li>

                        <!-- tab 2 Premission Photo-->
                        <li>
                            <div
                                class="lg:w-[300px] lg:max-h-[600px] overflow-y-auto uk-animation-fade"
                            >
                                <textarea
                                    v-model="form.description"
                                    name="description"
                                    rows="8"
                                    placeholder="What is going on.."
                                    class="w-full !p-4 !rounded-none border-0 focus:outline-none focus:ring-0"
                                ></textarea>
                                <InputError
                                    :message="$page.props.errors.description"
                                />

                                <ul
                                    class="divide-y divide-gray-100 dark:divide-slate-700"
                                    uk-nav="multiple: true"
                                >
                                    <li>
                                        <div
                                            class="flex items-center justify-between py-2 px-3.5"
                                        >
                                            <input
                                                v-model="form.location"
                                                name="location"
                                                type="text"
                                                placeholder="Add locations"
                                                class="font-medium text-sm w-full !bg-transparent !px-0 focus:!border-transparent focus:!ring-transparent"
                                            />
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke-width="1.5"
                                                stroke="currentColor"
                                                class="w-6 h-6"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"
                                                />
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"
                                                />
                                            </svg>
                                        </div>
                                        <InputError
                                            :message="
                                                $page.props.errors.location
                                            "
                                        />
                                    </li>
                                    <li class="uk-parent uk-open">
                                        <a
                                            href="#"
                                            class="flex items-center justify-between py-2 px-3.5 group"
                                            aria-expanded="true"
                                        >
                                            <h4 class="font-medium text-sm">
                                                Advanced settings
                                            </h4>
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke-width="1.5"
                                                stroke="currentColor"
                                                class="w-6 h-6 group-aria-expanded:rotate-180 duration-200"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M4.5 15.75l7.5-7.5 7.5 7.5"
                                                />
                                            </svg>
                                        </a>
                                        <ul class="-space-y-2">
                                            <li>
                                                <div class="p-4">
                                                    <label
                                                        class="switch flex justify-between items-start gap-4 cursor-pointer min-h-[30px]"
                                                    >
                                                        <div>
                                                            <h4
                                                                class="font-medium text-sm"
                                                            >
                                                                Hide like and
                                                                view counts on
                                                                this post
                                                            </h4>
                                                        </div>
                                                        <input
                                                            v-model="
                                                                form.hide_likes_count
                                                            "
                                                            name="hide_likes_count"
                                                            type="checkbox"
                                                        /><span
                                                            class="switch-button !relative shrink-0"
                                                        ></span>
                                                    </label>
                                                    <div>
                                                        <p
                                                            class="text-[13px] font-light mt-1.5 text-gray-500"
                                                        >
                                                            Only you will see
                                                            the total number of
                                                            likes and views on
                                                            this post. You can
                                                            change this later by
                                                            going to the ···
                                                            menu at the top of
                                                            the post. To hide
                                                            like counts on other
                                                            people's posts, go
                                                            to your account
                                                            settings.
                                                            <a href="#">
                                                                Learn more</a
                                                            >.
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="p-4">
                                                    <label
                                                        class="switch flex justify-between items-start gap-4 cursor-pointer min-h-[30px]"
                                                    >
                                                        <div>
                                                            <h4
                                                                class="font-medium text-sm"
                                                            >
                                                                Turn off
                                                                commenting
                                                            </h4>
                                                        </div>
                                                        <input
                                                            v-model="
                                                                form.allow_commenting
                                                            "
                                                            name="allow_commenting"
                                                            type="checkbox"
                                                        /><span
                                                            class="switch-button !relative shrink-0"
                                                        ></span>
                                                    </label>
                                                    <div>
                                                        <p
                                                            class="text-[13px] font-light mt-1.5 text-gray-500"
                                                        >
                                                            You can change this
                                                            later by going to
                                                            the menu at the top
                                                            of your post.
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </IgModal>
</template>

<style scoped></style>
