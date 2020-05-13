<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //on verifie si l'user a mis à jour son profil
        $user = Auth::user();
        $user_id = $user->id;
        $user_info = User::where('id', $user_id)->first();
        if ($user_info->profession == "vide" && $user_info->competences == "vide" && $user_info->telephone == "vide" && $user_info->ville == "vide" && $user_info->adresse == "vide" && $user_info->description == "vide") {
            $msg = 1;
        } else {
            $msg = 0;
        }

        return view('user.home', [
            'msg' => $msg,
            'user_info' => $user_info
        ]);
    }
}
