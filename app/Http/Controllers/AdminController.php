<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        if (session()->has('admin_email')) {
            return redirect()->route('admin.dash');
        } else {
            return view('web.dist.adminlogin');
        }
    }

    public function admindash()
    {
        if (session()->has('admin_email')) {
            $declined = DB::table('schoolAppDb')
                ->where('application_status', '=', 'declined')
                ->get();
            $data =  DB::table('schoolAppDb')
                ->get();
            return view('web.dist.admindashboard', compact('data', 'declined'));
        } else {
            return redirect('/');
        }
    }

    public function applicationdetails($id)
    {
        if (session()->has('admin_email')) {
            $data = DB::table('schoolAppDb')
                ->where('id', $id)
                ->first();
            return view('web.dist.application-details', compact('data'));
        } else {
            return redirect('/');
        }
    }

    public function adminAll()
    {
        if (session()->has('admin_email')) {
            $data = DB::table('schoolAppDb')
                ->get();
            return view('web.dist.all-applications', compact('data'));
        } else {
            return redirect('/');
        }
    }


    // controller functions

    public function adminlogin(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|min:5'
        ]);

        $query = DB::table('admin_tab')
            ->where('email', '=', $request->input('email'))
            ->where('password', $request->input('password'))
            ->first();
        if ($query == '') {
            return back()->with('error', 'sorry, please check your details');
        } else {
            $request->session()->put('admin_email', $request->input('email'));
            return redirect()->route('admin.dash');
        }
    }


    public function confirm($id)
    {
        DB::table('schoolAppDb')
            ->where('id', '=', $id)
            ->update([
                "application_status" => 'approved'
            ]);
        return redirect()->route('admin.dash');
    }

    public function decline($id)
    {
        DB::table('schoolAppDb')
            ->where('id', '=', $id)
            ->update([
                "application_status" => 'declined'
            ]);
        return redirect()->route('admin.dash');
    }

    public function studData($name)
    {
        $viewStud = DB::table('schoolAppDb')
            ->where('name', '=', $name)
            ->first();
        return view('', compact('viewStud'));
    }


    public function adminlogout()
    {
        session()->pull('admin_email');
        return redirect('/');
    }
}
