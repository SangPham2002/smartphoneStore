@section('title','SSMobile | Admin')
@section('titlePage','Wellcome to SSMobile Admin!')
@extends('admin.masterAdmin')
@section('main-content')
    <section class="content">
        <div class="content-page">
            {{-- thay thế dữ liệu tại đây --}}
            <div class="content">
                <!-- Start container-fluid -->
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div>
                                <h4 class="header-title mb-3">@yield('titlePage')</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-12">
                            <div>
                                <h2>Bảng Danh Mục</h2>
                                <div class="table-responsive">
                                    <table class="table m-0">
                                        <thead>
                                            <tr>
                                                <th>Stt</th>
                                                <th>Tên Danh Mục</th>
                                                <th>Danh Mục Cha</th>
                                                <th>Trang Thái</th>
                                                <th>Ngày tạo</th>
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
                    <h2>Bảng Sản Phẩm</h2>
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
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <img src="{{ asset('/storage/images/' . $item->image) }}" alt=""
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
                                    </tr>
                                @empty
                                    <h1>Không có dữ liệu</h1>
                                @endforelse
                              
                            </tbody>
                            
                        </table>
                        {{ $products->links() }}
                    </div>
                </div>
                <!-- end container-fluid -->



            </div>
            {{--             End          --}}
        </div>
   
        <!-- end content -->
        <!-- END content-page -->
    </section>
@endsection
