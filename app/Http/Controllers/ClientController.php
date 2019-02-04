<?php

namespace App\Http\Controllers;

use Validator;
use Response;
use App\Client;
use App\Bank;
use Illuminate\Http\Request;


class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banks = Bank::all();
        return view('pages.clients', ['banks' => $banks]);
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
                'company_name' => 'max:32|unique:clients,company_name|required',
                'registration_number' => 'max:32',
                'vat_code' => 'max:12',
                'street_l_a' => 'max:50',
                'city_l_a' => 'max:32',
                'village_l_a' => 'max:32',
                'country_l_a' => 'max:32',
                'postcode_l_a' => 'max:10',
                'street_a_a' => 'max:50',
                'city_a_a' => 'max:32',
                'village_a_a' => 'max:32',
                'country_a_a' => 'max:32',
                'postcode_a_a' => 'max:10',
                'head_name' => 'max:32',
                'head_surname' => 'max:32',
                'mobile_phone_number' => 'max:32',
                'phone_number' => 'max:32',
                'fax' => 'max:32',
                'email' => 'max:191|email|required',
                'bank_id' => '',
                'bank_account_number' => 'max:50',
                'homepage' => 'max:50',
            ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Response::json(['errors' => $validator->getMessageBag()]);
        }
        $client = new Client();
        $client->company_name = $request->company_name;
        $client->registration_number = $request->registration_number;
        $client->vat_code = $request->vat_code;
        $client->street_l_a = $request->street_l_a;
        $client->city_l_a = $request->city_l_a;
        $client->village_l_a = $request->village_l_a;
        $client->country_l_a = $request->country_l_a;
        $client->postcode_l_a = $request->postcode_l_a;
        $client->street_a_a = $request->street_a_a;
        $client->city_a_a = $request->city_a_a;
        $client->village_a_a = $request->village_a_a;
        $client->country_a_a = $request->country_a_a;
        $client->postcode_a_a = $request->postcode_a_a;
        $client->head_name = $request->head_name;
        $client->head_surname = $request->head_surname;
        $client->mobile_phone_number = $request->mobile_phone_number;
        $client->phone_number = $request->phone_number;
        $client->fax = $request->fax;
        $client->email = $request->email;
        $client->bank_id = $request->bank_id;
        $client->bank_account_number = $request->bank_account_number;
        $client->homepage = $request->homepage;
        $client->save();
        return response()->json(['message' => 'Klients pievienots!']);
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
        $client = Client::with('banks')
            ->select('id',
            'company_name',
            'registration_number',
            'vat_code',
            'street_l_a',
            'city_l_a',
            'village_l_a',
            'country_l_a',
            'postcode_l_a',
            'street_a_a',
            'city_a_a',
            'village_a_a',
            'country_a_a',
            'postcode_a_a',
            'homepage',
            'head_name',
            'head_surname',
            'mobile_phone_number',
            'phone_number',
            'fax',
            'email',
            'bank_id',
            'bank_account_number')->findOrFail($id);
        return response()->json($client);
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
                'company_name' => 'required|max:32|unique:clients,company_name,'.$id,
                'registration_number' => 'max:32',
                'vat_code' => 'max:12',
                'street_l_a' => 'max:50',
                'city_l_a' => 'max:32',
                'village_l_a' => 'max:32',
                'country_l_a' => 'max:32',
                'postcode_l_a' => 'max:10',
                'street_a_a' => 'max:50',
                'city_a_a' => 'max:32',
                'village_a_a' => 'max:32',
                'country_a_a' => 'max:32',
                'postcode_a_a' => 'max:10',
                'head_name' => 'max:32',
                'head_surname' => 'max:32',
                'mobile_phone_number' => 'max:32',
                'phone_number' => 'max:32',
                'fax' => 'max:32',
                'email' => 'max:191|email|required',
                'bank_id' => '',
                'bank_account_number' => 'max:50',
                'homepage' => 'max:50',

            ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        $client = Client::findOrFail($id);
        $client->company_name = $request->company_name;
        $client->registration_number = $request->registration_number;
        $client->vat_code = $request->vat_code;
        $client->street_l_a = $request->street_l_a;
        $client->city_l_a = $request->city_l_a;
        $client->village_l_a = $request->village_l_a;
        $client->country_l_a = $request->country_l_a;
        $client->postcode_l_a = $request->postcode_l_a;
        $client->street_a_a = $request->street_a_a;
        $client->city_a_a = $request->city_a_a;
        $client->village_a_a = $request->village_a_a;
        $client->country_a_a = $request->country_a_a;
        $client->postcode_a_a = $request->postcode_a_a;
        $client->head_name = $request->head_name;
        $client->head_surname = $request->head_surname;
        $client->mobile_phone_number = $request->mobile_phone_number;
        $client->phone_number = $request->phone_number;
        $client->fax = $request->fax;
        $client->email = $request->email;
        $client->bank_id = $request->bank_id;
        $client->bank_account_number = $request->bank_account_number;
        $client->homepage = $request->homepage;
        $client->save();
        return response()->json(['message' => 'Klienta dati atjaunoti!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
        return response()->json(['message' => 'Klients dzēsts!']);
    }

    public function data()
    {
        $clients = Client::with('banks')->get();
        return response()->json($clients);
    }
}
