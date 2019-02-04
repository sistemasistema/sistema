@extends('layouts.default')
@section('content')
    <section id="clients">
        <div class="container-fluid">
            <h2 class="text-center">Klienti</h2>
            <div class="mt-2 mb-5 mr-2 text-right">
                <button type="button" class="btn btn-primary add-button">Pievienot</button>
            </div>
            <table id="clients-table" class="table table-striped table-bordered table-responsive table-hover bg-white">
                <thead class="text-center">
                <tr>
                    <th scope="col" rowspan="2">ID</th>
                    <th scope="col" rowspan="2">Uzņēmuma nosaukums</th>
                    <th scope="col" rowspan="2">Reģistrtrācijas numurs</th>
                    <th scope="col" rowspan="2">PVN kods</th>
                    <th scope="col" colspan="5">Juridiskā adrese</th>
                    <th scope="col" colspan="5">Faktiskā adrese</th>
                    <th scope="col" colspan="6">Kontaktpersona</th>
                    <th scope="col" rowspan="2">Banka</th>
                    <th scope="col" rowspan="2">Bankas kods</th>
                    <th scope="col" rowspan="2">Bankas konta numurs</th>
                    <th scope="col" rowspan="2">Mājas lapa</th>
                </tr>
                <tr>
                    <th scope="col">Iela</th>
                    <th scope="col">Pilsēta</th>
                    <th scope="col">Ciems</th>
                    <th scope="col">Valsts</th>
                    <th scope="col">Pasta indekss</th>
                    <th scope="col">Iela</th>
                    <th scope="col">Pilsēta</th>
                    <th scope="col">Ciems</th>
                    <th scope="col">Valsts</th>
                    <th scope="col">Pasta indekss</th>
                    <th scope="col">Vārds</th>
                    <th scope="col">Uzvārds</th>
                    <th scope="col">Mobilā telefona numurs</th>
                    <th scope="col">Telefona numurs</th>
                    <th scope="col">Fakss</th>
                    <th scope="col">E-pasts</th>
                </tr>
                </thead>
            </table>
            @include('includes.modals.clients.create')
            @include('includes.modals.clients.edit')
            @include('includes.modals.delete')
        </div>
    </section>
@endsection