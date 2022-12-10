<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password as RulesPassword;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function showLoginView(Request $request)
    {
        $validator = Validator(
            ['guard' => $request->guard],
            ['guard' => 'required|string|in:admin,user']
        );
        if (!$validator->fails()) {
            session()->put('guard', $request->guard);
            return response()->view('cms.auth.login',['guard'=>$request->guard]);
        } else {
            abort(Response::HTTP_NOT_FOUND);
        }
    }

    public function login(Request $request)
    {
        $validator = Validator($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:3',
            'remember' => 'required|boolean',
        ]);

        if (!$validator->fails()) {
            $credentials = [
                'email' => $request->input('email'),
                'password' => $request->input('password'),
            ];
            if (Auth::guard(session()->get('guard'))->attempt($credentials, $request->input('remember'))) {
                return response()->json(['message' => 'Logged in successfully']);
            } else {
                return response()->json(['message' => 'Login failed, check credentials'], Response::HTTP_BAD_REQUEST);
            }
        } else {
            return response()->json(
                ['message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST
            );
        }
    }
    public function profilePersonalInformation(Request $request)
    {
        $user = auth('admin')->user();
        return response()->view('cms.auth.profile.personal-information', ['user' => $user]);
    }


    public function editPassword(Request $request)
    {
        $user = auth('admin')->user();
        return response()->view('cms.auth.profile.change-password', ['user' => $user]);
    }


    public function updatePassword(Request $request)
    {
        $validator = Validator($request->all(), [
            'current_password' => 'required|current_password:' .'admin',
            'new_password' => [
                'required', 'confirmed',
                RulesPassword::min(8)
                    ->symbols()
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->uncompromised(),
            ],
        ]);
        if (!$validator->fails()) {
            // $user = auth('admin')->user();
            $user = $request->user();
            $user->forceFill([
                'password' => Hash::make($request->input('new_password')),
            ]);
            $isSaved = $user->save();
            return response()->json(
                ['message' => $isSaved ? 'Password Changed successfully' : 'Failed to change password!'],
                $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST
            );
        } else {
            return response()->json(
                ['message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST,
            );
        }
    }




    public function updateProfilePersonalInformation(Request $request)
    {
        // $guard = auth('admin')->check() ? 'admin' : 'store';
        $user = auth('admin')->user();

        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3',
            'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email' => "required|string|email|unique:admins,email," . $user->id,
        ]);

        if (!$validator->fails()) {
            $user->name = $request->get('name');
            $user->mobile = $request->get('mobile');
            $user->email = $request->get('email');
            $isSaved = $user->save();
            return response()->json(['message' => $isSaved ? __('cms.update_success') : __('cms.update_failed')], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function logout(Request $request)
    {
        // dd($request->guard);
        $guard = session('guard');
        Auth::guard($guard)->logout();
        $request->session()->invalidate();
        return redirect()->route('cms.login', $guard);

        
    }
}
