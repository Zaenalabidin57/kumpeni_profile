@extends('admin.layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Data Role</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Data Role</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="javascript:void(0)" class="btn btn-sm btn-primary mb-3 btnAdd"><i
                                    class="fas fa-plus"></i> Tambah Data</a>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="dTable">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" method="post" id="myForm">
                    <div class="modal-body">
                        @csrf
                        <input type="number" id="id" name="id" hidden>
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" name="name" id="name">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalPermission" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-primary btnAddPermission mb-2"><i class="fas fa-plus"></i>
                                Tambah</button>
                            <ul class="list-group list-permissions">

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAddPermission" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" id="formModalAddPermssion" method="post">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="permission_name">Nama Hak Akses <span>(Bisa memilih lebih dari 1)</span></label>
                            <select name="permission_name[]" id="permission_name" class="form-control" multiple>

                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/sweetalert2/sweetalert2.all.min.js') }}">
    <link rel="stylesheet" href="{{ asset('assets/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugin/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugin/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <style>
        .closeDelete:hover {
            cursor: pointer;
        }
    </style>
@endpush
@push('scripts')
    <script src="{{ asset('assets/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/plugin/select2/js/select2.min.js') }}"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        $(function() {
            window.roleId = "";
            let otable = $('#dTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('admin.roles.data') }}',
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
            $('.btnAdd').on('click', function() {
                $('#myModal .modal-title').text('Tambah Data');
                $('#myModal').modal('show');
            })
            $('#myModal #myForm').on('submit', function(e) {
                e.preventDefault();
                let form = $('#myModal #myForm');
                $.ajax({
                    url: '{{ route('admin.roles.store') }}',
                    type: 'POST',
                    dataType: 'JSON',
                    data: form.serialize(),
                    success: function(response) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            text: response.message,
                            showConfirmButton: true,
                            timer: 1500
                        })
                        otable.ajax.reload();
                        $('#myModal').modal('hide');
                    },
                    error: function(response) {
                        let errors = response.responseJSON?.errors
                        $(form).find('.text-danger.text-small').remove()
                        if (errors) {
                            for (const [key, value] of Object.entries(errors)) {
                                $(`[name='${key}']`).parent().append(
                                    `<sp class="text-danger text-small">${value}</sp>`)
                                $(`[name='${key}']`).addClass('is-invalid')
                            }
                        }
                    }
                })
            })

            $('body').on('click', '.btnEdit', function() {
                let id = $(this).data('id');
                let name = $(this).data('name');
                $('#myForm #id').val(id);
                $('#myForm #name').val(name);
                $('#myModal .modal-title').text('Edit Data');
                $('#myModal').modal('show');
            })
            $('body').on('click', '.btnDelete', function(e) {
                e.preventDefault();
                let id = $(this).data('id');
                let name = $(this).data('name');
                Swal.fire({
                    title: 'Apakah Yakin?',
                    text: `${name} akan dihapus dan tidak bisa dikembalikan!`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yakin'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ url('admin/roles/') }}' + '/' + id,
                            type: 'DELETE',
                            dataType: 'JSON',
                            success: function(response) {
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    text: response.message,
                                    showConfirmButton: true,
                                    timer: 1500
                                })
                                otable.ajax.reload();
                                $('#myModal').modal('hide');

                            },
                            error: function(response) {
                                Swal.fire({
                                    position: 'center',
                                    icon: 'error',
                                    text: response.responseJSON.errors.name,
                                    showConfirmButton: true,
                                    timer: 1500
                                })
                            }
                        })
                    }
                })
            })

            $('body').on('click', '.btnPermission', function() {
                roleId = $(this).data('id');
                roleName = $(this).data('name');
                // get permission
                $.ajax({
                    url: '{{ route('admin.permissions.getByRole') }}',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        id: roleId
                    },
                    success: function(response) {
                        response.forEach(res => {
                            $('#modalPermission .list-permissions').append(
                                `<li class="list-group-item d-flex justify-content-between"><span>${res.name}</span><span class="closeDelete" data-id="${res.id}" data-name="${res.name}">&times;</span></li>`
                            )
                        });
                    }
                })
                $('#modalPermission .modal-title').text(`Hak Akses ${roleName}`);
                $('#modalPermission').modal('show');
            })

            // add modal permission on click
            $('.btnAddPermission').on('click', function() {
                // get permission
                $.ajax({
                    url: '{{ route('admin.permissions.get') }}',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        id: roleId
                    },
                    success: function(response) {
                        $('#modalAddPermission #permission_name').empty();
                        response.forEach(res => {
                            $('#modalAddPermission #permission_name').append(
                                `<option value="${res.name}">${res.name}</option>`);
                        });
                    }
                })
                $('#modalAddPermission #permission_name').select2({
                    theme: 'bootstrap4'
                });
                $('#modalAddPermission .modal-title').text(`Tambah Hak Akses`);
                $('#modalAddPermission').modal('show');
            })

            // add modal permission on submit
            $('#modalAddPermission #formModalAddPermssion').on('submit', function(e) {
                e.preventDefault();
                let name = $('#formModalAddPermssion #permission_name').val();
                $.ajax({
                    url: '{{ route('admin.roles.add-permission') }}',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        id: roleId,
                        name
                    },
                    success: function(response) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            text: response.message,
                            showConfirmButton: true,
                            timer: 1500
                        })
                        $('#modalAddPermission').modal('hide');
                        $.ajax({
                            url: '{{ route('admin.permissions.getByRole') }}',
                            type: 'POST',
                            dataType: 'JSON',
                            data: {
                                id: roleId
                            },
                            success: function(response) {
                                $('#modalPermission .list-permissions').empty();
                                response.forEach(res => {
                                    $('#modalPermission .list-permissions')
                                        .append(
                                            `<li class="list-group-item d-flex justify-content-between"><span>${res.name}</span><span class="closeDelete" data-id="${res.id}" data-name="${res.name}">&times;</span></li>`
                                        )
                                });
                            }
                        })
                    },
                    error: function(error) {
                        console.log(error);
                    }
                })
            })

            // delete permission by role
            $('body').on('click', '.closeDelete', function() {
                let id = $(this).data('id');
                let name = $(this).data('name');
                $.ajax({
                    url: '{{ route('admin.roles.remove-permission') }}',
                    type: 'DELETE',
                    data: {
                        role_id: roleId,
                        permission: name
                    },
                    dataType: 'JSON',
                    success: function(response) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            text: response.message,
                            showConfirmButton: true,
                            timer: 1500
                        })
                        $.ajax({
                            url: '{{ route('admin.permissions.getByRole') }}',
                            type: 'POST',
                            dataType: 'JSON',
                            data: {
                                id: roleId
                            },
                            success: function(response) {
                                $('.list-permissions').empty();
                                response.forEach(res => {
                                    $('#modalPermission .list-permissions')
                                        .append(
                                            `<li class="list-group-item d-flex justify-content-between"><span>${res.name}</span><span class="closeDelete" data-id="${res.id}" data-name="${res.name}">&times;</span></li>`
                                        )
                                });
                            }
                        })

                    },
                    error: function(response) {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            text: response.responseJSON.errors.name,
                            showConfirmButton: true,
                            timer: 1500
                        })
                    }
                })

                $('#myModal').on('hidden.bs.modal', function() {
                    let form = $('#myModal #myForm');
                    form.trigger('reset');
                })
            })

            $('#modalPermission').on('hidden.bs.modal', function(){
                $('#modalPermission .list-permissions').empty();
            })

            $('#myModal').on('hidden.bs.modal', function(){
                let form = $('#myModal #myForm');
                $(form).find('.text-danger.text-small').remove();
                $(form).find('.form-control').removeClass('is-invalid');
                form.trigger('reset');
                $('#modalPermission .list-permissions').empty();
            })
        })
    </script>
@endpush
