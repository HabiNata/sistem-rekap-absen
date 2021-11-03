$('.removeEventDB').on('click', function(event) {
    event.preventDefault();
    let id = $(this).data('id');
    let url = $(this).data('url');
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success btn-sm',
            cancelButton: 'btn btn-danger btn-sm'
        },
        buttonsStyling: false
    })

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this! and data that has a relationship with this data will also be deleted!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'DELETE',
                url: url,

                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id
                },
                success: function(data) {
                    $('[data-id=' + id + ']').parent().parent().remove();
                    Swal.fire({
                        title: 'Success!',
                        text: 'Success Delete!',
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    });
                    console.log(data);
                },
                error: function(data) {
                    console.log('Error:', data);
                    Swal.fire({
                        title: 'Error!',
                        text: 'Failed Delete!',
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    });
                }
            });
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your data is safe :)',
                'error'
            )
        }
    });
});