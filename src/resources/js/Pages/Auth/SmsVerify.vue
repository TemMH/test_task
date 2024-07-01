<template>
    <GuestLayout>
        <Head title="Verify SMS" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div class="mt-4">
                <InputLabel for="sms_code" value="SMS-код" />

                <TextInput
                    id="sms_code"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.sms_code"
                    required
                />

                <InputError class="mt-2" :message="form.errors.sms_code" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Проверить
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, useForm } from '@inertiajs/vue3';

const form = useForm({
    sms_code: '',
});

const submit = () => {
    form.post(route('auth.sms.verify'), {
        onFinish: () => form.reset('sms_code'),
    });
};
</script>
