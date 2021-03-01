$(document).ready(function () {
    $('#myDataTable').DataTable({
        ordering: false
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $('body').on('submit', '.create-product', function (e) {
        e.preventDefault();

        $.ajax({
            url: baseUrl + '/staff/product',
            method: 'POST',
            contentType: false,
            processData: false,
            data: new FormData(this),
            success: function (data) {
                if ($.isEmptyObject(data.error)) {
                    if (data.success) {
                        toastr.success(data.success);
                        $('.create-product')[0].reset();
                        $('.special-price-box').css('display', 'none');
                        $('.warranty-box').css('display', 'none');
                        $('.product-gallery').empty();
                    } else {
                        toastr.error(data.unable);
                    }
                } else {
                    $.each(data.error, function (key, value) {
                        toastr.error(value)
                    })
                }
            }
        })

    })


    $('#spePrice').click(function () {
        $('.special-price-box').slideToggle();
    });


    $('#wYes').change(function () {
        $(".warranty-box").slideDown('slow');
    });
    $('#wNo').change(function () {
        $(".warranty-box").slideUp('slow');
    });


    // pagination
    $('body').on('click', '.pagination .page-link', function () {
        event.preventDefault();
        let url = $(this).attr('href');
        let page = url.split('page=')[1];

        getData(page);
    })


    function getData(page) {
        let url = $('#paginationData').data('url');
        $.ajax({
            url: url,
            method: 'POST',
            data: { page: page },
            success: function (result) {
                $('#paginationData').html(result);
            }
        })
    }

    // Remove Item
    $('body').on('click', '.remove-item', function () {
        let url = $(this).data('url');
        let id = $(this).data('id');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: url,
                    type: 'delete',
                    success: function (result) {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                        let page = $('li.page-item.active .page-link').html();
                        getData(page);
                        $('.tr' + id).empty();
                    }
                });
            }
        })
    })

})

/*
function showErrorMessage(message) {
    $('.error-message').css('display', 'block').find('ul').html('');
    $.each(message, function (key, value) {
        $('.error-message').find('ul').append('<li>' + value + '</li>');
    })
}*/


tinymce.init({
    selector: '.editor',
    width: '1000px'
});


// Multiple images preview in browser
function imagesPreview(input, place) {
    if (input.files) {
        $(place).html('');
        let filesAmount = input.files.length;

        for (i = 0; i < filesAmount; i++) {
            let reader = new FileReader();

            reader.onload = function (event) {
                $($.parseHTML('<img class="img-fluid img-thumbnail" style="height: 100px;width: 100px">')).attr('src', event.target.result).appendTo(place);
            }

            reader.readAsDataURL(input.files[i]);
        }
    }
}

function convertToSlug(text, place) {
    text = text.toLowerCase();
    text = text.replace(/[^a-zA-Z0-9]+/g, '-');
    $(place).val(text);
}

$('body').on('change', '#images', function () {
    imagesPreview(this, '.product-gallery');
});
$('body').on('change', '#thumbnail', function () {
    imagesPreview(this, '.thumbnail');
});
