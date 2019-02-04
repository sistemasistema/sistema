$( document ).ready(function() {

    if ($('#carPartCards').length) {
        var carPartCardsTable = $('#car-part-cards-table').DataTable({
            'searching': false,
            'lengthChange': false,
            'ajax': {
                'processing': true,
                'url': '/car-part-cards-data',
                'dataSrc': ''
            },
            'columns': [
                {'data': 'id'},
                {'data': 'model'},
                {'data': 'title'},
                {'data': 'product_subgroups.product_groups.title', 'defaultContent': ''},
                {'data': 'product_subgroups.title', 'defaultContent': ''},
                {'data': 'size'},
                {'data': 'weight'}
            ]
        });

        $('#car-part-cards-table tbody').on( 'click', 'tr', function () {
            var data = carPartCardsTable.row( this ).data();
            window.location.href = '/car-part-cards/' + data.id;
        });

        $('.add-button').click(function () {
            $('#carPartCardCreateModal').modal('show');
        });

        $("#product_group_id").on('change', function () {
            var id = $(this).val();
            $('#product_subgroup_id').empty().append($("<option></option>"));
            if(id != '') {
                $.ajax({
                    type: 'GET',
                    url: '/product-subgroups-data/' + id,
                    success: function (data) {
                        $("#product-subgroup-dropdpwn").removeClass("d-none");
                        $.each(data, function(key, value) {
                            $('#product_subgroup_id')
                                .append($("<option></option>")
                                    .attr("value",value.id)
                                    .text(value.title));
                        });

                    }
                });
            } else {
                $("#product-subgroup-dropdpwn").addClass("d-none");
            }

        });

        $('#carPartCardCreateModal .modal-footer').on('click', '.add', function () {
            var form = $('#car-part-card-create-form');
            $.ajax({
                type: 'POST',
                url: '/car-part-cards',
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
                        $('#carPartCardCreateModal').modal('toggle');
                        toastr.success(data.message, {timeOut: 5000});
                        carPartCardsTable.ajax.reload();
                    }
                }
            });
        });

        $('#carPartCardCreateModal').on('hidden.bs.modal', function (e) {
            $(this).find("input,select").val('');
            $('.invalid-feedback').removeClass('invalid-feedback');
            $('.is-invalid').removeClass('is-invalid');
            $('.error').html('');
        });
    }
});