<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use App\User;

class ChangePasswordController extends Controller
{
    public function process(ChangePasswordRequest $request){
        return $this->getPasswordResetTableRow($request)->count()>0 ? $this->changePassword($request) : $this->tokenNotFoundResponse();

    }

    private function changePassword($request){

        $user = User::where('email',$request->email);
        $user->update(['password'=>bcrypt($request->password)]);

        $this->getPasswordResetTableRow($request)->delete();


        return response()->json([
            'data' => 'Contraseña Cambiada con éxito!'],
            Response::HTTP_CREATED);
    }

    private function getPasswordResetTableRow($request){
        return DB::table('password_resets')->where(['email' => $request->email, 'token' =>$request->resetToken]);
    }

    public function tokenNotFoundResponse(){
        return response()->json([
            'error'=> 'Token o Email no son correctos!'
        ],Response::HTTP_UNPROCESSABLE_ENTITY);
    }
    //
}
