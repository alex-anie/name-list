<script setup lang="ts">
    import { Link } from '@inertiajs/vue3';
    
    defineProps<{
        path: string,
        classLink: string
    }>();
</script>

<template>
    <Link :href="path" class="flex hover:bg-slate-950 transition-colors duration-300 ease-in-out text-white  py-2 pr-4 rounded-[5px]" :class="classLink">
        <slot></slot>
    </Link>
</template>
