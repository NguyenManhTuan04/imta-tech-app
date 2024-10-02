@extends('layouts.app')
@section('start-point')
    Trang chủ
@endsection
@section('title')
    Quản lý truyện
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Danh sách truyện</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Author</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Function</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employed</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">John Michael</h6>
                                           <div class="d-flex ">
                                               <a class="text-xs me-1" href="">Xem |</a>
                                               <a class="text-xs me-1" href=""> Sửa |</a>
                                               <a class="text-xs text-danger me-1" href="">Xóa</a>
                                           </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">Manager</p>
                                    <p class="text-xs text-secondary mb-0">Organization</p>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <span class="badge badge-sm bg-gradient-success">Online</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            // Khởi tạo bảng DataTable
            const genreTable = $('#genreTable').DataTable({
                ajax: '{{ route('genre.index') }}',
                columns: [
                    {
                        data: 'name',
                        render: function (data, type, row) {
                            return `
                                <a href="#" class="text-sm" onclick="showGenre(${row.id})">${data}</a>
                                 <div class="d-flex">
                                     <a class="text-xs me-1" href="#" onclick="showGenre(${row.id})">Xem |</a>
                                     <a class="text-xs me-1" href="#" onclick="editGenre(${row.id})"> Sửa |</a>
                                      <a class="text-xs me-1 text-danger" href="#" onclick="deleteGenre(${row.id})">Xóa</a>
                                 </div>
                    `;
                        }
                    },
                    {
                        data: 'description',
                        render: function (data, type, row) {
                            return `
                                <p href="#" class="text-sm">${data}</p>
                                    `;
                        }
                    },
                    {
                        data: 'updated_at',
                        render: function (data) {
                            const updatedAt = new Date(data);
                            const formattedDate = `${updatedAt.getDate()}/${updatedAt.getMonth() + 1}/${updatedAt.getFullYear()}`;

                            return `
                                <p href="#" class="text-sm">${formattedDate}</p>
                                    `;
                        }
                    },
                ]
            });

        });

    </script>
@endpush
