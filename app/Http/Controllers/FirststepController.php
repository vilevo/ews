<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;

class FirststepController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //
    }

    /**
     * Permet de mettre à jours les informations perso de l'user à son first log apres la création du compte
     */
    public function update_info(Request $request)
    {
        $user = Auth::user();
        $user_id = $user->id;
        $this->validate($request, [
            'profession' => 'required',
            'telephone' => 'required',
            'ville' => 'required',
            'adresse' => 'required',
            'competences' => 'required',
            'description' => 'required'
        ]);
        $checked = "";
        $check_competences = $request->input('competences');
        foreach ($check_competences as $check_competence) {
            $checked .= $check_competence . ",";
        }
        $data = array(
            'profession' => $request->input('profession'),
            'competences' => $checked,
            'telephone' => $request->input('telephone'),
            'ville' => $request->input('ville'),
            'adresse' => $request->input('adresse'),
            'description' => $request->input('description')
        );
        $user_exits = User::select('id')->where('id', $user_id)->count();
        if ($user_exits == 1) {
            $update = User::where('id', $user_id)->update($data);
            if ($update) {
                return redirect('user/home')->with('status', 'Vos informations personelles ont été mise à jour avec succès!');
            }
        } else {
            return view(
                'user.error',
                [
                    'error' => true,
                    'message' => 'cet post n\'exsite pas'
                ]
            );
        }
    }
}
