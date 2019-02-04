$(document).ready(function () {

    if ($('#carPartCard').length) {
        var id = $('#id').val();
        var carPartsTable = $('#car-parts-table').DataTable({
            'searching': false,
            'lengthChange': false,
            'ajax': {
                'processing': true,
                'url': '/car-parts-data/' + id,
                'dataSrc': ''
            },
            'columns': [
                {'data': 'id'},
                {'data': 'original_code'},
                {'data': 'manufacturers.title', 'defaultContent': ''}

            ]
        });

        $('.edit-button').click(function () {
            $.ajax({
                type: 'GET',
                url: '/car-part-cards/' + id + '/edit',
                success: function (data) {
                    var form = $('#car-part-card-edit-form');
                    $("#product-subgroup-dropdpwn").removeClass("d-none");
                    $.each(data.product_subgroups, function (key, value) {
                        $('#product_subgroup_id-edit')
                            .append($("<option></option>")
                                .attr("value", value.id)
                                .text(value.title));
                    });
                    form.data('id', data.car_part_card.id);
                    for (i in data.car_part_card) {
                        form.find('[name="' + i + '"]').val(data.car_part_card[i]);
                    }

                    $('#carPartCardEditModal').modal('show');
                }
            });
        });

        $("#product_group_id-edit").change(function () {
            var id = $(this).val();
            var pgid = $(this).val();
            $('#product_subgroup_id-edit').empty().append($("<option></option>"));
            if (pgid != '') {
                $.ajax({
                    type: 'GET',
                    url: '/product-subgroups-data/' + id,
                    success: function (data) {
                        $("#product-subgroup-dropdpwn").removeClass("d-none");
                        $.each(data, function (key, value) {
                            $('#product_subgroup_id-edit')
                                .append($("<option></option>")
                                    .attr("value", value.id)
                                    .text(value.title));
                        });

                    }
                });
            } else {
                $("#product-subgroup-dropdpwn").addClass("d-none");
            }
        });

        $('#carPartCardEditModal .modal-footer').on('click', '.edit', function () {
            var form = $('#car-part-card-edit-form');
            var id = form.data('id');
            $.ajax({
                type: 'PUT',
                url: '/car-part-cards/' + id,
                data: form.serialize(),
                success: function (data) {
                    if (data.errors) {
                        toastr.error('Lūdzu aizpildiet korekti ievadlaukus!');
                        for(control in data.errors) {
                            $('input[name=' + control + '], select[name=' + control + ']').addClass('is-invalid');
                            $('#error-edit-' + control).html(data.errors[control]).addClass('invalid-feedback');
                        }
                    } else {
                        $("#model-card").val($("#model-edit").val());
                        $("#title-card").val($("#title-edit").val());
                        $("#product-group-card").val($("#product_group_id-edit  option:selected").text());
                        $("#product-subgroup-card").val($("#product_subgroup_id-edit  option:selected").text());
                        $("#size").val($("#size-edit").val());
                        $("#weight").val($("#weight-edit").val());
                        $('#carPartCardEditModal').modal('toggle');
                        toastr.success(data.message, {timeOut: 5000});
                    }
                }
            });
        });

        $('#carPartCardEditModal .modal-footer').on('click', '.delete', function () {
            $('#deleteModal').modal('show');
            $('#deleteModal .modal-footer').on('click', '.confirm-delete', function () {
                var form = $('#car-part-card-edit-form');
                var id = form.data('id');
                $.ajax({
                    type: 'DELETE',
                    url: '/car-part-cards/' + id,
                    success: function (data) {
/*                      $('#deleteModal').modal('toggle');
                        $('#carPartCardEditModal').modal('toggle');
                        toastr.success(data.message, {timeOut: 5000});*/
                        window.location.replace("/car-part-cards");
                    }
                });
            });
        });

        $('.add-button').click(function () {
            $('#carPartCreateModal').modal('show');
        });

        $('#carPartCreateModal .modal-footer').on('click', '.add', function () {
            var form = $('#car-part-create-form');
            $.ajax({
                type: 'POST',
                url: '/car-parts',
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
                        $('#carPartCreateModal').modal('toggle');
                        toastr.success(data.message, {timeOut: 5000});
                        carPartsTable.ajax.reload();
                    }
                }
            });
        });

        $('#car-parts-table tbody').on( 'click', 'tr', function () {
            var data = carPartsTable.row( this ).data();
            $.ajax({
                type: 'GET',
                url: '/car-parts/' + data.id + '/edit',
                success: function (data) {
                    var form = $('#car-part-edit-form');
                    for (i in data) {
                        form.find('[name="' + i + '"]').val(data[i]);
                    }
                    form.data('id', data.id);
                    $('#carPartEditModal').modal('show');
                }
            });
        });

        $('#carPartEditModal .modal-footer').on('click', '.edit', function () {
            var form = $('#car-part-edit-form');
            var id = form.data('id');
            $.ajax({
                type: 'PUT',
                url: '/car-parts/' + id,
                data: form.serialize(),
                success: function (data) {
                    if (data.errors) {
                        toastr.error('Lūdzu aizpildiet korekti ievadlaukus!');
                        for(control in data.errors) {
                            $('input[name=' + control + '], select[name=' + control + ']').addClass('is-invalid');
                            $('#error-edit-' + control).html(data.errors[control]).addClass('invalid-feedback');
                        }
                    } else {
                        $('#carPartEditModal').modal('toggle');
                        toastr.success(data.message, {timeOut: 5000});
                        carPartsTable.ajax.reload();
                    }
                }
            });
        });

        $('#carPartEditModal .modal-footer').on('click', '.delete', function () {
            $('#deleteModal').modal('show');
            $('#deleteModal .modal-footer').on('click', '.confirm-delete', function () {
                var form = $('#car-part-edit-form');
                var id = form.data('id');
                $.ajax({
                    type: 'DELETE',
                    url: '/car-parts/' + id,
                    success: function (data) {
                        $('#deleteModal').modal('toggle');
                        $('#carPartEditModal').modal('toggle');
                        toastr.success(data.message, {timeOut: 5000});
                    }
                });
            });
        });

        $('#carPartCardEditModal, #carPartCreateModal').on('hidden.bs.modal', function (e) {
            $(this).find("input,select").val('');
            $('.invalid-feedback').removeClass('invalid-feedback');
            $('.is-invalid').removeClass('is-invalid');
            $('.error').html('');
        });
    }
});