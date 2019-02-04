<?php

namespace App\Http\Controllers;

use Validator;
use Response;
use App\CarPart;
use Illuminate\Http\Request;

class CarPartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
                'original_code' => 'max:32|required',
                'manufacturer_id' => 'required',
            ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Response::json(['errors' => $validator->getMessageBag()]);
        }
        $carPart = new CarPart();
        $carPart->original_code = $request->original_code;
        $carPart->manufacturer_id = $request->manufacturer_id;
        $carPart->car_part_card_id = $request->car_part_card_id;
        $carPart->save();
        return response()->json(['message' => 'Rezerves daļa pievienota!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carPart = CarPart::findOrFail($id);
        return response()->json($carPart);
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
                'original_code' => 'max:32|required',
                'manufacturer_id' => 'required',
            ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Response::json(['errors' => $validator->getMessageBag()]);
        }
        $carPart = CarPart::findOrFail($id);
        $carPart->original_code = $request->original_code;
        $carPart->manufacturer_id = $request->manufacturer_id;
        $carPart->save();
        return response()->json(['message' => 'Rezerves daļa atjaunota!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carPart = CarPart::findOrFail($id);
        $carPart->delete();
        return response()->json(['message' => 'Rezerves daļa ir dzēsta!']);
    }


    public function data($id)
    {
        $carParts = CarPart::where('car_part_card_id', $id)->with('manufacturers')->get();
        return response()->json($carParts);
    }
}
