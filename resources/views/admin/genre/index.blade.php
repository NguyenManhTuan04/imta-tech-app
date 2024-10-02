@extends('layouts.app')
@section('start-point')
    Trang chủ
@endsection
@section('title')
    Quản lý thể loại
@endsection
@section('content')
    <div class="row">
        <div class="col-4">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Thêm thể loại mới</h6>
                    </div>
                </div>
                <div class="card-body">
                    <form action="" method="post" id="myFormStore">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-3">
                                <label class="form-label">Tên thể loại</label>
                            </div>
                            <div class="col-9">
                                <div class="input-group input-group-outline">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           name="name" value="{{ old('name') }}">
                                </div>
                            </div>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Mô tả ngắn</label>
                            </div>

                            <div class="col-9">
                                <div class="input-group input-group-outline">
                                    <input type="text"
                                           class="form-control @error('description') is-invalid @enderror"
                                           name="description" value="{{ old('description') }}">
                                </div>
                            </div>

                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <button class="btn btn-success my-3" id="submit">Thêm</button>
                        <button type="reset" class="btn btn-info my-3">Reset</button>
                    </form>

                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Danh sách thể loại</h6>
                    </div>
                </div>
                <div class="card-body pb-2">
                    <div class="table-responsive">
                        <table class="table" id="genreTable">
                            <thead>
                            <tr>
                                <th>Tên thể loại</th>
                                <th>Mô tả</th>
                                <th>Thời gian</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('styles')

@endpush
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

            $('#submit').click(async function (e) {
                e.preventDefault();
                try {
                    const res = await $.ajax({
                        url: "{{ route('genre.store') }}",
                        type: "POST",
                        dataType: "json",
                        data: $('#myFormStore').serialize(),
                    });

                    console.log(res);
                    // Kiểm tra phản hồi và làm mới bảng nếu thêm thành công
                    if (res.status === 'success') {
                        $('#myFormStore')[0].reset(); // Đặt lại biểu mẫu
                        genreTable.ajax.reload(); // Làm mới bảng
                        toastr.success('Thể loại đã được thêm thành công.'); // Thông báo thành công
                    } else {
                        toastr.error('Có lỗi xảy ra khi thêm thể loại.'); // Thông báo lỗi
                    }
                } catch (error) {
                    console.error('Có lỗi xảy ra khi thêm thể loại:', error);
                    toastr.error('Có lỗi xảy ra. Vui lòng thử lại.'); // Thông báo lỗi
                }
            });
        });

        // Chuyển đến trang chỉnh sửa thể loại mà không tải lại trang
        async function editGenre(id) {
            try {
                const response = await $.ajax({
                    url: `/admin/genre/${id}/edit`, // Đường dẫn đến trang chỉnh sửa
                    type: 'GET',
                });

                $('#app').html(response); // Thay đổi nội dung của phần tử với ID app
                history.pushState(null, '', `/admin/genre/${id}/edit`); // Thay đổi URL
            } catch (error) {
                console.error('Có lỗi xảy ra khi tải trang chỉnh sửa thể loại:', error);
                alert('Không thể tải trang chỉnh sửa thể loại.');
            }
        }

        async function showGenre(id) {
            try {
                const response = await $.ajax({
                    url: `/admin/genre/${id}`,
                    type: 'GET',
                });

                $('#app').html(response);
                history.pushState(null, '', `/admin/genre/${id}`);
            } catch (error) {
                console.error('Có lỗi xảy ra khi tải trang xem thể loại:', error);
                alert('Không thể tải trang xem thể loại.');
            }
        }

        // Hàm xóa thể loại
        async function deleteGenre(id) {
            if (confirm("Bạn có chắc chắn muốn xóa thể loại này?")) {
                try {
                    const response = await $.ajax({
                        url: `/admin/genre/${id}`,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                    });

                    if (response.status === 'success') {
                        $('#genreTable').DataTable().ajax.reload(); // Làm mới bảng
                        toastr.success('Thể loại đã được xóa thành công.'); // Thông báo thành công
                    } else {
                        toastr.error('Có lỗi xảy ra khi xóa.'); // Thông báo lỗi
                    }
                } catch (error) {
                    console.error('Có lỗi xảy ra khi xóa thể loại:', error);
                    toastr.error('Có lỗi xảy ra. Vui lòng thử lại.'); // Thông báo lỗi
                }
            }
        }
    </script>
@endpush
