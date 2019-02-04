@extends('layouts.default')
@section('content')
    <section id="purchases">
        <div class="container-fluid">
            <h2 class="text-center">Iepirkumi</h2>
            <div class="mt-2 mb-5 mr-2 text-right">
                <button type="button" class="btn btn-primary add-button">Pievienot</button>
            </div>
            <table id="purchases-table" class="table table-striped table-bordered table-hover bg-white">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Rēķina numurs</th>
                    <th scope="col">Summa bez PVN</th>
                    <th scope="col">PVN</th>
                    <th scope="col">Summa ar PVN</th>
                    <th scope="col">Iepirkuma datums</th>
                    <th scope="col">Apmaksas datums</th>
                </tr>
                </thead>
            </table>
        </div>
    </section>
@endsection