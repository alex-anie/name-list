<script setup lang="ts">

    defineProps<{
        title: string,
    }>();

</script>

<template>
    <article class="w-[50%] mx-auto my-10 border-b-[1px] border-b-slate-400 flex justify-between">
            <h1 class="text-slate-900 font-tangerine text-5xl">{{ title }}</h1>
            <div>
                <slot></slot>
            </div>
        </article>
</template>