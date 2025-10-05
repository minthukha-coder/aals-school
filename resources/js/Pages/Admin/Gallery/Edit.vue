<template>
    <Layout>
        <div class="container mt-4">
            <h5 class="text-center mb-4">Edit Image</h5>

            <form @submit.prevent="submit" class="p-4 border rounded shadow-sm bg-white">
                <!-- Current image -->
                <div class="mb-3 text-center">
                    <p class="fw-bold">Current Image</p>
                    <img
                        :src="gallery.path"
                        alt="Current"
                        class="rounded"
                        style="max-height: 250px;"
                    />
                </div>

                <!-- New image upload -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Change Image</label>
                    <input
                        type="file"
                        class="form-control"
                        @change="handleImageUpload"
                        accept="image/*"
                    />
                    <div v-if="form.errors.image" class="text-danger small mt-1">
                        {{ form.errors.image }}
                    </div>
                </div>

                <!-- Preview new image -->
                <div v-if="preview" class="text-center my-3">
                    <p class="fw-bold">New Preview</p>
                    <img :src="preview" alt="Preview" class="rounded" style="max-height: 250px;" />
                </div>

                <div class="d-flex justify-content-end gap-3">
                    <Link :href="route('admin.gallery.index')" class="btn btn-secondary">
                        Cancel
                    </Link>
                    <button type="submit" class="btn btn-primary">
                        <font-awesome-icon icon="fa-solid fa-save" /> Update
                    </button>
                </div>
            </form>
        </div>
    </Layout>
</template>

<script setup>
import Layout from '../Layouts/Layout.vue';
import { Link, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({
    gallery: Object,
});

const form = useForm({
    image: null,
});

const preview = ref(null);

const handleImageUpload = (event) => {
    const file = event.target.files[0];
    if (file) {
        form.image = file;
        preview.value = URL.createObjectURL(file);
    }
};

const submit = () => {
    form.post(route('admin.gallery.update', { id: props.gallery.id }), {
        forceFormData: true,
    });
};
</script>

<style scoped></style>
