<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';

</script>

<template>

    <Head title="Пользователи" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Пользователи</h2>
        </template>

        <div v-if="users">
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4" v-for="user in users">

<Link :href="route('user.show', user.id)">  
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">

                            <div style="display: flex; justify-content: space-between;"><div>{{ user.second_name }} {{ user.first_name }}  {{ user.middle_name }}</div>  <div>{{ user.date }}</div> </div>


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

    name: "Index",

    props: [
        'users'
    ],
}
</script>