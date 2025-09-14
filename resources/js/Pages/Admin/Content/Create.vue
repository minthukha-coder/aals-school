<template>
    <Layout>
        <h4 class="text-center">Create Content</h4>
        <div class="row mt-3">
            <div class="col-sm-12 col-md-6 col-lg-6 flex flex-col justify-center mx-auto">
                <v-row>
                    <v-textarea v-model="form.title" rows="1" label="Title" variant="outlined"
                        :error="!!$page.props.errors.title" :error-messages="$page.props.errors.title" />
                </v-row>

                <v-row class="mt-3 mb-2">
                    <v-textarea v-model="form.body" rows="1" label="Body" variant="outlined"
                        :error="!!$page.props.errors.body" :error-messages="$page.props.errors.body"></v-textarea>
                </v-row>

                <button @click="submit" class="btn btn-success my-2">Submit</button>
            </div>
        </div>
    </Layout>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';
import Layout from '../Layouts/Layout.vue';
import { post } from '../../Composables/httpMethod';

const form = useForm({
    title: '',
    body: ''
});

const submit = () => {
    post(form, route("admin.contents.store"));
}


</script>

<style lang="scss" scoped></style>