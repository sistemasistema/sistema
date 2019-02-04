<div class="modal fade" id="userCreateModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pievienot jaunu lietotāju</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <div aria-hidden="true">&times;</div>
                </button>
            </div>
            <div class="modal-body">
                <form id="user-create-form">
                    <div class="form-group">
                        <label for="first_name">Vārds</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" required>
                        <div class="error" id="error-first_name"></div>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Uzvārds</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" required>
                        <div class="error" id="error-last_name"></div>
                    </div>
                    <div class="form-group">
                        <label for="email">E-pasts</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        <div class="error" id="error-email"></div>
                    </div>
                    <div class="form-group">
                        <label for="password">Parole</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        <div class="error" id="error-password"></div>
                    </div>
                    <div class="form-group">
                        <label for="personal_code">Personas kods</label>
                        <input type="text" class="form-control" id="personal_code" name="personal_code">
                        <div class="error" id="error-personal_code"></div>
                    </div>
                    <div class="form-group">
                        <label for="position">Amats</label>
                        <input type="text" class="form-control" id="position" name="position">
                        <div class="error" id="error-position"></div>
                    </div>
                    <div class="form-group">
                        <label for="street">Iela</label>
                        <input type="text" class="form-control" id="street" name="street">
                        <div class="error" id="error-street"></div>
                    </div>
                    <div class="form-group">
                        <label for="city">Pilsēta</label>
                        <input type="text" class="form-control" id="city" name="city">
                        <div class="error" id="error-city"></div>
                    </div>
                    <div class="form-group">
                        <label for="village">Ciems</label>
                        <input type="text" class="form-control" id="village" name="village">
                        <div class="error" id="error-village"></div>
                    </div>
                    <div class="form-group">
                        <label for="country">Valsts</label>
                        <input type="text" class="form-control" id="country" name="country">
                        <div class="error" id="error-country"></div>
                    </div>
                    <div class="form-group">
                        <label for="postcode">Pasta indekss</label>
                        <input type="text" class="form-control" id="postcode" name="postcode">
                        <div class="error" id="error-postcode"></div>
                    </div>
                    <div class="form-group">
                        <label for="mobile_phone_number">Mobilā tālruņa numurs</label>
                        <input type="text" class="form-control" id="mobile_phone_number" name="mobile_phone_number">
                        <div class="error" id="error-mobile_phone_number"></div>
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Tālruņa numurs</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number">
                        <div class="error" id="error-phone_number"></div>
                    </div>
                    <div class="form-group">
                        <label for="fax">Fakss</label>
                        <input type="text" class="form-control" id="fax" name="fax">
                        <div class="error" id="error-fax"></div>
                    </div>
                    <div class="form-group">
                        <label for="bank_id">Banka</label>
                        <select class="form-control" id="bank_id" name="bank_id">
                            <option ></option>
                            @foreach($banks as $bank)
                                <option value="{{ $bank->id }}">{{ $bank->title }}</option>
                            @endforeach
                        </select>
                        <div class="error" id="error-bank_id"></div>
                    </div>
                    <div class="form-group">
                        <label for="bank_account_number">Konta numurs</label>
                        <input type="text" class="form-control" id="bank_account_number" name="bank_account_number">
                        <div class="error" id="error-bank_account_number"></div>
                    </div>
                    <div class="form-group">
                        <label for="role_id">Loma</label>
                        <select class="form-control" id="role_id" name="role_id" required>
                            <option ></option>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->title }}</option>
                            @endforeach
                        </select>
                        <div class="error" id="error-role_id"></div>
                    </div>
                    <div class="form-group">
                        <label for="status_id">Statuss</label>
                        <select class="form-control" id="status_id" name="status_id" required>
                            <option></option>
                            @foreach($statuses as $status)
                                <option value="{{ $status->id }}">{{ $status->title }}</option>
                            @endforeach
                        </select>
                        <div class="error" id="error-status_id"></div>
                    </div>
                    {{--<div class="form-group">--}}
                        {{--<label for="photo">Bilde</label>--}}
                        {{--<input type="file" class="form-control" id="photo" name="photo">--}}
                        {{--<div class="error" id="error-photo"></div>--}}
                    {{--</div>--}}
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Aizvērt</button>
                <button type="button" class="btn btn-primary add" id="save">Saglabāt</button>
            </div>
        </div>
    </div>
</div>