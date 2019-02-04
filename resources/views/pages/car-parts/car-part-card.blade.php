@extends('layouts.default')
@section('content')
    <section id="carPartCard">
        <div class="container">
            <div class="card mb-5">
                <div class="card-body">
                    <button type="button" class="btn btn-primary edit-button float-right">Rediģēt</button>
                    <h2 class="card-title">Rezerves daļas kartiņa</h2>
                    <form>
                        <div class="form-group">
                            <label for="id">ID</label>
                            <input type="text" class="form-control" id="id" value="{{ $carPartCard->id }}">
                        </div>
                        <div class="form-group">
                            <label for="model">Modelis</label>
                            <input type="text" class="form-control" id="model-card" value="{{ $carPartCard->model }}">
                        </div>
                        <div class="form-group">
                            <label for="title">Nosaukums</label>
                            <input type="text" class="form-control" id="title-card" value="{{ $carPartCard->title }}">
                        </div>
                        <div class="form-group">
                            <label for="title">Grupa</label>
                            <input type="text" class="form-control" id="product-group-card" value="{{ $carPartCard->product_subgroups->product_groups['title'] }}">
                        </div>
                        <div class="form-group">
                            <label for="title">Apakšgrupa</label>
                            <input type="text" class="form-control" id="product-subgroup-card" value="{{ $carPartCard->product_subgroups['title'] }}">
                        </div>
                        <div class="form-group">
                            <label for="title">Izmērs</label>
                            <input type="text" class="form-control" id="size-card" value="{{ $carPartCard->size }}">
                        </div>
                        <div class="form-group">
                            <label for="title">Svars</label>
                            <input type="text" class="form-control" id="weight-card" value="{{ $carPartCard->weight }}">
                        </div>
                    </form>
                </div>
            </div>
            <div class="mt-2 mb-5 mr-2 text-right">
                <button type="button" class="btn btn-primary add-button">Pievienot</button>
            </div>
            <table id="car-parts-table" class="table table-striped table-bordered table-hover bg-white">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Oriģinālais kods</th>
                    <th scope="col">Ražotājs</th>
                </tr>
                </thead>
            </table>

            <div class="card">
                {{--<div class="card-body">--}}
                    {{--<form action="{{action('CarPartCardController@image')}}" method="GET">--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="image">Bilde</label>--}}
                            {{--<input type="file" class="form-control" id="image" name="image">--}}
                        {{--</div>--}}
                        {{--<input type="text" style="display: none;" name="id" value="{{ $carPartCard->id }}">--}}
                        {{--<button type="submit" class="btn btn-primary">Pievienot</button>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
            @include('includes.modals.car-part-cards.edit')
            @include('includes.modals.car-parts.create')
            @include('includes.modals.car-parts.edit')
            @include('includes.modals.delete')
        </div>
    </section>
@endsection