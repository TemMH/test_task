<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import axios from 'axios';
import { Link } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import DangerButton from '@/Components/DangerButton.vue';


</script>

<template>

    <Head title="Благодарность .. от пользователя .." />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">

                Благодарность {{ appreciation.data.appreciation_type.name }}
                от пользователя {{ appreciation.data.sender.second_name }} {{
                    appreciation.data.sender.first_name }} </h2>
        </template>
        <div v-if="appreciation">

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">


                        <div class="p-6 text-gray-900">

                            <div style="display: flex; justify-content: space-between;">

                                <div>
                                    Напишите комментарий к благодарности
                                </div>

                            </div>

                            <div class="mt-6 space-y-6">

                                <InputLabel for="comment_text" value="Введите комментарий" />


                                <TextInput id="comment_text" type="text" class="mt-1 block w-full"
                                    v-model="formData.comment_text" autofocus autocomplete="comment_text" />





                                <PrimaryButton class="ms-4"
                                    @click="submitForm(appreciation.data.id, auth.user.id, formData.comment_text)">
                                    Отправить
                                </PrimaryButton>

                            </div>



                        </div>




                    </div>
                </div>


            </div>

            <div>Комментарии</div>
            <div v-if="comments && comments.length">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4" v-for="comment in comments" :key="comment.id">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <div style="display: flex; justify-content: space-between;">
                                <div>{{ comment.sender.second_name }} {{ comment.sender.first_name }}</div>
                                <div>{{ comment.comment_text }}</div>
                                <div>{{ comment.date }}</div>
                            </div>
                            <div style="display: flex; float: right;">
                                <PrimaryButton @click="assessmentComment(comment.id, auth.user.id, true)" class="ms-4">Like</PrimaryButton>
                                <DangerButton @click="assessmentComment(comment.id, auth.user.id, false)" class="ms-4">Dislike</DangerButton>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-else class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">Комментариев нет</div>
            </div>


        </div>
    </AuthenticatedLayout>
</template>

<script>
export default {
    name: "ShowAppreciation",

    props: [
        'comments', 'appreciation', 'auth'
    ],

    data() {
        return {
            formData: {
                appreciation_id: '',
                sender_id: '',
                comment_text: '',
            },
            assessmentData: {

                comment_id: '',
                sender_id: '',
                status: '',

            },
        }
    },

    methods: {
        async submitForm(appreciation_id, sender_id, comment_text) {
        this.formData.appreciation_id = appreciation_id;
        this.formData.sender_id = sender_id;
        this.formData.comment_text = comment_text;

        try {
            const response = await axios.post('/comment', this.formData);
            console.log(response.data);
            
            if (response.data.success) {
                this.comments.push(response.data.comment);
            } else {
                console.error(response.data.message);
            }

        } catch (error) {
            console.error(error);
        }
    },

    async assessmentComment(comment_id, sender_id, status) {
        try {
            const response = await axios.post('/comment/assessment', {
                comment_id: comment_id,
                sender_id: sender_id,
                status: status ? 1 : 0
            });
            
            console.log(response.data);
            
            const updatedComment = response.data.comment;
            const index = this.comments.findIndex(c => c.id === updatedComment.id);
            if (index !== -1) {
                this.$set(this.comments, index, updatedComment);
            }
            
        } catch (error) {
                   
        }
    },

    }

}
</script>
