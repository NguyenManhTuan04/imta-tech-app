@extends('layouts.app')

@section('start-point')
    Trang chủ
@endsection

@section('title')
    Chỉnh sửa thể loại
@endsection

@section('content')
    <div class="row">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Thêm thể loại mới</h6>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('genre.update', $genre->id) }}" method="POST" id="editForm">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <div class="col-3">
                        <label for="name" class="form-label">Tên thể loại</label>
                        </div>
                        <div class="col-3"></div>

                        <div class="input-group input-group-outline">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name', $genre->name) }}">
                        </div>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <div class="col-3"></div>
                        <label for="description" class="form-label">Mô tả ngắn</label>
                        <div class="col-3"></div>

                        <div class="input-group input-group-outline">
                        <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" id="description" value="{{ old('description', $genre->description) }}">
                        </div>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-warning" onclick="">Cập nhật</button>
                    <a href="#"  class="btn btn-info" onclick="backIndex()">Quay lại</a>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('#editForm').on('submit', async function (e) {
            e.preventDefault();
            try {
                const res = await $.ajax({
                    url: $(this).attr('action'),
                    type: "POST",
                    dataType: "json",
                    data: $(this).serialize(),
                });

                // Kiểm tra phản hồi và làm mới bảng nếu cập nhật thành công
                if (res.status === 'success') {
                    $('#genreTable').DataTable().ajax.reload(); // Làm mới bảng
                    toastr.success('Thể loại đã được cập nhật thành công.'); // Thông báo thành công
                    backIndex();
                } else {
                    toastr.error('Có lỗi xảy ra khi cập nhật thể loại.'); // Thông báo lỗi
                }
            } catch (error) {
                console.error('Có lỗi xảy ra khi cập nhật thể loại:', error);
                toastr.error('Có lỗi xảy ra. Vui lòng thử lại.'); // Thông báo lỗi
            }
        });
        async function backIndex() {
            try {
                const response = await $.ajax({
                    url: `/admin/genre`, // Đường dẫn đến trang danh sách thể loại
                    type: 'GET',
                });

                $('#app').html(response); // Thay đổi nội dung của phần tử với ID app
                history.pushState(null, '', '/admin/genre'); // Thay đổi URL
            } catch (error) {
                console.error('Có lỗi xảy ra khi tải trang danh sách thể loại:', error);
                alert('Không thể tải trang danh sách thể loại.'); // Thông báo lỗi cho người dùng
            }
        }

    </script>
@endpush
