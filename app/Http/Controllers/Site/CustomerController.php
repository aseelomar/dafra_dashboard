<?php

namespace App\Http\Controllers\Site;
use App\Customer;
use App\Http\Controllers\Controller;
use App\Http\Requests\Site\CustomerLoginRequest;
use App\Http\Requests\Site\CustomerRegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function signup()
    {
        return view('site.signup');

    }
    public function login(){
        return view('site.login');
    }

    public function register(CustomerRegisterRequest $request)
    {

        $customer = new Customer();

        $customer->fill($request->only([
            'firstName', 'familyName', 'email', 'password'
        ]));


       $customer->name = $request->firstName . ' ' . $request->familyName;

       $customer->save();

        return redirect()->route('site.home');

    }

    public function getLogin(CustomerLoginRequest $request)
    {

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
           return redirect()->route('site.home');
        } else {

            return redirect()->back();

        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('site.home');

    }
}
