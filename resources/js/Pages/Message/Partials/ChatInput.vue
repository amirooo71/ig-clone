<script setup>
import { useForm } from "@inertiajs/vue3";
import {inject} from 'vue';

const props = defineProps(["cId"]);
const eventBus = inject('eventBus');
const form = useForm({
    body: "",
});

const onSubmit = () => {
    form.post(route("message.store", props.cId),{
      onSuccess: () => {
        form.reset();
        eventBus.emit('add-chat-message');
      }
    });
};
</script>

<template>
    <form
        @submit.prevent="onSubmit"
        class="flex items-center md:gap-4 gap-2 md:p-3 p-2 overflow-hidden"
    >
        <div class="relative flex-1">
            <input
                v-model="form.body"
                placeholder="Write your message"
                class="w-full resize-none bg-secondery rounded-full px-4 p-2"
            ></input>

            <button
                type="submit"
                class="text-gray-500 shrink-0 p-2 absolute right-0.5 top-0 hover:text-black"
            >
                <ion-icon
                    class="text-xl flex md hydrated"
                    name="send-outline"
                    role="img"
                    aria-label="send outline"
                ></ion-icon>
            </button>
        </div>
    </form>
</template>

<style scoped></style>
