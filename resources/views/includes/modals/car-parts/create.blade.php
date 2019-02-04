<div class="modal fade" id="carPartCreateModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pievienot jaunu rezerves daļu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <div aria-hidden="true">&times;</div>
                </button>
            </div>
            <div class="modal-body">
                <form id="car-part-create-form">
                    <div class="form-group">
                        <label for="original_code">Oriģinālais kods</label>
                        <input type="text" class="form-control" id="original_code" name="original_code" required>
                        <div class="error" id="error-original_code"></div>
                    </div>
                    <div class="form-group">
                        <label for="product_group_id">Ražotājs</label>
                        <select class="form-control" id="manufacturer_id" name="manufacturer_id">
                            <option></option>
                            @foreach($manufacturers as $manufacturer)
                                <option value="{{ $manufacturer->id }}">{{ $manufacturer->title }}</option>
                            @endforeach
                        </select>
                        <div class="error" id="error-manufacturer_id"></div>
                    </div>
                    <input style="display: none;" name="car_part_card_id" value="{{ $carPartCard->id }}">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Aizvērt</button>
                <button type="button" class="btn btn-primary add" id="save">Saglabāt</button>
            </div>
        </div>
    </div>
</div>