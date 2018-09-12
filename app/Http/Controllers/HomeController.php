<?php

namespace App\Http\Controllers;

use App\Enquiry;
use Illuminate\Http\Request;
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
        if(Auth::user()->mobile == 0){
            return view('auth.mobile');

        }
        $enquiries = Enquiry::whereUserId(Auth::user()->id)
                            ->paginate(10);
        return view('enquiries.enquiries',compact('enquiries',$enquiries));
    }
}
