<script setup>
import { ref, toRefs } from "vue";
import { usePage } from "@inertiajs/vue3";

import LikesSection from "@/Components/LikesSection.vue";

import Close from "vue-material-design-icons/Close.vue";
import DotsHorizontal from "vue-material-design-icons/DotsHorizontal.vue";
import EmoticonHappyOutline from "vue-material-design-icons/EmoticonHappyOutline.vue";

let comment = ref("");
let deleteType = ref(null);
let id = ref(null);

// Get the logged in user
const user = usePage().props.auth.user;

const props = defineProps(["post"]);
const { post } = toRefs(props);

defineEmits(["closeOverlay", "addComment", "updateLike", "deleteSelected"]);

// Dynamically resize the textarea according to the text input
const textareaInput = (e) => {
    textarea.value.style.height = "auto";
    textarea.value.style.height = `${e.target.scrollHeight}px`;
};
</script>

<template>
    <div
        id="OverlaySection"
        class="fixed z-50 top-0 left-0 w-full h-screen bg-[#000000] bg-opacity-60 p-3"
    >
        <button class="absolute right-3" @click="$emit('closeOverlay')">
            <Close :size="27" fillColor="#FFFFFF" />
        </button>
    </div>
</template>
