<?php

namespace App\Http\Controllers;

use App\Http\Requests\forgottenPasswordRequest;
use App\Http\Requests\OtpCodeRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Interfaces\AuthenticationInterface;

use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    private AuthenticationInterface $authInterface;
    public function __construct(AuthenticationInterface $authInterface)
    {
        $this->authInterface = $authInterface;
    }


    public function login(LoginRequest $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->email,
        ];
        try {
            if ($this->authInterface->login($data))
                return redirect()->route('home');
            else
                return back()->with('error', 'Email ou mot de passe incorrect(s).');
        } catch (\Exception $ex) {
            return back()->with('error', 'une erreur est survnue lors du traitement, Réessayez !');
        }
    }

    public function registration(RegistrationRequest $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->email,
        ];

        try {
            $user = $this->authInterface->registration($data);
            Auth::login($user);

            return redirect()->route('home');
        } catch (\Exception $ex) {
            return back()->with('error', 'une erreur est survnue lors du traitement, Réessayez !');
        }
    }


    public function forgottenPassword(ForgottenPasswordRequest $request)
    {
        $data = [
            'email' => $request->email,
        ];

        try {

            if ($this->authInterface->forgottenPassword($data['email']))
                return redirect()->route('otpCode');
            else
                return back()->with('error', 'Email non trouvé.');

        } catch (\Exception $ex) {
            return back()->with('error', 'Une erreur est survenue lors du traitement, Réessayez !');
        }
    }

    public function checkOtpCode(OtpCodeRequest $request)
    {
        $data = [
            'email' => $request->email,
            'code' => $request->code,
        ];

        try {

            $code = $this->authInterface->checkOtpCode($data);

            if (!$code)
                return back()->with('error', 'Code de confirmation invalide.');
            else
                return redirect()->route('newPassword');

        } catch (\Exception $ex) {
            return back()->with('error', 'Une erreur est survnue lors du traitement, Reessayez !');
        }
    }

    public function newPassword(OtpCodeRequest $request)
    {

        $data = [
            'email' => $request->email,
            'password' => $request->password,
            'passwordConfirm' => $request->passwordConfirm,
            'code' => $request->code,
        ];
        try {

            $user = $this->authInterface->newPassword($data);

            if (!$user)
                return back()->with('error', 'Impossible de faire la mise à jour, reprendre. ');
            else
                return redirect()->route('home');
            
        } catch (\Exception $ex) {
            return back()->with('error', 'Une erreur est survenue lors du traitement, Réessayez !');
        }
    }
    
}
