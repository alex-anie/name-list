<script setup lang="ts">

    import { usePage } from '@inertiajs/vue3';

    defineProps<{
        title: string,
    }>();

    const page = usePage();
    const user = page.props.auth.user;

</script>

<template>
    <article class="w-[50%] mx-auto my-10 border-b-[1px] border-b-slate-400 flex justify-between">
            <h1 class="text-slate-900 font-tangerine text-5xl">{{ title }}</h1>
            <div>
                <slot></slot>
            </div>
    </article>

<article class="w-[50%] mx-auto">
    <p v-if="user" class="text-blue-700 font-semibold">
       Hi there,  {{ user.name }}
    </p>

    <p v-else class="text-slate-400">Hi Guest</p>
</article>

</template>