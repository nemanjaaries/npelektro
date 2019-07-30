<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Mail\VerifyUser;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth.role:manager,admin,user');
    }
    public function index()
    {
        $users = User::all();
        return response()->json([
            'data' => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return response()->json([
        //     'message' => 'Uspesno'
        // ]);
        if($request->user()->role !== "admin"){
            return response()->json([
                'success' => false,
                'message' => 'Nedozvoljen pristup'
            ], 422);
        }

        $validator = Validator::make($request->all(), [
            'username' => ['required', 'string', 'min:3', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'max:15'],
        ]);
        if(!$validator->fails()){
            $verificationToken = str_random(64);
            $newUser = User::create([
                'username' => $request->get('username'),
                'email' => $request->get('email'),
                'password' => Hash::make($request->get('password')),
            ]);
            DB::table('user_verifications')->insert(['user_id'=>$newUser->id,'token'=>$verificationToken]);

            $data = [
                'username' => $request->get('username'),
                'token' => $verificationToken
            ];

            Mail::to($request->get('email'))->send(new VerifyUser($data));

            return response()->json([
                'success' => true,
                'title' => 'Kreiranje Uspesno',
                'message' => 'Uspesno ste dodali novog korisnika',
                'data' => $newUser,
            ], 200);
        }    
        

        return response()->json([
            'success' => false,
            'errors' => $validator->errors()
        ], 422);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return response()->json([
            'data' => $user
        ]);
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
        if($request->user()->id !== (int) $id){
            return response()->json([
                'success' => false,
                'message' => 'Nedozvoljen pristup'
            ], 422);
        }

        $validator = Validator::make($request->all(), [
            'username' => ['nullable', 'string', 'min:3', 'max:15'],
            'email' => ['nullable', 'string', 'email', 'max:255'],
            'password' => ['nullable', 'string', 'min:8', 'max:15'],
        ]);

        if($validator->fails()){
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::find($id);
        if($request->get('username'))
            $user->username = $request->get('username');
        if($request->get('email'))
            $user->email = $request->get('email');
        if($request->get('password'))
            $user->password = Hash::make($request->get('password'));

        
        $user->save();

        return response()->json([
            'title' => 'Azuriranje Uspelo',
            'message' => 'Uspesno ste promenili korisnika'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        
        $user->delete();
        return response()->json([
            'message' => 'Uspesno ste uklonili korisnika'
        ], 200);
    }
}
