@section('title', 'SSMobile | Danh Mục Đã Xóa')
@section('titlePage', 'Danh Sách Danh Mục Đã Xóa')
@extends('admin.masterAdmin')
@section('main-content')
    <section class="content">
        <div class="content-page">
            <div class="col-lg-15">
                <div>
                    <h1 class="font-20">@yield('titlePage')</h1>
                    <a href="{{ Route('category.create') }}"><button type="button"
                            class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                            data-target=".bs-example-modal-lg"><i class="fa fa-plus mr-1"></i>Thêm Mới </button></a>
                    <a href="{{ Route('category.trash') }}"><button class="btn btn-icon btn-warning"> <i
                                class="fas fa-trash-alt"></i>
                            Thùng Rác</button></a>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-icon alert-success text-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <i class="mdi mdi-check-all mr-2"></i>
                            <strong>Thành Công!</strong> {{ $message }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table m-0">
                            <thead>
                                <tr>
                                    <th>Stt</th>
                                    <th>Tên Danh Mục</th>
                                    <th>Danh Mục Cha</th>
                                    <th>Trang Thái</th>
                                    <th>Ngày tạo</th>
                                    <th>Tùy Chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->parent_id }}</td>
                                        <td>{!! $item->status
                                            ? '<span class="btn btn-teal btn-rounded">Hiện</span>'
                                            : '<span class="btn btn-danger btn-rounded">Ẩn</span>' !!}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <div style="display: flex">
                                                <a href="{{ Route('category.restore', $item) }}" onclick="return confirm('Bạn có muốn khôi phục!?')"><button type="button"
                                                        class="btn btn-icon btn-primary waves-effect"><i
                                                            class="fas fa-window-restore"></i></button></a>
                                                <a href="{{ Route('category.forceDelete', $item) }}" onclick="return confirm('Bạn có chắc xóa không!?')"> <button type="submit"
                                                        class="btn btn-icon btn-danger waves-effect waves-light"
                                                        id="sa-warning"><i btn-icon btn-primaryi
                                                            class="fas fa-times"></i></button></a>
                                            </div>

                                        </td>

                                    </tr>
                                @empty
                                    <h1>Không có dữ liệu</h1>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- end content -->
        <!-- END content-page -->
    </section>
@endsection
