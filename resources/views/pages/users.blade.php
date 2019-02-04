@extends('layouts.default')
@section('content')
    <section id="users">
        <div class="container-fluid">
            <h2 class="text-center">{{ __('menu.users') }}</h2>
            <div class="mt-2 mb-5 mr-2 text-right">
                <button type="button" class="btn btn-primary add-button">{{ __('table.add') }}</button>
            </div>
            <table id="users-table" class="table table-striped table-bordered table-responsive table-hover bg-white">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">{{ __('table.first_name') }}</th>
                    <th scope="col">{{ __('table.last_name') }}</th>
                    <th scope="col">{{ __('table.personal_code') }}</th>
                    <th scope="col">{{ __('table.position') }}</th>
                    <th scope="col">{{ __('table.street') }}</th>
                    <th scope="col">{{ __('table.city') }}</th>
                    <th scope="col">{{ __('table.village') }}</th>
                    <th scope="col">{{ __('table.country') }}</th>
                    <th scope="col">{{ __('table.postcode') }}</th>
                    <th scope="col">{{ __('table.mobile_phone_number') }}</th>
                    <th scope="col">{{ __('table.phone_number') }}</th>
                    <th scope="col">{{ __('table.fax') }}</th>
                    <th scope="col">{{ __('table.email') }}</th>
                    <th scope="col">{{ __('table.bank') }}</th>
                    <th scope="col">{{ __('table.bank_code') }}</th>
                    <th scope="col">{{ __('table.bank_account_number') }}</th>
                    <th scope="col">{{ __('table.role') }}</th>
                    <th scope="col">{{ __('table.status') }}</th>
                </tr>
                </thead>
            </table>


            @include('includes.modals.users.create')
            @include('includes.modals.users.edit')
            @include('includes.modals.delete')
        </div>
    </section>
@endsection