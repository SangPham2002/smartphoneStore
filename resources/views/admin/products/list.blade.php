@section('title', 'SSMobile | Danh Sách Sản Phẩm')
@section('titlePage', 'Danh Sách Sản Phẩm')
@extends('admin.masterAdmin')
@section('main-content')
    <section class="content">
        <div class="content-page">
            <div class="col-lg-15">
                <div>
                    <h1 class="font-20">@yield('titlePage')</h1>
                    <a href="{{ Route('product.create') }}"><button type="button"
                            class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                            data-target=".bs-example-modal-lg"><i class="fa fa-plus mr-1"></i>Thêm Mới </button></a>
                    <a href=""><button class="btn btn-icon btn-warning"> <i class="fas fa-trash-alt"></i>
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
                                    <th>Tên</th>
                                    <th>Ảnh</th>
                                    <th>Giá </th>
                                    <th>Giá Sale</th>
                                    <th>Mục</th>
                                    <th>Trạng Thái</th>
                                    <th>Ngày Tạo</th>
                                    <th>Tùy Chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <img src="{{ asset('/public/images' . $item->image) }}" alt=""
                                                width="150px">
                                        </td>
                                        <td>{{ number_format($item->price) }}₫</td>
                                        <td>{{ number_format($item->sale_price) }}₫</td>
                                        <td>
                                            {{ App\Models\Category::find($item->category_id)->name }}
                                        </td>
                                        <td>{!! $item->stock
                                            ? '<span class="btn btn-teal btn-rounded">Đặc Sắc</span>'
                                            : '<span class="btn btn-danger btn-rounded">Thường</span>' !!}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <div style="display: flex">
                                                <a href="{{ Route('product.edit', $item) }}"><button type="button"
                                                        class="btn btn-icon btn-primary waves-effect"><i
                                                            class="fas fa-wrench"></i></button></a>
                                                <form action="{{ Route('product.destroy', $item) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit"
                                                        class="btn btn-icon btn-danger waves-effect waves-light"
                                                        id="sa-warning"><i btn-icon btn-primaryi
                                                            class="fas fa-times"></i></button>
                                                </form>
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
