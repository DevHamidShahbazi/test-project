
<div class="modal fade" id="EditList{{$key}}">
    <div class="modal-dialog modal-lg" role="document">
        <!-- Content -->
        <div style="height: 100%" class="modal-content">

            <!--Modal cascading tabs-->
            <div style="height: 100%" class="modal-c-tabs">

                <!-- Nav tabs -->
                <ul style=" background-color: #353b50 !important" class="nav md-tabs tabs-2 light-blue darken-3" role="tablist">
                    <li class="nav-item ">
                        <a class="nav-link text-light" data-toggle="tab" href="#panel17" role="tab">
                            <i class="fa fa-plus"></i>
                            ویرایش  {{ $product->name }}
                        </a>
                    </li>
                </ul>

                <!-- Tab panels -->
                <div class="tab-content">
                    <!-- Panel 17 -->


                    @if($product->image==null)
                        <div class="col-12">
                            <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fa fa-warning"></i> توجه!</h5>
                                هنوز عکسی انتخاب نشده است
                            </div>
                        </div>

                    @else
                        <div class="text-center">
                            <img src="{{$product->image}}" class="rounded col-4">
                        </div>
                    @endif

                    <div class="tab-pane fade in show active" id="panel17" role="tabpanel">
                        <form method="POST" action="{{ route('admin.product.update',$product->id) }}"  enctype="multipart/form-data" >
                            @csrf
                            {{ method_field('PATCH') }}

                            <div class="modal-body mb-1">

                                <div class="md-form mb-3">
                                    <label class="m-0">نام</label>
                                    <input required value="{{ $product->name }}"  dir="rtl" id="name" type="text" class="form-control" name="name" >
                                </div>

                                <div class="md-form mb-3">
                                    <label class="m-0">قیمت</label>
                                    <input required value="{{ $product->price  }}" type="number" class="form-control" name="price" >
                                </div>

                                <div class="form-group">

                                    <div class="form-group">
                                        <label class="col-sm-12 control-label" >
                                            توضیحات
                                        </label>
                                        <textarea name="description" class="form-control" rows="3" placeholder="description">{{$product->description}}</textarea>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="exampleInputFile">تصویر</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input  name="image" type="file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">انتخاب فایل</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center mt-2">
                                    <button type="submit" class="btn btn-primary btn-sm ">اضافه کردن</button>
                                    <button id="closed"  class="btn btn-danger btn-sm"  data-dismiss="modal"  data-toggle="tooltip" data-placement="bottom" data-html="true"  data-original-title="خروج">لغو</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Panel 7 -->
                </div>
            </div>
        </div>
        <!-- Content -->
    </div>
</div>
