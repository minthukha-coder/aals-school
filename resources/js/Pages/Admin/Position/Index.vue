<template>
    <div>
        <Layout>
            <h5 class="text-center">Position Page</h5>
            <div class="">
                <Link :href="route('admin.positions.create')"><button
                    class="btn btn-success float-end"><font-awesome-icon icon="fa-solid fa-circle-plus" />
                    Create</button></Link>

                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Salary</th>
                            <th>Date</th>
                            <th>Place</th>
                            <th>Responsibilities</th>
                            <th>Requirements</th>
                            <th>Highlight</th>
                            <th>Benefits</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="position in positions" :key="position.id">
                            <td>{{ position.name }}</td>
                            <td>{{ position.salary }}</td>
                            <td>{{ position.date }}</td>
                            <td>{{ position.place }}</td>
                            <td>{{ position.responsibilities }}</td>
                            <td>{{ position.requirements }}</td>
                            <td>{{ position.highlight }}</td>
                            <td>{{ position.benefits }}</td>
                            <td>
                                <div class="flex justify-content-end gap-2">
                                    <Link :href="route('admin.positions.edit', { id: position.id })"
                                        class="text-decoration-none">
                                    <button type="button"
                                        class="btn btn-sm btn-outline-primary d-flex align-items-center gap-1">
                                        <font-awesome-icon icon="fa-solid fa-pen-to-square" />
                                        Edit
                                    </button>
                                    </Link>

                                    <form @submit.prevent="deletePosition(position.id)">
                                        <button type="submit"
                                            class="btn btn-sm btn-outline-danger d-flex align-items-center gap-1">
                                            <font-awesome-icon icon="fa-solid fa-trash" />
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </tbody>

                </table>
            </div>
        </Layout>
    </div>
</template>

<script setup>
import { del } from '../../Composables/httpMethod';
import Layout from '../Layouts/Layout.vue';

const props = defineProps({
    positions: Array,
});

const deletePosition = (id) => {
    del(route('admin.positions.destroy', { id: id }));
}
</script>

<style lang="scss" scoped></style>
