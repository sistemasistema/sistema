<div class="modal fade" id="carPartEditModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Labot rezerves daļas datus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <div aria-hidden="true">&times;</div>
                </button>
            </div>
            <div class="modal-body">
                <form id="car-part-edit-form">
                    <div class="form-group">
                        <label for="original_code-edit">Oriģinālais kods</label>
                        <input type="text" class="form-control" id="original_code-edit" name="original_code" required>
                        <div class="error" id="error-edit-original_code"></div>
                    </div>
                    <div class="form-group">
                        <label for="manufacturer_id-edit">Ražotājs</label>
                        <select class="form-control" id="manufacturer_id-edit" name="manufacturer_id">
                            <option></option>
                            @foreach($manufacturers as $manufacturer)
                                <option value="{{ $manufacturer->id }}">{{ $manufacturer->title }}</option>
                            @endforeach
                        </select>
                        <div class="error" id="error-edit-manufacturer_id"></div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger delete">Dzēst rezerves daļu</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Aizvērt</button>
                <button type="button" class="btn btn-primary edit" id="save">Saglabāt izmaiņas</button>
            </div>
        </div>
    </div>
</div>