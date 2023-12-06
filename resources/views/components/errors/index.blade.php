@if($errors->any())
    <br>
    <div class="col-12">
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class=" icon fa fa-ban"></i>خطا!</h5>
            @foreach($errors->all() as $error)
                {{ $error }}
            @endforeach
        </div>
    </div>
    <br>
@endif
