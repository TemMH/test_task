<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';

</script>

<template>

    <Head title="Благодарности пользователя" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Благодарности пользователя {{ user.second_name
                }} {{ user.first_name }} {{ user.middle_name }}</h2>
        </template>

        <div v-if="appreciations_user">
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4" v-for="appreciation_user in appreciations_user">

                    <Link :href="route('appreciation.show', appreciation_user.id)">

                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">

                            <div style="display: flex; justify-content: space-between;">
                                <div>{{ appreciation_user.appreciation_type.name }}
                                    Пользователем: {{ appreciation_user.sender.second_name }} {{ appreciation_user.sender.first_name }} </div>

                                <div>{{ appreciation_user.date }}</div>

                            </div>


                        </div>
                    </div>

                    </Link>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>

<script>
export default {
    name: "IndexUser",
    props: [
        'user', 'appreciations_user', 'appreciation_types'
    ],
}
</script>
