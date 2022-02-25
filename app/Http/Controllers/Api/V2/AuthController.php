<?php

namespace Inspirium\Http\Controllers\Api\V2;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inspirium\Http\Controllers\Controller;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }

        return new JsonResponse(['employee' => Auth::user(), 'token' => Auth::user()->createToken('Nuxt')], 200);
    }
}
