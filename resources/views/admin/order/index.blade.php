@extends('layouts.layout admin.index')

@section('header',' لیست سفارشات')
@section('products','active')

@section('content')
    @include('components.toastr-alert.error')
    @include('components.toastr-alert.success')
    @include('components.errors.index')
    <div class="row">
        <div class="col-12">
            <div class="card" style="background-color: #353b5000">

                <div class="col-sm-12 float-sm-right">

                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <tr style="background-color: #343a40;" >
                                <th  class="text-center text-light" scope="col">شماره سفارش</th>
                                <th  class="text-center text-light" scope="col" >تعداد</th>
                                <th  class="text-center text-light" scope="col" >نام محصول سفارش شده</th>
                                <th  class="text-center text-light" scope="col" >کاربر سفارش دهنده</th>
                                <th  class="text-center text-light" scope="col" >تاریخ ثبت سفارش</th>
                                <th  class="text-center text-light" scope="col" >نمایش</th>
                            </tr>


                            @if(!empty($orders ))
                                @foreach($orders as $key=> $order)
                                    <tr class="item{{$order->id}}">
                                        <td class="py-3 text-center font-weight-bold">{{ $order->id }}</td>
                                        <td class="py-3 text-center font-weight-bold" >{{$order->count}}</td>
                                        <td class="py-3 text-center font-weight-bold" >{{$order->product->name}}</td>
                                        <td class="py-3 text-center font-weight-bold" >{{$order->user->name}}</td>
                                        <td class="py-3 text-center font-weight-bold" >{{ Verta::instance($order->created_at)->formatDate() }}</td>
                                        <td class="py-3 px-0 text-center font-weight-bold">
                                            <a href="{{ route('admin.order.show',$order->id) }}" style="width: max-content;" class="btn btn-info btn-sm mr-2"><i class="fa fa-eye"></i><i style="margin: inherit;">نمایش</i></a>
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
            <div class="pager default text-center">
                {{$orders->links("pagination::bootstrap-4")}}
            </div>
        </div>
    </div>

@endsection
