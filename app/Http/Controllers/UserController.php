<?php

namespace App\Http\Controllers;

use Validator;
use Response;
use App\User;
use App\Bank;
use App\UserStatus;
use App\UserRole;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banks = Bank::all();
        $roles = UserRole::all();
        $status = UserStatus::all();
        return view('pages.users', ['banks' => $banks, 'roles' => $roles, 'statuses' => $status]);
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules =
            [
                'first_name' => 'required|max:32',
                'last_name' => 'required|max:32',
                'personal_code' => 'max:12',
                'position' => 'max:32',
                'street' => 'max:50',
                'city' => 'max:32',
                'village' => 'max:32',
                'country' => 'max:32',
                'postcode' => 'max:10',
                'mobile_phone_number' => 'max:32',
                'phone_number' => 'max:32',
                'fax' => 'max:32',
                'email' => 'required|max:191|email|unique:users,email',
                'password' => 'max:191|required',
                'bank_id' => '',
                'bank_account_number' => 'max:50',
                'role_id' => 'required',
                'status_id' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return Response::json(['errors' => $validator->getMessageBag()]);
            }
            $user = new User();
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->personal_code = $request->personal_code;
            $user->position = $request->position;
            $user->street = $request->street;
            $user->city = $request->city;
            $user->village = $request->village;
            $user->country = $request->country;
            $user->postcode = $request->postcode;
            $user->mobile_phone_number = $request->mobile_phone_number;
            $user->phone_number = $request->phone_number;
            $user->fax = $request->fax;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->bank_id = $request->bank_id;
            $user->bank_account_number = $request->bank_account_number;
            $user->role_id = $request->role_id;
            $user->status_id = $request->status_id;

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $name = str_slug($request->personal_code).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/users');
            $image->move($destinationPath, $name);
            $user->photo = $name;
        }
            $user->save();
            return response()->json(['message' => 'Lietotājs pievienots!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $user = User::with('banks', 'user_roles', 'user_statuses')
            ->select(
                'id',
                'first_name',
                'last_name',
                'personal_code',
                'position',
                'street',
                'city',
                'village',
                'country',
                'postcode',
                'mobile_phone_number',
                'phone_number',
                'fax',
                'email',
                'bank_id',
                'bank_account_number',
                'status_id',
                'role_id')->findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules =
            [
                'first_name' => 'required|max:32',
                'last_name' => 'required|max:32',
                'personal_code' => 'max:12',
                'position' => 'max:32',
                'street' => 'max:50',
                'city' => 'max:32',
                'village' => 'max:32',
                'country' => 'max:32',
                'postcode' => 'max:10',
                'mobile_phone_number' => 'max:32',
                'phone_number' => 'max:32',
                'fax' => 'max:32',
                'email' => 'required|max:191|email|unique:users,email,'.$id,
                'password' => 'max:191',
                'bank_id' => '',
                'bank_account_number' => 'max:50',
                'role_id' => 'required',
                'status_id' => 'required',
            ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        $user = User::findOrFail($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->personal_code = $request->personal_code;
        $user->position = $request->position;
        $user->street = $request->street;
        $user->city = $request->city;
        $user->village = $request->village;
        $user->country = $request->country;
        $user->postcode = $request->postcode;
        $user->mobile_phone_number = $request->mobile_phone_number;
        $user->phone_number = $request->phone_number;
        $user->fax = $request->fax;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->bank_id = $request->bank_id;
        $user->bank_account_number = $request->bank_account_number;
        $user->role_id = $request->role_id;
        $user->status_id = $request->status_id;
        $user->save();
        return response()->json(['message' => 'Lietotāja dati atjaunoti!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['message' => 'Lietotājs dzēsts!']);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function data()
    {
        $users = User::with('banks', 'user_roles', 'user_statuses')->get();
        return response()->json($users);
    }
}
