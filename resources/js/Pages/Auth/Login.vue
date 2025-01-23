<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>
<template>
    <GuestLayout>
        <Head title="Log in" />

        <div v-if="status" class="mb-4 text-sm font-medium text-green-400">
            {{ status }}
        </div>

        <form @submit.prevent="submit" class="bg-zinc-900 p-8 rounded-lg">
            <div class="space-y-5">
                <div>
                    <label for="email" class="block text-gray-400 font-medium mb-2">Email</label>
                    <input 
                        id="email"
                        type="email"
                        class="w-full px-4 py-3 bg-zinc-800 text-white border-zinc-700 
                               focus:ring-2 focus:ring-blue-600 focus:border-transparent 
                               transition duration-300"
                        v-model="form.email"
                        required
                        autofocus
                        autocomplete="username"
                    />
                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <div>
                    <label for="password" class="block text-gray-400 font-medium mb-2">Password</label>
                    <input 
                        id="password"
                        type="password"
                        class="w-full px-4 py-3 bg-zinc-800 text-white border-zinc-700 
                               focus:ring-2 focus:ring-blue-600 focus:border-transparent 
                               transition duration-300" 
                        v-model="form.password"
                        required
                        autocomplete="current-password"
                    />
                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <div class="flex items-center">
                    <Checkbox 
                        name="remember" 
                        v-model:checked="form.remember" 
                        class="text-gray-400 bg-zinc-700 border-zinc-600"
                    />
                    <label for="remember" class="text-gray-400 ms-2 text-sm">Remember me</label>
                </div>

                <div class="flex items-center justify-between">
                    <Link
                        v-if="canResetPassword"
                        :href="route('password.request')"
                        class="text-gray-400 text-sm hover:text-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-600"
                    >
                        Forgot your password?
                    </Link>
                    <PrimaryButton
                        class="bg-blue-600 hover:bg-blue-700 text-white 
                               transition duration-300 focus:ring-2 focus:ring-blue-600"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Log in
                    </PrimaryButton>
                </div>
            </div>
        </form>
    </GuestLayout>
</template>