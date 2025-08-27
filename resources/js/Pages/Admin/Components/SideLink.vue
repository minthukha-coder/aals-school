<template>
    <li class="my-2 position-relative rounded-lg" :class="props.isOpen ? 'bg-green-500' : ''">
        <Link :href="props.href">
        <PrimaryButton :class="[
            { 'bg-green-500': props.isOpen },
            { 'text-white': props.isOpen },
        ]">
            <font-awesome-icon
            :class="props.isOpen ? 'text-white' : 'text-green-500'":icon="props.icon"/>
            <span class="pl-2 me-5 text-xs" :class="props.isOpen ? 'text-white' : 'text-green-500'">
                {{ props.text }}
            </span> <font-awesome-icon class="ml-auto" v-if="hasArrow" :class="{ '_rotate-0': isOpen }"
                icon="fa-solid fa-caret-right" />
            <span v-if="count"
                class="position-absolute right-1 -top-1 inline-flex items-center rounded-full bg-red-500 text-white px-2 py-1 text-xs">{{
                count }}</span>
        </PrimaryButton>
        </Link>
    </li>
</template>

<script setup>
import PrimaryButton from "../Components/PrimaryButton.vue";
import { defineProps } from "vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    count: Number,
    text: String,
    icon: String,
    isOpen: {
        type: Boolean,
        default: false,
    },
    hasArrow: {
        type: Boolean,
        default: false,
    },
    appendBtnColor: String,
    href: String
});



</script>

<style></style>
