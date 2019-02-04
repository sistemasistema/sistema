$( document ).ready(function() {

    if ($('#users').length) {
        var usersTable = $('#users-table').DataTable({
            'searching': false,
            'lengthChange': false,
            'ajax': {
                'processing': true,
                'url': '/users-data',
                'dataSrc': ''
            },
            'columns': [
                {'data': 'id'},
                {'data': 'first_name'},
                {'data': 'last_name'},
                {'data': 'personal_code'},
                {'data': 'position'},
                {'data': 'street'},
                {'data': 'city'},
                {'data': 'village'},
                {'data': 'country'},
                {'data': 'postcode'},
                {'data': 'mobile_phone_number'},
                {'data': 'phone_number'},
                {'data': 'fax'},
                {'data': 'email'},
                {'data': 'banks.title', 'defaultContent': ''},
                {'data': 'banks.code', 'defaultContent': ''},
                {'data': 'bank_account_number'},
                {'data': 'user_roles.title'},
                {'data': 'user_statuses.title'}
            ]
        });


        $('#users-table tbody').on( 'click', 'tr', function () {
            var data = usersTable.row( this ).data();
            $.ajax({
               type: 'GET',
               url: '/users/' + data.id + '/edit',
               success: function (data) {
                   var form = $('#user-edit-form');
                   for (i in data) {
                       form.find('[name="' + i + '"]').val(data[i]);
                   }
                   form.data('id', data.id);
                   $('#userEditModal').modal('show');
               } 
            });
        });

        $('#userEditModal .modal-footer').on('click', '.edit', function () {
            var form = $('#user-edit-form');
            var id = form.data('id');
            $.ajax({
                type: 'PUT',
                url: '/users/' + id,
                data: form.serialize(),
                success: function (data) {
                    if (data.errors) {
                        toastr.error('Lūdzu aizpildiet korekti ievadlaukus!');
                        for(control in data.errors) {
                            $('input[name=' + control + '], select[name=' + control + ']').addClass('is-invalid');
                            $('#error-edit-' + control).html(data.errors[control]).addClass('invalid-feedback');
                        }
                    } else {
                        $('#userEditModal').modal('toggle');
                        toastr.success(data.message, {timeOut: 5000});
                        usersTable.ajax.reload();
                    }
                }
            });
        });


        $('#userEditModal .modal-footer').on('click', '.delete', function () {
            $('#deleteModal').modal('show');
            $('#deleteModal .modal-footer').on('click', '.confirm-delete', function () {
                var form = $('#user-edit-form');
                var id = form.data('id');
                $.ajax({
                    type: 'DELETE',
                    url: '/users/' + id,
                    success: function (data) {
                        $('#deleteModal').modal('toggle');
                        $('#userEditModal').modal('toggle');
                        toastr.success(data.message, {timeOut: 5000});
                        usersTable.ajax.reload();
                    }
                });
            });
        });

        $('.add-button').click(function () {
            $('#userCreateModal').modal('show');
        });

        $('#userCreateModal .modal-footer').on('click', '.add', function () {
            var form = $('#user-create-form');
            $.ajax({
                type: 'POST',
                url: '/users',
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
                        $('#userCreateModal').modal('toggle');
                        toastr.success(data.message, {timeOut: 5000});
                        usersTable.ajax.reload();
                    }
                }
            });
        });

        $('#userCreateModal, #userEditModal').on('hidden.bs.modal', function (e) {
            $(this).find("input,select").val('');
            $('.invalid-feedback').removeClass('invalid-feedback');
            $('.is-invalid').removeClass('is-invalid');
            $('.error').html('');
        });

    }

});