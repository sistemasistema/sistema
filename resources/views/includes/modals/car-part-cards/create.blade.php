<div class="modal fade" id="carPartCardCreateModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pievienot jaunu rezerves daļu kartiņu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <div aria-hidden="true">&times;</div>
                </button>
            </div>
            <div class="modal-body">
                <form id="car-part-card-create-form">
                    <div class="form-group">
                        <label for="model">Modelis</label>
                        <input type="text" class="form-control" id="model" name="model" required>
                        <div class="error" id="error-model"></div>
                    </div>
                    <div class="form-group">
                        <label for="title">Nosaukums</label>
                        <input type="text" class="form-control" id="title" name="title">
                        <div class="error" id="error-title"></div>
                    </div>
                    <div class="form-group">
                        <label for="product_group_id">Grupa</label>
                        <select class="form-control" id="product_group_id" name="product_group_id">
                            <option>Izvēlieties...</option>
                            @foreach($productGroups as $productGroup)
                                <option value="{{ $productGroup->id }}">{{ $productGroup->title }}</option>
                            @endforeach
                        </select>
                        <div class="error" id="error-product_group_id"></div>
                    </div>
                    <div class="form-group d-none" id="product-subgroup-dropdpwn">
                        <label for="product_subgroup_id">Apakšgrupa</label>
                        <select class="form-control" id="product_subgroup_id" name="product_subgroup_id">
                            <option>Izvēlieties...</option>
                        </select>
                        <div class="error" id="error-product_subgroup_id"></div>
                    </div>
                    <div class="form-group">
                        <label for="size">Izmērs</label>
                        <input type="text" class="form-control" id="size" name="size">
                        <div class="error" id="error-size"></div>
                    </div>
                    <div class="form-group">
                        <label for="weight">Svars</label>
                        <input type="text" class="form-control" id="weight" name="weight">
                        <div class="error" id="error-weight"></div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Aizvērt</button>
                <button type="button" class="btn btn-primary add" id="save">Saglabāt</button>
            </div>
        </div>
    </div>
</div>