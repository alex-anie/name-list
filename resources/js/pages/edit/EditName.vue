<script setup lang="ts">
import { ChevronLeft, ArrowRight } from 'lucide-vue-next';
import Heading from '@/components/custom/Heading.vue';
import LinkButton from '@/components/custom/LinkButton.vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps<{
    name: {
        id: number,
        fullname: string,
        createdAt: string
    }
}>();

const form = useForm({
    fullname: props.name.fullname,
})

function submit(){
    form.put(`/names/${props.name.id}`);
}


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
                    
                    <form @submit.prevent="submit">
                        <div>
                            <label for="fullname" class="block mb-1">Full Name <span class="text-red-600">*</span></label>
                            <input
                                v-model="form.fullname"
                                type="text" 
                                name="fullname" 
                                placeholder="insert your full name" 
                                id="fullname"
                                class="w-full py-2 border-2 border-blue-600 rounded-2xl px-4"
                                >
                                <div class="text-red-600 text-[14px]">{{ form.errors.fullname }}</div>
                        </div>
                        <div>
                            <button class="flex items-center bg-blue-500 text-white px-3 py-1 rounded-lg mt-2 hover:bg-blue-700" type="submit">
                                <span>Update</span>
                                <ArrowRight class="size-5" />
                            </button>
                        </div>
                    </form>
                </div>
            </aside>
        </article>
    </main>
</template>