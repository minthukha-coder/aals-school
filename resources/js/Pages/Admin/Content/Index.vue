    <template>
        <Layout>
            <h5 class="text-center">Content Page</h5>
            <div class="">
                <Link :href="route('admin.contents.create')"><button
                    class="btn btn-success float-end mb-2"><font-awesome-icon icon="fa-solid fa-circle-plus" />
                    Create</button></Link>

                <v-table class="table table-bordered mt-3 overflow-x-auto">
                    <thead>
                        <tr class="text-lg">
                            <th>Title</th>
                            <th>Body</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="content in contents" :key="content.id">
                            <td>{{ content.title }}</td>
                            <td>{{ content.body }}</td>
                            <td>
                                <div class="d-flex justify-content-end gap-2">
                                    <Link :href="route('admin.contents.edit', { id: content.id })"
                                        class="text-decoration-none">
                                    <button type="button"
                                        class="btn btn-sm btn-outline-primary d-flex align-items-center gap-1">
                                        <font-awesome-icon icon="fa-solid fa-pen-to-square" />
                                        Edit
                                    </button>
                                    </Link>

                                    <form @submit.prevent="deleteContent(content.id)">
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
                </v-table>

            </div>
        </Layout>
    </template>

<script setup>
import Layout from '../Layouts/Layout.vue';
import { del } from '../../Composables/httpMethod';

const props = defineProps({
    contents: Array
})

const deleteContent = (id) => {
    del(route('admin.contents.destroy', { id: id }))
}

</script>

<style lang="scss" scoped></style>