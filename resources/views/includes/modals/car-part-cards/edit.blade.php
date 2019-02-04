<div class="modal fade" id="carPartCardEditModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Labot rezerves daļu kartiņas datus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <div aria-hidden="true">&times;</div>
                </button>
            </div>
            <div class="modal-body">
                <form id="car-part-card-edit-form">
                    <div class="form-group">
                        <label for="model-edit">Modelis</label>
                        <input type="text" class="form-control" id="model-edit" name="model" required>
                        <div class="error" id="error-edit-model"></div>
                    </div>
                    <div class="form-group">
                        <label for="title-edit">Nosaukums</label>
                        <input type="text" class="form-control" id="title-edit" name="title">
                        <div class="error" id="error-edit-title"></div>
                    </div>
                    <div class="form-group">
                        <label for="product_group_id-edit">Grupa</label>
                        <select class="form-control" id="product_group_id-edit" name="product_group_id">
                            <option>Izvēlieties...</option>
                            @foreach($productGroups as $productGroup)
                                <option value="{{ $productGroup->id }}">{{ $productGroup->title }}</option>
                            @endforeach
                        </select>
                        <div class="error" id="error-edit-product_group_id"></div>
                    </div>
                    <div class="form-group d-none" id="product-subgroup-dropdpwn">
                        <label for="product_subgroup_id-edit">Apakšgrupa</label>
                        <select class="form-control" id="product_subgroup_id-edit" name="product_subgroup_id">
                            <option>Izvēlieties...</option>
                        </select>
                        <div class="error" id="error-edit-product_subgroup_id"></div>
                    </div>
                    <div class="form-group">
                        <label for="size-edit">Izmērs</label>
                        <input type="text" class="form-control" id="size-edit" name="size">
                        <div class="error" id="error-edit-size"></div>
                    </div>
                    <div class="form-group">
                        <label for="weight-edit">Svars</label>
                        <input type="text" class="form-control" id="weight-edit" name="weight">
                        <div class="error" id="error-edit-weight"></div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger delete">Dzēst rezerves daļu kartiņu</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Aizvērt</button>
                <button type="button" class="btn btn-primary edit" id="save">Saglabāt izmaiņas</button>
            </div>
        </div>
    </div>
</div>