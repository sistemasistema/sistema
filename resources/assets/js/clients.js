$( document ).ready(function() {

    if ($('#clients').length) {
        var clientsTable = $('#clients-table').DataTable({
            'searching': false,
            'lengthChange': false,
            'ajax': {
                'processing': true,
                'url': '/clients-data',
                'dataSrc': ''
            },
            'columns': [
                {'data': 'id'},
                {'data': 'company_name'},
                {'data': 'registration_number'},
                {'data': 'vat_code'},
                {'data': 'street_l_a'},
                {'data': 'city_l_a'},
                {'data': 'village_l_a'},
                {'data': 'country_l_a'},
                {'data': 'postcode_l_a'},
                {'data': 'street_a_a'},
                {'data': 'city_a_a'},
                {'data': 'village_a_a'},
                {'data': 'country_a_a'},
                {'data': 'postcode_a_a'},
                {'data': 'head_name'},
                {'data': 'head_surname'},
                {'data': 'mobile_phone_number'},
                {'data': 'phone_number'},
                {'data': 'fax'},
                {'data': 'email'},
                {'data': 'banks.title', 'defaultContent': ''},
                {'data': 'banks.code', 'defaultContent': ''},
                {'data': 'bank_account_number'},
                {'data': 'homepage'}
            ]
        });

        $('#clients-table tbody').on( 'click', 'tr', function () {
            var data = clientsTable.row( this ).data();
            $.ajax({
                type: 'GET',
                url: '/clients/' + data.id + '/edit',
                success: function (data) {
                    var form = $('#client-edit-form');
                    for (i in data) {
                        form.find('[name="' + i + '"]').val(data[i]);
                    }
                    form.data('id', data.id);
                    $('#clientEditModal').modal('show');
                }
            });
        });

        $('#clientEditModal .modal-footer').on('click', '.edit', function () {
            var form = $('#client-edit-form');
            var id = form.data('id');
            $.ajax({
                type: 'PUT',
                url: '/clients/' + id,
                data: form.serialize(),
                success: function (data) {
                    if (data.errors) {
                        toastr.error('Lūdzu aizpildiet korekti ievadlaukus!');
                        for(control in data.errors) {
                            $('input[name=' + control + '], select[name=' + control + ']').addClass('is-invalid');
                            $('#error-edit-' + control).html(data.errors[control]).addClass('invalid-feedback');
                        }
                    } else {
                        $('#clientEditModal').modal('toggle');
                        toastr.success(data.message, {timeOut: 5000});
                        clientsTable.ajax.reload();
                    }
                }
            });
        });


        $('#clientEditModal .modal-footer').on('click', '.delete', function () {
            $('#deleteModal').modal('show');
            $('#deleteModal .modal-footer').on('click', '.confirm-delete', function () {
                var form = $('#client-edit-form');
                var id = form.data('id');
                $.ajax({
                    type: 'DELETE',
                    url: '/clients/' + id,
                    success: function (data) {
                        $('#deleteModal').modal('toggle');
                        $('#clientEditModal').modal('toggle');
                        toastr.success(data.message, {timeOut: 5000});
                        clientsTable.ajax.reload();
                    }
                });
            });
        });

        $('.add-button').click(function () {
            $('#clientCreateModal').modal('show');
        });

        $('#clientCreateModal .modal-footer').on('click', '.add', function () {
            var form = $('#client-create-form');
            $.ajax({
                type: 'POST',
                url: '/clients',
                data: form.serialize(),
                success: function (data) {
                    if (data.errors) {
                        toastr.error('Lūdzu aizpildiet korekti ievadlaukus!');
                        $('.invalid-feedback').removeClass('invalid-feedback');
                        $('.is-invalid').removeClass('is-invalid');
                        $('.error').html('');
                        for(control in data.errors) {
                            $('input[name=' + control + '], select[name=' + control + ']').addClass('is-invalid');
                            $('#error-' + control).html(data.errors[control]).addClass('invalid-feedback');
                        }
                    } else {
                        $('#clientCreateModal').modal('toggle');
                        toastr.success(data.message, {timeOut: 5000});
                        clientsTable.ajax.reload();
                    }
                }
            });
        });

        $('#clientCreateModal, #clientEditModal').on('hidden.bs.modal', function (e) {
            $(this).find("input,select").val('');
            $('.invalid-feedback').removeClass('invalid-feedback');
            $('.is-invalid').removeClass('is-invalid');
            $('.error').html('');
        });
    }
});