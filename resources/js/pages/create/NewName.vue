<script setup lang="ts">
    import Heading from '@/components/custom/Heading.vue';
    import LinkButton from '@/components/custom/LinkButton.vue';
    import { useForm } from '@inertiajs/vue3';
    import { ChevronLeft } from 'lucide-vue-next';


    const form = useForm({
        'fullname' : ''
    });

    function submit(){
        form.post('/names');
    }

</script>

<template>
    <main>

        <article>
            <Heading title="New Name">
                <LinkButton path="/" classLink="bg-slate-500">
                    <ChevronLeft />
                    <span>Back</span>
                </LinkButton>
            </Heading>
        </article>

        <article class="w-[50%] mx-auto mt-12">
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
                    <button class="bg-blue-500 text-white px-3 py-1 rounded-lg mt-2 hover:bg-blue-700" type="submit">Submit</button>
                </div>
            </form>
        </article>
    </main>
</template>