<script setup lang="ts">
    import { defineProps } from 'vue';
    import { show } from '@/actions/App/Http/Controllers/HomeController';
    import { Link, useForm } from '@inertiajs/vue3';
    import Heading from '@/components/custom/Heading.vue';
    import LinkButton from '@/components/custom/LinkButton.vue';
    import { Plus, Trash2, Search, Send } from 'lucide-vue-next';

    const props = defineProps<{
        names: {
            data: Array<{id: number; fullname: string}>
            links: Array<{url: string | null; label: string; active: boolean}>
        }
    }>();

    const form = useForm({
        fullname: props.names.data.fullname
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

        <article class="w-[50%] mx-auto my-8">
            <form action="" class="w-full flex items-center border-[1px] border-slate-300 rounded-lg py-2 px-4">
                <label for="" class="sr-only">Search</label>
                <Search class="text-slate-400" />
                <input type="search" placeholder="search names ..." class="w-full px-2 py-2 border-0 outline-0">
                <button class="text-blue-600 transition-colors duration-500 ease-in hover:text-blue-400 cursor-pointer">
                    <Send />
                </button>
            </form>
        </article>

        <article class="w-[50%] mx-auto">
            <section>
                <aside>
                    <div 
                        class="flex justify-between border-b-2 pt-2" 
                        v-for="name in props.names.data" :key="name.id"
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

                    <div class="flex justify-center mt-6 space-x-2">
                        <Link 
                            v-for="link in props.names.links"
                            :key="link.label"
                            :link="link.label"
                            :href="link.url ?? ''"
                            v-html="link.label"
                            class="px-3 py-1 rounded border"
                            :class="{
                                'bg-blue-600 text-white' : link.active,
                                'text-gray-500 cursor-not-allowed' : !link.url
                            }"
                            :disabled="!link.url"
                            preserveScroll
                        />
                            
                        
                    </div>

                </aside>
            </section>
        </article>
    </main>
</template>