<div class="modal fade" id="supplierEditModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Labot piegādātāja datus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <div aria-hidden="true">&times;</div>
                </button>
            </div>
            <div class="modal-body">
                <form id="supplier-edit-form">
                    <form id="supplier-create-form">
                        <div class="form-group">
                            <label for="company_name_edit">Uzņēmuma nosaukums</label>
                            <input type="text" class="form-control" id="company_name_edit" name="company_name" required>
                            <div class="error" id="error-edit-company_name"></div>
                        </div>
                        <div class="form-group">
                            <label for="registration_number_edit">Reģistrācijas numurs</label>
                            <input type="text" class="form-control" id="registration_number_edit" name="registration_number" required>
                            <div class="error" id="error-edit-registration_number"></div>
                        </div>
                        <div class="form-group">
                            <label for="vat_code_edit">PVN kods</label>
                            <input type="text" class="form-control" id="vat_code_edit" name="vat_code" required>
                            <div class="error" id="error-edit-vat_code"></div>
                        </div>
                        <h6>Juridiskā adrese</h6>
                        <div class="form-group">
                            <label for="street_l_a_edit">Iela</label>
                            <input type="text" class="form-control" id="street_l_a_edit" name="street_l_a" required>
                            <div class="error" id="error-edit-street_l_a"></div>
                        </div>
                        <div class="form-group">
                            <label for="city_l_a_edit">Pilsēta</label>
                            <input type="text" class="form-control" id="city_l_a_edit" name="city_l_a">
                            <div class="error" id="error-edit-city_l_a"></div>
                        </div>
                        <div class="form-group">
                            <label for="village_l_a_edit">Ciems</label>
                            <input type="text" class="form-control" id="village_l_a_edit" name="village_l_a">
                            <div class="error" id="error-edit-village_l_a"></div>
                        </div>
                        <div class="form-group">
                            <label for="country_l_a_edit">Valsts</label>
                            <input type="text" class="form-control" id="country_l_a_edit" name="country_l_a">
                            <div class="error" id="error-edit-country_l_a"></div>
                        </div>
                        <div class="form-group">
                            <label for="postcode_l_a_edit">Pasta indekss</label>
                            <input type="text" class="form-control" id="postcode_l_a_edit" name="postcode_l_a">
                            <div class="error" id="error-edit-postcode_l_a"></div>
                        </div>
                        <h6>Fiziskā adrese</h6>
                        <div class="form-group">
                            <label for="street_a_a_edit">Iela</label>
                            <input type="text" class="form-control" id="street_a_a_edit" name="street_a_a" required>
                            <div class="error" id="error-edit-street_a_a"></div>
                        </div>
                        <div class="form-group">
                            <label for="city_a_a_edit">Pilsēta</label>
                            <input type="text" class="form-control" id="city_a_a_edit" name="city_a_a">
                            <div class="error" id="error-edit-city_a_a"></div>
                        </div>
                        <div class="form-group">
                            <label for="village_a_a_edit">Ciems</label>
                            <input type="text" class="form-control" id="village_a_a_edit" name="village_a_a">
                            <div class="error" id="error-edit-village_a_a"></div>
                        </div>
                        <div class="form-group">
                            <label for="country_a_a_edit">Valsts</label>
                            <input type="text" class="form-control" id="country_a_a_edit" name="country_a_a">
                            <div class="error" id="error-edit-country_a_a"></div>
                        </div>
                        <div class="form-group">
                            <label for="postcode_a_a_edit">Pasta indekss</label>
                            <input type="text" class="form-control" id="postcode_a_a_edit" name="postcode_a_a">
                            <div class="error" id="error-edit-postcode_a_a"></div>
                        </div>
                        <h6>Kontaktpersona</h6>
                        <div class="form-group">
                            <label for="head_name_edit">Vārds</label>
                            <input type="text" class="form-control" id="head_name_edit" name="head_name">
                            <div class="error" id="error-edit-head_name"></div>
                        </div>
                        <div class="form-group">
                            <label for="head_surname_edit">Uzvārds</label>
                            <input type="text" class="form-control" id="head_surname_edit" name="head_surname">
                            <div class="error" id="error-edit-head_surname"></div>
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
                            <label for="email_edit">E-pasts</label>
                            <input type="email" class="form-control" id="email_edit" name="email">
                            <div class="error" id="error-edit-email"></div>
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
                            <label for="homepage_edit">Mājas lapa</label>
                            <input type="text" class="form-control" id="homepage_edit" name="homepage">
                            <div class="error" id="error-edit-homepage"></div>
                        </div>
                    </form>
            </div>
            <div class="modal-footer">

                @if (!Auth::guest() && Auth::user()->isAdmin())
                    <button type="button" class="btn btn-danger delete">Dzēst piegādātāju</button>
                @endif
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Aizvērt</button>
                <button type="button" class="btn btn-primary edit" id="save">Saglabāt izmaiņas</button>
            </div>
        </div>
    </div>
</div>