<div class="modal fade" id="clientCreateModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pievienot jaunu klientu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <div aria-hidden="true">&times;</div>
                </button>
            </div>
            <div class="modal-body">
                <form id="client-create-form">
                    <div class="form-group">
                        <label for="company_name">Uzņēmuma nosaukums</label>
                        <input type="text" class="form-control" id="company_name" name="company_name" required>
                        <div class="error" id="error-company_name"></div>
                    </div>
                    <div class="form-group">
                        <label for="registration_number">Reģistrācijas numurs</label>
                        <input type="text" class="form-control" id="registration_number" name="registration_number" required>
                        <div class="error" id="error-registration_number"></div>
                    </div>
                    <div class="form-group">
                        <label for="vat_code">PVN kods</label>
                        <input type="text" class="form-control" id="vat_code" name="vat_code" required>
                        <div class="error" id="error-vat_code"></div>
                    </div>
                    <h6>Juridiskā adrese</h6>
                    <div class="form-group">
                        <label for="street_l_a">Iela</label>
                        <input type="text" class="form-control" id="street_l_a" name="street_l_a" required>
                        <div class="error" id="error-street_l_a"></div>
                    </div>
                    <div class="form-group">
                        <label for="city_l_a">Pilsēta</label>
                        <input type="text" class="form-control" id="city_l_a" name="city_l_a">
                        <div class="error" id="error-city_l_a"></div>
                    </div>
                    <div class="form-group">
                        <label for="village_l_a">Ciems</label>
                        <input type="text" class="form-control" id="village_l_a" name="village_l_a">
                        <div class="error" id="error-village_l_a"></div>
                    </div>
                    <div class="form-group">
                        <label for="country_l_a">Valsts</label>
                        <input type="text" class="form-control" id="country_l_a" name="country_l_a">
                        <div class="error" id="error-country_l_a"></div>
                    </div>
                    <div class="form-group">
                        <label for="postcode_l_a">Pasta indekss</label>
                        <input type="text" class="form-control" id="postcode_l_a" name="postcode_l_a">
                        <div class="error" id="error-postcode_l_a"></div>
                    </div>
                    <h6>Fiziskā adrese</h6>
                    <div class="form-group">
                        <label for="street_a_a">Iela</label>
                        <input type="text" class="form-control" id="street_a_a" name="street_a_a" required>
                        <div class="error" id="error-street_a_a"></div>
                    </div>
                    <div class="form-group">
                        <label for="city_a_a">Pilsēta</label>
                        <input type="text" class="form-control" id="city_a_a" name="city_a_a">
                        <div class="error" id="error-city_a_a"></div>
                    </div>
                    <div class="form-group">
                        <label for="village_a_a">Ciems</label>
                        <input type="text" class="form-control" id="village_a_a" name="village_a_a">
                        <div class="error" id="error-village_a_a"></div>
                    </div>
                    <div class="form-group">
                        <label for="country_a_a">Valsts</label>
                        <input type="text" class="form-control" id="country_a_a" name="country_a_a">
                        <div class="error" id="error-country_a_a"></div>
                    </div>
                    <div class="form-group">
                        <label for="postcode_a_a">Pasta indekss</label>
                        <input type="text" class="form-control" id="postcode_a_a" name="postcode_a_a">
                        <div class="error" id="error-postcode_a_a"></div>
                    </div>
                    <h6>Kontaktpersona</h6>
                    <div class="form-group">
                        <label for="head_name">Vārds</label>
                        <input type="text" class="form-control" id="head_name" name="head_name">
                        <div class="error" id="error-head_name"></div>
                    </div>
                    <div class="form-group">
                        <label for="head_surname">Uzvārds</label>
                        <input type="text" class="form-control" id="head_surname" name="head_surname">
                        <div class="error" id="error-head_surname"></div>
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
                        <label for="email">E-pasts</label>
                        <input type="email" class="form-control" id="email" name="email">
                        <div class="error" id="error-email"></div>
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
                        <label for="homepage">Mājas lapa</label>
                        <input type="text" class="form-control" id="homepage" name="homepage">
                        <div class="error" id="error-homepage"></div>
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