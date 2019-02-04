$( document ).ready(function() {

    if ($('#suppliers').length) {
        var suppliersTable = $('#suppliers-table').DataTable({
            'searching': false,
            'lengthChange': false,
            'ajax': {
                'processing': true,
                'url': '/suppliers-data',
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

        $('#suppliers-table tbody').on( 'click', 'tr', function () {
            var data = suppliersTable.row( this ).data();
            $.ajax({
                type: 'GET',
                url: '/suppliers/' + data.id + '/edit',
                success: function (data) {
                    var form = $('#supplier-edit-form');
                    for (i in data) {
                        form.find('[name="' + i + '"]').val(data[i]);
                    }
                    form.data('id', data.id);
                    $('#supplierEditModal').modal('show');
                }
            });
        });

        $('#supplierEditModal .modal-footer').on('click', '.edit', function () {
            var form = $('#supplier-edit-form');
            var id = form.data('id');
            $.ajax({
                type: 'PUT',
                url: '/suppliers/' + id,
                data: form.serialize(),
                success: function (data) {
                    if (data.errors) {
                        toastr.error('Lūdzu aizpildiet korekti ievadlaukus!');
                        for(control in data.errors) {
                            $('input[name=' + control + '], select[name=' + control + ']').addClass('is-invalid');
                            $('#error-edit-' + control).html(data.errors[control]).addClass('invalid-feedback');
                        }
                    } else {
                        $('#supplierEditModal').modal('toggle');
                        toastr.success(data.message, {timeOut: 5000});
                        suppliersTable.ajax.reload();
                    }
                }
            });
        });


        $('#supplierEditModal .modal-footer').on('click', '.delete', function () {
            $('#deleteModal').modal('show');
            $('#deleteModal .modal-footer').on('click', '.confirm-delete', function () {
                var form = $('#supplier-edit-form');
                var id = form.data('id');
                $.ajax({
                    type: 'DELETE',
                    url: '/suppliers/' + id,
                    success: function (data) {
                        $('#deleteModal').modal('toggle');
                        $('#supplierEditModal').modal('toggle');
                        toastr.success(data.message, {timeOut: 5000});
                        suppliersTable.ajax.reload();
                    }
                });
            });
        });

        $('.add-button').click(function () {
            $('#supplierCreateModal').modal('show');
        });

        $('#supplierCreateModal .modal-footer').on('click', '.add', function () {
            var form = $('#supplier-create-form');
            $.ajax({
                type: 'POST',
                url: '/suppliers',
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
                        $('#supplierCreateModal').modal('toggle');
                        toastr.success(data.message, {timeOut: 5000});
                        suppliersTable.ajax.reload();
                    }
                }
            });
        });

        $('#supplierCreateModal, #supplierEditModal').on('hidden.bs.modal', function (e) {
            $(this).find("input,select").val('');
            $('.invalid-feedback').removeClass('invalid-feedback');
            $('.is-invalid').removeClass('is-invalid');
            $('.error').html('');
        });
    }
});