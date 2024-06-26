<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
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

                            <div> {{ user.id }} {{ user.second_name }} {{ user.first_name }} {{ user.middle_name }}
                            </div>


                        </div>
                        <div v-if="appreciation_types">

                            <div>Выберите благодарность для отправки</div>

                            <div v-for="appreciation_type in appreciation_types">
                                <div> {{ appreciation_type.name }} </div>
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
        'appreciation_types'
    ],
}
</script>