<script setup lang="ts">
import { ChevronLeft, PenLine } from 'lucide-vue-next';
import Heading from '@/components/custom/Heading.vue';
import LinkButton from '@/components/custom/LinkButton.vue';



defineProps<{
    name: {
        id: number,
        fullname: string,
        createdAt: string
    }
}>();

</script>
<template>
    <main>
        <article>
            <Heading title="Name">
                <LinkButton path="/" classLink="bg-slate-500">
                    <ChevronLeft />
                    <span>Back</span>
                </LinkButton>
            </Heading>
        </article>

        <article class="w-[50%] mx-auto">
            <aside>
                <div class="size-15 rounded-full bg-blue-700 flex items-center justify-center">
                    <span class="text-2xl text-white font-bold font-bodoni">{{ name.fullname.slice(0, 1) }}</span>
                </div>
                <div class="mt-4 space-y-2">
                    <p><span class="text-slate-500 uppercase font-mono">personal ID:</span> <span class="p-1 text-white bg-black rounded-full"> {{ name.id }}</span></p>
                    <p class="text-2xl text-slate-900">{{ name.fullname }}</p>
                </div>

                <div class="mt-12">
                    <!-- <Link :href="`/names/${show({id: name.id})}/edit`">Edit Name</Link> -->

                    <LinkButton :path="`/names/${name.id}/edit`" classLink="bg-blue-600 w-fit px-2">
                        <PenLine class="mr-2" />
                        <span>Edit Name</span>
                    </LinkButton>
                </div>
            </aside>
        </article>
    </main>
</template>