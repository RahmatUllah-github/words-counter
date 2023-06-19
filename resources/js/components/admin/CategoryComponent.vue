<template>
    <div class="container py-5">
        <div class="mb-3">
            <button class="btn btn-primary" @click="showAddCategoryFrom = !showAddCategoryFrom">
                Add Category
            </button>
        </div>
        <form v-if="showAddCategoryFrom" @submit.prevent="addCategory" method="POST" class="w-50 mb-3">
            <div class="input-group mb-3">
                <input type="text" v-model="name" class="form-control" placeholder="Category Name" required>
                <button class="btn btn-primary" type="submit" id="button-addon2" :disabled="disableAddButton">Add <span
                        v-show="disableAddButton">...</span></button>
            </div>
        </form>
        <form v-if="showEditCategoryFrom" @submit.prevent="updateCategory" method="POST" class="w-50 mb-3">
            <div class="input-group mb-3">
                <input type="text" v-model="name" class="form-control" placeholder="Category Name" required>
                <button class="btn btn-primary" type="submit" id="button-addon2" :disabled="disableEditButton">Update <span
                        v-show="disableEditButton">...</span></button>
            </div>
        </form>
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table table-bordered user_datatable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';

export default {
    data() {
        return {
            showAddCategoryFrom: false,
            showEditCategoryFrom: false,
            disableAddButton: false,
            disableEditButton: false,
            name: '',
            id: '',
        }
    },
    mounted() {
        this.loadDataTable();
    },

    methods: {
        loadDataTable() {
            if ($.fn.DataTable.isDataTable('.user_datatable')) {
                $('.user_datatable').DataTable().destroy();
            }

            const self = this; // Store reference to Vue component

            $('.user_datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/admin/categories',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function (data, type, row, meta) {
                            return `
                                <button type="button" class="btn btn-sm btn-primary edit-button" data-id="${row.id}" data-name="${row.name}">Edit</button>
                                <button class="btn btn-sm btn-danger delete-button" data-id="${row.id}">Delete</button>
                            `;
                        }
                    },
                ],
                drawCallback: function () {
                    // Attach click event to edit buttons after the table is drawn
                    $('.edit-button').on('click', function () {
                        const id = $(this).data('id');
                        const name = $(this).data('name');
                        self.editCategoryForm(id, name);
                    });

                    // Attach click event to delete buttons after the table is drawn
                    $('.delete-button').on('click', function () {
                        const id = $(this).data('id');
                        self.confirmDelete(id);
                    });
                }
            });
        },

        addCategory() {
            this.disableAddButton = true;

            if (this.name != "") {
                var formData = new FormData();
                formData.append('name', this.name);

                this.$axios
                    .post('/admin/categories', formData)
                    .then(response => {
                        this.loadDataTable();
                        this.disableAddButton = false;
                        toast.success(response.data.message);
                    })
                    .catch(error => {
                        toast.error(error.response.data.message);
                        this.disableAddButton = false;
                    });
            } else {
                toast.error('Please fill the category name field.');
                this.disableAddButton = false;
            }
        },

        editCategoryForm(id, name) {
            this.id = id;
            this.name = name;
            this.showEditCategoryFrom = true;
        },

        updateCategory() {
            this.disableEditButton = true;

            if (this.id != '' && this.name != '') {
                var formData = new FormData();
                formData.append('id', this.id);
                formData.append('name', this.name);

                this.$axios
                    .post('/admin/categories/update', formData)
                    .then(response => {
                        this.loadDataTable();
                        this.disableEditButton = false;
                        toast.success(response.data.message);
                    })
                    .catch(error => {
                        toast.error(error.response.data.message);
                        this.disableEditButton = false;
                    });
            } else {
                toast.error('Please fill the category name field.');
                this.disableEditButton = false;
            }
        },

        confirmDelete(id) {
            if (confirm('Are you sure you want to delete? This action is not reversible.')) {
                axios.delete('/admin/categories/' + id)
                    .then(response => {
                        toast.success(response.data.message);
                        this.loadDataTable();
                    })
                    .catch(error => {
                        toast.error(error.response.data.message);
                    });
            }
        }
    },
}
</script>
