<div class="modal fade" id="userEditModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Labot lietotāja datus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <div aria-hidden="true">&times;</div>
                </button>
            </div>
            <div class="modal-body">
                <form id="user-edit-form">
                    <div class="form-group">
                        <label for="first_name_edit">Vārds</label>
                        <input type="text" class="form-control" id="first_name_edit" name="first_name" required>
                        <div class="error" id="error-edit-first_name"></div>
                    </div>
                    <div class="form-group">
                        <label for="last_name_edit">Uzvārds</label>
                        <input type="text" class="form-control" id="last_name_edit" name="last_name" required>
                        <div class="error" id="error-edit-last_name"></div>
                    </div>
                    <div class="form-group">
                        <label for="email_edit">E-pasts</label>
                        <input type="email" class="form-control" id="email_edit" name="email" required>
                        <div class="error" id="error-edit-email"></div>
                    </div>
                    <div class="form-group">
                        <label for="password_edit">Parole</label>
                        <input type="password" class="form-control" id="password_edit" name="password" required>
                        <div class="error" id="error-edit-password"></div>
                    </div>
                    <div class="form-group">
                        <label for="personal_code_edit">Personas kods</label>
                        <input type="text" class="form-control" id="personal_code_edit" name="personal_code">
                        <div class="error" id="error-edit-personal_code"></div>
                    </div>
                    <div class="form-group">
                        <label for="position_edit">Amats</label>
                        <input type="text" class="form-control" id="position_edit" name="position">
                        <div class="error" id="error-edit-position"></div>
                    </div>
                    <div class="form-group">
                        <label for="street_edit">Iela</label>
                        <input type="text" class="form-control" id="street_edit" name="street">
                        <div class="error" id="error-edit-street"></div>
                    </div>
                    <div class="form-group">
                        <label for="city_edit">Pilsēta</label>
                        <input type="text" class="form-control" id="city_edit" name="city">
                        <div class="error" id="error-edit-city"></div>
                    </div>
                    <div class="form-group">
                        <label for="village_edit">Ciems</label>
                        <input type="text" class="form-control" id="village_edit" name="village">
                        <div class="error" id="error-edit-village"></div>
                    </div>
                    <div class="form-group">
                        <label for="country_edit">Valsts</label>
                        <input type="text" class="form-control" id="country_edit" name="country">
                        <div class="error" id="error-edit-country"></div>
                    </div>
                    <div class="form-group">
                        <label for="postcode_edit">Pasta indekss</label>
                        <input type="text" class="form-control" id="postcode_edit" name="postcode">
                        <div class="error" id="error-edit-postcode"></div>
                    </div>
                    <div class="form-group">
                        <label for="mobile_phone_number_edit">Mobilā tālruņa numurs</label>
                        <input type="text" class="form-control" id="mobile_phone_number_edit" name="mobile_phone_number">
                        <div class="error" id="error-edit-mobile_phone_number"></div>
                    </div>
                    <div class="form-group">
                        <label for="phone_number_edit">Tālruņa numurs</label>
                        <input type="text" class="form-control" id="phone_number_edit" name="phone_number">
                        <div class="error" id="error-edit-phone_number"></div>
                    </div>
                    <div class="form-group">
                        <label for="fax_edit">Fakss</label>
                        <input type="text" class="form-control" id="fax_edit" name="fax">
                        <div class="error" id="error-edit-fax"></div>
                    </div>
                    <div class="form-group">
                        <label for="bank_id_edit">Banka</label>
                        <select class="form-control" id="bank_id_edit" name="bank_id">
                            <option ></option>
                            @foreach($banks as $bank)
                                <option value="{{ $bank->id }}">{{ $bank->title }}</option>
                            @endforeach
                        </select>
                        <div class="error" id="error-edit-bank_id"></div>
                    </div>
                    <div class="form-group">
                        <label for="bank_account_number_edit">Konta numurs</label>
                        <input type="text" class="form-control" id="bank_account_number_edit" name="bank_account_number">
                        <div class="error" id="error-edit-bank_account_number"></div>
                    </div>
                    <div class="form-group">
                        <label for="role_id_edit">Loma</label>
                        <select class="form-control" id="role_id_edit" name="role_id" required>
                            <option ></option>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->title }}</option>
                            @endforeach
                        </select>
                        <div class="error" id="error-edit-role_id"></div>
                    </div>
                    <div class="form-group">
                        <label for="status_id_edit">Statuss</label>
                        <select class="form-control" id="status_id_edit" name="status_id" required>
                            <option></option>
                            @foreach($statuses as $status)
                                <option value="{{ $status->id }}">{{ $status->title }}</option>
                            @endforeach
                        </select>
                        <div class="error" id="error-edit-status_id"></div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger delete">Dzēst lietotāju</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Aizvērt</button>
                <button type="button" class="btn btn-primary edit" id="save">Saglabāt izmaiņas</button>
            </div>
        </div>
    </div>
</div>