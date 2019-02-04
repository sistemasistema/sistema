<?php

namespace App\Http\Controllers;

use Validator;
use Response;
use App\CarPart;
use App\Manufacturer;
use App\CarPartCard;
use App\ProductGroup;
use App\ProductSubgroup;
use Illuminate\Http\Request;

class CarPartCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productGroups = ProductGroup::all();
        $productSubgroups = ProductSubgroup::all();
        return view('pages.car-parts.car-part-cards', ['productGroups' => $productGroups, 'productSubgroups' => $productSubgroups]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules =
            [
                'model' => 'max:255|required',
                'title' => 'max:255',
                'product_group_id' => 'required',
                'product_subgroup_id' => 'required',
                'size' => 'max:32',
                'weight' => 'max:32',

            ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Response::json(['errors' => $validator->getMessageBag()]);
        }
        $carPartCard = new CarPartCard();
        $carPartCard->model = $request->model;
        $carPartCard->title = $request->title;
        $carPartCard->product_subgroup_id = $request->product_subgroup_id;
        $carPartCard->size = $request->size;
        $carPartCard->weight = $request->weight;
        $carPartCard->save();
        return response()->json(['message' => 'Rezerves daļu kartiņa pievienota!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productGroups = ProductGroup::all();
        $productSubgroups = ProductSubgroup::all();
        $carPartCard = CarPartCard::findOrFail($id);
        $manufacturers = Manufacturer::all();
        return view('pages.car-parts.car-part-card', ['carPartCard' => $carPartCard, 'productGroups' => $productGroups, 'productSubgroups' => $productSubgroups, 'manufacturers' => $manufacturers]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carPartCard = CarPartCard::findOrFail($id);
        $productGroup = ProductSubgroup::select('product_group_id')->where('id', $carPartCard->product_subgroup_id)->first();
        $carPartCardData = array_merge(json_decode($carPartCard,true), json_decode($productGroup,true));
        $productSubgroups = ProductSubgroup::select('id', 'title')->where('product_group_id', $productGroup->product_group_id)->get();
        return response()->json(['car_part_card' => $carPartCardData, 'product_subgroups' => $productSubgroups]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules =
            [
                'model' => 'max:255|required',
                'title' => 'max:255',
                'product_group_id' => 'required',
                'product_subgroup_id' => 'required',
                'size' => 'max:32',
                'weight' => 'max:32',

            ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Response::json(['errors' => $validator->getMessageBag()]);
        }
        $carPartCard = CarPartCard::findOrFail($id);
        $carPartCard->model = $request->model;
        $carPartCard->title = $request->title;
        $carPartCard->product_subgroup_id = $request->product_subgroup_id;
        $carPartCard->size = $request->size;
        $carPartCard->weight = $request->weight;
        $carPartCard->save();
        return response()->json(['message' => 'Rezerves daļu kartiņa atjaunota!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carPartCard = CarPartCard::findOrFail($id);
        $carPartCard->delete();
        // return response()->json(['message' => 'Rezerves daļu kartiņa ir dzēsta!']);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function data()
    {
        $carPartCards = CarPartCard::with('product_subgroups.product_groups')->get();
        return response()->json($carPartCards);
    }

    public function image(Request $request) {
        return("asdfgb");
    }
}
