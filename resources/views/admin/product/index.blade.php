@extends('layouts.layout admin.index')

@section('Header',' لیست دسته بندی ها')
@section('products','active')
@section('content')
    @include('components.toastr-alert.error')
    @include('components.toastr-alert.success')
    @include('components.errors.index')
    <div class="row">
        <div class="col-12">
            <div class="card" style="background-color: #353b5000">

                <div class="col-sm-12 float-sm-right">
                    <div style="text-align: initial;" class="m-b-30 text-light mb-2">
                        <a data-toggle="modal" data-target="#AddList" type="button"  class="btn  btn-primary btn-sm">
                            <i class="fa fa-plus"></i>
                            <i  style="margin: inherit; ">افزودن محصول</i></a>
                    </div>
                    @include('admin.product.create')
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tr style="background-color: #343a40;" >
                            <th  class="text-center text-light" scope="col">ردیف</th>
                            <th  class="text-center text-light" scope="col" >نام</th>
                            <th  class="text-center text-light" scope="col" >قیمت</th>
                            <th  class="text-center text-light" scope="col" >تصویر</th>
                            <th  class="text-center text-light" scope="col" >ویرایش</th>
                            <th  class="text-center text-light" scope="col" >حذف</th>
                        </tr>

                        @if(!empty($products))
                            @foreach($products as $key=> $product)
                                <tr class="item{{$product->id}}">
                                    <td class="py-3 px-0 text-center font-weight-bold">{{ $loop->count-$key }}</td>
                                    <td  class="py-3 px-0 text-center font-weight-bold" >{{$product->name}}</td>
                                    <td  class="py-3 px-0 text-center font-weight-bold" >{{$product->price}}</td>
                                    <td  class="p-0 text-center" >
                                        <i><img width="100" class="img-thumbnail" src="{{ $product->image }}" alt="{{ $product->alt }}"></i>
                                    </td>
                                    <td class="py-3 px-0 text-center font-weight-bold">
                                        <button data-toggle="modal" data-target="#EditList{{$key}}" type="button" style="width: max-content;" class="btn btn-info btn-sm"><i class="fa fa-edit"></i><i style="margin: inherit;">ویرایش</i></button>
                                    </td>
                                    @include('admin.product.edit')
                                    <td  class="py-3 px-0 text-center  text-light ">
                                        <form id="delete-form" action="{{ route('admin.product.destroy',$product->id) }}" method="POST" enctype="multipart/form-data">
                                            {{ method_field('PATCH') }}
                                            @csrf
                                            <button  type="submit" style="width: max-content;" class="btn btn-sm btn-danger" ><i class="fa fa-trash ml-1"></i><i class="m-0">حذف</i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection


