@extends('layouts.default')
@section('content')
    <section id="carPartCards">
        <div class="container">
            <h2 class="text-center">Rezerves daļu kartiņas</h2>
            <div class="mt-2 mb-5 mr-2 text-right">
                <button type="button" class="btn btn-primary add-button">Pievienot</button>
            </div>
            <table id="car-part-cards-table" class="table table-striped table-bordered table-hover bg-white">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Modelis</th>
                    <th scope="col">Nosaukums</th>
                    <th scope="col">Grupa</th>
                    <th scope="col">Apakšgrupa</th>
                    <th scope="col">Izmērs</th>
                    <th scope="col">Svars</th>
                </tr>
                </thead>
            </table>
            @include('includes.modals.car-part-cards.create')
            @include('includes.modals.delete')
        </div>
    </section>
@endsection