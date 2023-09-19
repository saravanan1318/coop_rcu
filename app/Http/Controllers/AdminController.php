<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Croploan_cropwise;
use App\Models\Croploan_entry;
use App\Models\Deposits;
use App\Models\Godowns;
use App\Models\Loan;
use App\Models\Purchases;
use App\Models\Sales;
use App\Models\Services;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::check() && Auth::user()->role == 14) {
                return $next($request);

            }

            abort(403);
        });
    }
    function dashboard()
    {
        return view("admin.dashboard");
    }

    function loanlist()
    {

        $loans = Loan::where('user_id', Auth::user()->id)->paginate(5);

        return view("loan.list", compact('loans'));
    }
    function depositlist()
    {
        $deposits = Deposits::select('*')->with('deposittype')
            ->whereIn('user_id', function ($query) {
                $query->select('id')->from('users')->where('region_id', Auth::user()->region_id);
            })
            ->paginate(5);

        return view("deposit.list", compact('deposits'));
    }

    function purchaselist()
    {
        $purchases = Purchases::select('*')->with('purchasetype')
            ->whereIn('user_id', function ($query) {
                $query->select('id')->from('users')->where('region_id', Auth::user()->region_id);
            })
            ->paginate(5);

        return view("purchase.list", compact('purchases'));
    }

    function saleslist()
    {
        $sales = Sales::select('*')->with('saletype')
            ->whereIn('user_id', function ($query) {
                $query->select('id')->from('users')->where('region_id', Auth::user()->region_id);
            })
            ->paginate(5);

        return view("sales.list", compact('sales'));
    }

    function godownlist()
    {

        $godowns = Godowns::select('*')
            ->whereIn('user_id', function ($query) {
                $query->select('id')->from('users')->where('region_id', Auth::user()->region_id);
            })
            ->paginate(5);
        return view("godown.list", compact('godowns'));
    }

    function serviceslist()
    {

        $services = Services::select('*')
            ->whereIn('user_id', function ($query) {
                $query->select('id')->from('users')->where('region_id', Auth::user()->region_id);
            })
            ->paginate(5);
        return view("services.list", compact('services'));
    }

    function croploanentrycropwiselist(Request $request)
    {

        $croploan_cropwise = Croploan_cropwise::where('croploan_id', $request->route('croploan_id'))->paginate(5);

        return view("croploan.entry.cropwiselist", compact('croploan_cropwise'));
    }

    function croploanlist()
    {

        //  $croploan_entry = Croploan_entry::where('user_id', Auth::user()->id)->paginate(5);

        $croploan_entry = Croploan_entry::select('*')
            ->whereIn('user_id', function ($query) {
                $query->select('id')->from('users')->where('region_id', Auth::user()->region_id);
            })
            ->paginate(5);

        return view("croploan.entry.list", compact('croploan_entry'));
    }
}
