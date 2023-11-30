@section('title', 'SSMobile | Thêm Mới Danh Mục')
@section('titlePage', 'Thêm Mới Danh Mục')
@extends('admin.masterAdmin')
@section('main-content')
    <section class="content">
        <div class="content-page">
            <div class="mt-5">
                <h4 class="header-title mb-3">@yield('titlePage')</h4>
                <div class="mb-4">
                    <form class="form-validation" method="POST" action="{{ Route('category.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-4 form-control-label">Tên Danh Mục<span
                                    class="text-danger">*</span></label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" id="inputEmail3" name="name"
                                    placeholder="Tên danh mục" @error('name') is-invalid @enderror>
                            </div>
                        </div>
                        @error('name')
                            <div class="alert alert-icon alert-warning text-warning alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <i class="mdi mdi-alert mr-1"></i>
                                <strong>Thất Bại!</strong>{{ $message }}
                            </div>
                        @enderror

                        <div class="form-group row">
                            <label class="col-md-4 form-control-label">Danh Mục Cha</label>
                            <div class="col-md-7">
                                <select class="form-control" name="parent_id" id="input">
                                    <option value="">Chọn danh mục</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-md-4 form-control-label">Trạng Thái</label>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio1" name="status" class="custom-control-input"
                                        value="1" checked='checked'>
                                    <label class="px-1 custom-control-label" for="customRadio1">Hiển Thị</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio2" name="status" class="custom-control-input"
                                        value="0">
                                    <label class="custom-control-label" for="customRadio2">Ẩn</label>
                                </div>
                            </div>

                        </div>
                        <div class="form-group row justify-content-end">
                            <div class="col-md-8">
                                <button class="btn btn-primary waves-effect waves-light mr-1">
                                    Thêm Mới
                                </button>
                                <a href="{{ Route('category.index') }}" class="btn btn-danger waves-effect>">
                                    Hủy Bỏ</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end content -->
        <!-- END content-page -->
    </section>
@endsection
