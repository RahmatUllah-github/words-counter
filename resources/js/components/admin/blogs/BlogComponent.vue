<template>
    <div class="container py-5">
        <div class="mb-3">
            <a class="btn btn-primary" href="/admin/blogs/create">
                Add Blog
            </a>
        </div>
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table table-bordered user_datatable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Title</th>
                            <!-- <th>Description</th> -->
                            <th>Category</th>
                            <th>Last Updated</th>
                            <th>Published On</th>
                            <th>Created On</th>
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
import moment from 'moment';

export default {
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
                ajax: '/admin/blogs',
                columns: [
                    { data: 'id', name: 'id' },
                    {
                        data: 'image',
                        name: 'image',
                        render: function (data, type, row, meta) {
                            return '<img width="50" src="/' + data + '" alt="Image" />';
                        }
                    },
                    {
                        data: 'title',
                        name: 'title',
                        render: function (data, type, row, meta) {
                            if (type === 'display' && data.length > 45) {
                                return data.substr(0, 40) + '...';
                            }
                            return data;
                        }
                    },
                    // {
                    //     data: 'description',
                    //     name: 'description',
                    //     render: function (data, type, row, meta) {
                    //         if (type === 'display' && data.length > 100) {
                    //             return '<div>' + $('<div>').html(data.substr(0, 100) + '...').text() + '</div>';
                    //         }
                    //         return '<div>' + $('<div>').html(data).text() + '</div>';
                    //     }
                    // },
                    { data: 'category.name', name: 'category' },
                    {
                        data: null,
                        name: 'last_updated',
                        render: function (data, type, row, meta) {
                            var formattedDate = moment(row.updated_at).format('DD-MMM-YYYY HH:mm:ss');
                            return '<span class="badge bg-secondary">'+formattedDate+'</span>' + ' by ' + '<span class="badge bg-info">'+row.user.name+'</span>';
                        }
                    },
                    {
                        data: 'published_at',
                        name: 'published_at',
                        render: function (data, type, row, meta) {
                            return row.published_at
                                ? '<span class="badge bg-success">'+moment(row.published_at).format('DD-MMM-YYYY HH:mm:ss')+'</span>'
                                : '<span class="badge bg-danger">Not Published</span>';
                        }
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        render: function (data, type, row, meta) {
                            return '<span class="badge bg-secondary">'+moment(row.created_at).format('DD-MMM-YYYY HH:mm:ss')+'</span>';
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function (data, type, row, meta) {
                            return `
                                <a target="_blank" href="/blog/${row.slug}" class="btn btn-sm btn-secondary m-1">View</a>
                                <a href="/admin/blogs/${row.id}" class="btn btn-sm btn-primary m-1">Edit</a>
                                <button class="btn btn-sm btn-danger delete-button m-1" data-id="${row.id}">Delete</button>
                            `;
                        }
                    },
                ],
                drawCallback: function () {
                    // Attach click event to delete buttons after the table is drawn
                    $('.delete-button').on('click', function () {
                        const id = $(this).data('id');
                        self.confirmDelete(id);
                    });
                }
            });
        },

        confirmDelete(id) {
            if (confirm('Are you sure you want to delete? This action is not reversible.')) {
                axios.delete('/admin/blogs/' + id)
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

<style>
.table-bordered.dataTable tbody th,
.table-bordered.dataTable tbody td {
    border-bottom-width: 1px !important;
}
</style>
