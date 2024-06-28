<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import axios from 'axios';
</script>

<template>
    <Head title="Пользователь" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Пользователь</h2>
        </template>
        <div v-if="user">
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <div>{{ user.second_name }} {{ user.first_name }} {{ user.middle_name }}</div>
                            <div>Контакты: {{ user.phone_number }} {{ user.email }}</div>
                        </div>
                        <div v-if="appreciation_types">
                            <div>Выберите благодарность для отправки</div>
                            <div class="flex flex-wrap">
                                <div class="flex justify-center w-1/5 p-2" v-for="appreciation_type in appreciation_types" :key="appreciation_type.id">
                                    <button @click="submitForm(auth.user.id, user.id, appreciation_type.id)" :disabled="isSubmitted || hasSentAppreciation" class="bg-blue-500 rounded-full h-32 w-32">
                                        <div style="background-color: blue; border-radius: 100%;"
                                            class="box-border h-32 w-32 p-4 border-4" :title="appreciation_type.name">
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
export default {
    name: "Show",
    props: [
        'user',
        'appreciation_types',
        'auth',
        'hasSentAppreciation',
    ],
    data() {
        return {
            formData: {
                sender_id: '',
                recipient_id: '',
                appreciation_type_id: '',
            },
            isSubmitted: false 
        }
    },
    methods: {
        async submitForm(sender_id, recipient_id, appreciation_type_id) {
            this.formData.sender_id = sender_id;
            this.formData.recipient_id = recipient_id;
            this.formData.appreciation_type_id = appreciation_type_id;

            try {
                const response = await axios.post('/appreciation', this.formData);
                console.log(response.data);
                this.isSubmitted = true;
            } catch (error) {
                console.error(error);
            }
        }
    }
}
</script>
