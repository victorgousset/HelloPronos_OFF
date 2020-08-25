<?php


namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    public function RegisterForm()
    {
        return view('User/register');
    }

    private function verifEmail($email)
    {
        $verif = DB::select('SELECT * FROM user WHERE email = :email', ['email' => $email]);

        if ($verif == null) {
            return null;
        } else {
            return true;
        }
    }

    public function RegisterFormPost(Request $request)
    {
        $this->validate($request, [
            'nom' => 'required|max:250',
            'prenom' => 'required|max:250',
            'email' => 'bail|required|email',
            'password' => 'required|max:250',
            'date_naissance' => 'required',
            'genre' => 'required'
        ]);

        if ($this->verifEmail($request->email) == null)
        {
            if (!empty($request->nom) && !empty($request->prenom) && !empty($request->email) &&
                !empty($request->password) && !empty($request->date_naissance) && !empty($request->genre))
            {
                DB::table('user')->insert(
                    [
                        'nom' => $request->nom,
                        'prenom' => $request->prenom,
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                        'date_naissance' => $request->date_naissance,
                        'genre' => $request->genre,
                        'created_at' => now()
                    ]);

                return redirect(url('/profil'));
            }
        } else if($this->verifEmail($request->email) == true) {
            return Redirect::action('User\RegisterController@RegisterForm')
                ->withErrors(['Adresse email non disponible', 'Email déjà utilisé']);
        }
    }
}
