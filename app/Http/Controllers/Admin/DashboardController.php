<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Customer;
use App\News;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DashboardController extends AdminController
{

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout', 'index');
        $this->middleware('permission:dashboard')->except('getLogin', 'login', 'logout');

    }

    public function index()
    {
        $newsCount = News::all()->count();
        $videosCount = Video::all()->count();
        $customersCount = Customer::all()->count();
        $categoriesCount = Category::all()->count();

        return view('admin.dashboard', compact('newsCount', 'videosCount', 'customersCount', 'categoriesCount'));
    }

    public function getLogin()
    {
      return view('admin.login');
    }

    public function login(Request $request)
    {

        Validator::make($request->only(['email', 'password']), [
            'email' => 'required|email',
            'password' => 'required',
        ]);


        if (Auth::guard('admin')
            ->attempt(['email' => $request->get('email'),
                        'password' => $request->get('password'),
                            'active' => 1])
        )
        {
            // Authentication passed...
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('admin.login')->with('error', 'كلمة المرور او البريد الالكتروني خاطئ');

    }

    public function logout()
    {
        Auth::guard('admin')->logout();
       return redirect()->route('admin.login');



    }


}
