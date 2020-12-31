<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * returning all customers for admin view
     * @route_name =  customers
     * @view_name = customers
     */
    public function  customers() {
        if (Auth::user()->role_id == 1){
            $data  = User::where('role_id', '!=', 1)->paginate(10);
            return view('customers', ['data'=> $data]);
        }else {
            return redirect()->route('dashboard')->with('access-error', 'Sorry you can not access this page');
        }

    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @route_name = customer-destroy
     */
    public function destroy($id) {
        $data = User::find($id);
        $data->delete();
        return redirect()->route('customers')->with('success', 'Customer details deleted successfully');
    }
}
