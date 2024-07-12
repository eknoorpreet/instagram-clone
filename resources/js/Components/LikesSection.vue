<script setup>
import { computed, toRefs } from "vue";
import { usePage } from "@inertiajs/vue3";

import Heart from "vue-material-design-icons/Heart.vue";
import HeartOutline from "vue-material-design-icons/HeartOutline.vue";
import CommentOutline from "vue-material-design-icons/CommentOutline.vue";
import SendOutline from "vue-material-design-icons/SendOutline.vue";
import BookmarkOutline from "vue-material-design-icons/BookmarkOutline.vue";

const props = defineProps(["post"]);

const { post } = toRefs(props);

const emit = defineEmits(["like"]);
</script>

<template>
    <div class="flex z-20 items-center justify-between">
        <div class="flex items-center">
            <button @click="$emit('like', { post, user })" class="-mt-[14px]">
                PLACEHOLDER
            </button>
            <CommentOutline class="pl-3 pt-[10px]" :size="30" />
            <SendOutline class="pl-3 pt-[10px]" :size="30" />
        </div>

        <BookmarkOutline class="pl-3 pt-[10px]" :size="30" />
    </div>
</template>
