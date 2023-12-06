$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /*sweet toastr-alert Delete*/
    $('.btnDelete').on('click', function () {
        var id = $(this).data('id');
        var route = $(this).data('route');
        swal({
            title: "مطمئنی ؟؟",
            text: "میخوای این فایل رو پاک کنی؟؟",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "بله . پاکش کن!",
            cancelButtonText: "نه  . بیخیال!",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function (isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: route,
                    type: 'DELETE',
                    data: id,
                    success: function (data) {
                        if ((data.success)) {
                            $('.item' + data.id).remove();
                            $('.Dlt').each(function (index) {
                                $(this).html(index + 1);
                            });
                            swal("پاک شد!", "فایل با موفقیت پاک شد", "success");
                        } else if (data.error) {
                            swal("خطا!!", data.message, "error");
                        }
                    }
                });
            } else {
                swal("لغو شد", "حذف متوقف شد", "info");
            }
        });
    });
    /*sweet toastr-alert Delete*/
});

