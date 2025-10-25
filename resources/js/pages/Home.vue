<script setup lang="ts">
    import { defineProps } from 'vue';
    import { show } from '@/actions/App/Http/Controllers/HomeController';
    import { Link, useForm } from '@inertiajs/vue3';
    import Heading from '@/components/custom/Heading.vue';
    import LinkButton from '@/components/custom/LinkButton.vue';
    import { Plus, Trash2 } from 'lucide-vue-next';

    const props = defineProps<{
        names: Array<{id: number, fullname: string}>;
    }>();

    const form = useForm({
        fullname: props.names[0].fullname
    });

    function destroy(id: number, fullname: string){
        if(confirm(`Are you sure you want to delete ? ${fullname}`)){
            form.delete(`names/${id}`);
        }
    }

</script>

<template>
    <main>
        <div class="h-8 w-full bg-blue-800"></div>

        <Heading title="Name List">
            <LinkButton path="/new-name" classLink="bg-blue-500">
                <Plus />
                <span>New Name</span>
            </LinkButton>
        </Heading>

        <article class="w-[50%] mx-auto">
            <section>
                <aside>
                    <div 
                        class="flex justify-between border-b-2 pt-2" 
                        v-for="name in names" :key="name.id"
                        >
                       <Link :href="show({id: name.id})" 
                        class="hover:text-blue-600 cursor-pointer text-slate-900 font-tangerine font-bold text-2xl">
                            {{ name.fullname }}
                       </Link>

                        <div>
                            <button @click="destroy(name.id, name.fullname)" class="flex items-center gap-x-[1px] bg-red-600 text-white text-[14px] font-sans  px-1 py-[1px] rounded-[5px] hover:bg-red-800">
                                <Trash2 class="size-4"/>
                                <span>delete</span>
                            </button>
                        </div>
                    </div>

                </aside>
            </section>
        </article>
    </main>
</template>