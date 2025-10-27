<script setup lang="ts">
import { useForm, Link } from '@inertiajs/vue3';

const form = useForm({
    email: '',
    password: ''
})

const submit = () => {
    form.post('/login');
}
</script>

<template>
    <main class="h-screen flex items-center justify-center bg-slate-100">
        <article class="bg-white w-[420px] p-8 rounded-xl shadow-lg border border-slate-200">
            <h2 class="text-3xl font-bold text-blue-700 mb-6">Welcome Back</h2>

            <form @submit.prevent="submit" class="space-y-4">

                <div>
                    <label class="text-slate-700">Email</label>
                    <input
                        v-model="form.email"
                        type="email"
                        class="w-full border-2 border-slate-300 rounded-lg px-3 py-2 focus:border-blue-600 outline-none"
                    />
                    <p class="text-red-600 text-sm">{{ form.errors.email }}</p>
                </div>

                <div>
                    <label class="text-slate-700">Password</label>
                    <input
                        v-model="form.password"
                        type="password"
                        class="w-full border-2 border-slate-300 rounded-lg px-3 py-2 focus:border-blue-600 outline-none"
                    />
                    <p class="text-red-600 text-sm">{{ form.errors.password }}</p>
                </div>

                <button
                    type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 transition text-white py-2 rounded-lg"
                >
                    Log In
                </button>

                <p class="text-sm text-center text-slate-600 mt-3">
                    Don’t have an account? <Link href="/register" class="text-blue-600">Register</Link>
                </p>
            </form>
        </article>
    </main>
</template>
