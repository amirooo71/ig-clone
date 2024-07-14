<script setup>
import { usePage } from "@inertiajs/vue3";
import { useToast } from "vue-toastification";
import { onMounted } from "vue";

const toast = useToast();
const page = usePage();

onMounted(() => {
    if (page.props.flash.success) {
        toast.success(page.props.flash.success);
    }
    if (page.props.flash.error) {
        toast.error(page.props.flash.error);
    }
    if (page.props.flash.message) {
        toast.info(page.props.flash.message);
    }
});
</script>

<template></template>

<style scoped></style>
