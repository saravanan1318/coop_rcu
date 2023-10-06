<?php
namespace App\Helpers;

use App\Models\Croploan_entry;
use App\Models\Deposits;
use App\Models\Godowns;
use App\Models\Loan;
use App\Models\Mtr_societytype;
use App\Models\Purchases;
use App\Models\Sales;
use App\Models\Services;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LoanQueryService
{
    public static function getFilteredLoans($request, $distinct = false)
    {
        $regionFilter = $request->input('region');
        $circleFilter = $request->input('circle');
        $societyFilter = $request->input('society');
        $endDate = $request->input('endDate');
        $startDate = $request->input('startDate');
        $societyTypesFilter = $request->input('societyTypes');
        $loantypeFilter = $request->input('loantype');

        //$query = Loan::select('*')->with('loantype');
        if($distinct){
            $query = Loan::select('*',DB::raw('SUM(disbursedamount) as disbursed_total'), DB::raw('SUM(collectedamount) as collect_total'), DB::raw('SUM(collectedno) as collect_count'), DB::raw('SUM(disbursedno) as disbursed_count'))->with('loantype');
        }
        else {
            $query = Loan::select('*')->with('loantype');
        }

        if ($regionFilter || $circleFilter || $societyFilter) {
            $query->whereIn('user_id', function ($subquery) use ($societyTypesFilter, $circleFilter, $regionFilter, $societyFilter) {
                $subquery->select('id')->from('users');
                if (!empty($regionFilter)) {
                    $subquery->where('region_id', $regionFilter);
                }
                if (!empty($societyFilter)) {
                    $subquery->where('society_id', $societyFilter);
                }
                if ($circleFilter) {
                    $subquery->where('circle_id', $circleFilter);
                }
                if ($societyTypesFilter) {
                    $subquery->where('role', Mtr_societytype::where('id', $societyTypesFilter)->value('role_id'));
                }
            });
        }

        if ($startDate && $endDate) {
            $query->whereBetween('loandate', ["$startDate", "$endDate"]);
        } else {
            if ($startDate) {
                $query->whereDate('loandate', '>=', $startDate);
            }
            if ($endDate) {
                $query->whereDate('loandate', '<=', $endDate);
            }
        }

        if ($loantypeFilter) {
            $query->where('loantype_id', $loantypeFilter);
        }
        if($distinct){
            $query->groupBy('loandate', 'loantype_id');
        }
        return $query->get();
    }

    public static function getFilteredDeposits($request)
    {
        $regionFilter = $request->input('region');
        $circleFilter = $request->input('circle');
        $societyFilter = $request->input('society');
        $endDate = $request->input('endDate');
        $startDate = $request->input('startDate');
        $societyTypesFilter = $request->input('societyTypes');
        $loantypeFilter = $request->input('loantype');

        $query = Deposits::select('*')->with('deposittype');

        if ($regionFilter || $circleFilter || $societyFilter) {
            $query->whereIn('user_id', function ($subquery) use ($societyTypesFilter, $circleFilter, $regionFilter, $societyFilter) {
                $subquery->select('id')->from('users');
                if (!empty($regionFilter)) {
                    $subquery->where('region_id', $regionFilter);
                }
                if (!empty($societyFilter)) {
                    $subquery->where('society_id', $societyFilter);
                }
                if ($circleFilter) {
                    $subquery->where('circle_id', $circleFilter);
                }
                if ($societyTypesFilter) {
                    $subquery->where('role', Mtr_societytype::where('id', $societyTypesFilter)->value('role_id'));
                }
            });
        }

        if ($startDate && $endDate) {
            $query->whereBetween('depositdate', ["$startDate", "$endDate"]);
        } else {
            if ($startDate) {
                $query->whereDate('depositdate', '>=', $startDate);
            }
            if ($endDate) {
                $query->whereDate('depositdate', '<=', $endDate);
            }
        }

        if ($loantypeFilter) {
            $query->where('loantype_id', $loantypeFilter);
        }

        return $query->get();
    }

    public static function getFilteredPurchase($request)
    {
        $regionFilter = $request->input('region');
        $circleFilter = $request->input('circle');
        $societyFilter = $request->input('society');
        $endDate = $request->input('endDate');
        $startDate = $request->input('startDate');
        $societyTypesFilter = $request->input('societyTypes');
        $loantypeFilter = $request->input('loantype');

        $query = Purchases::select('*')->with('purchasetype');

        if ($regionFilter || $circleFilter || $societyFilter) {
            $query->whereIn('user_id', function ($subquery) use ($societyTypesFilter, $circleFilter, $regionFilter, $societyFilter) {
                $subquery->select('id')->from('users');
                if (!empty($regionFilter)) {
                    $subquery->where('region_id', $regionFilter);
                }
                if (!empty($societyFilter)) {
                    $subquery->where('society_id', $societyFilter);
                }
                if ($circleFilter) {
                    $subquery->where('circle_id', $circleFilter);
                }
                if ($societyTypesFilter) {
                    $subquery->where('role', Mtr_societytype::where('id', $societyTypesFilter)->value('role_id'));
                }
            });
        }

        if ($startDate && $endDate) {
            $query->whereBetween('purchasedate', ["$startDate", "$endDate"]);
        } else {
            if ($startDate) {
                $query->whereDate('purchasedate', '>=', $startDate);
            }
            if ($endDate) {
                $query->whereDate('purchasedate', '<=', $endDate);
            }
        }

        if ($loantypeFilter) {
            $query->where('loantype_id', $loantypeFilter);
        }

        return $query->get();
    }

    public static function getFilteredSales($request)
    {
        $regionFilter = $request->input('region');
        $circleFilter = $request->input('circle');
        $societyFilter = $request->input('society');
        $endDate = $request->input('endDate');
        $startDate = $request->input('startDate');
        $societyTypesFilter = $request->input('societyTypes');
        $loantypeFilter = $request->input('loantype');

        $query = Sales::select('*')->with('saletype');

        if ($regionFilter || $circleFilter || $societyFilter) {
            $query->whereIn('user_id', function ($subquery) use ($societyTypesFilter, $circleFilter, $regionFilter, $societyFilter) {
                $subquery->select('id')->from('users');
                if (!empty($regionFilter)) {
                    $subquery->where('region_id', $regionFilter);
                }
                if (!empty($societyFilter)) {
                    $subquery->where('society_id', $societyFilter);
                }
                if ($circleFilter) {
                    $subquery->where('circle_id', $circleFilter);
                }
                if ($societyTypesFilter) {
                    $subquery->where('role', Mtr_societytype::where('id', $societyTypesFilter)->value('role_id'));
                }
            });
        }

        if ($startDate && $endDate) {
            $query->whereBetween('saledate', ["$startDate", "$endDate"]);
        } else {
            if ($startDate) {
                $query->whereDate('saledate', '>=', $startDate);
            }
            if ($endDate) {
                $query->whereDate('saledate', '<=', $endDate);
            }
        }

        if ($loantypeFilter) {
            $query->where('loantype_id', $loantypeFilter);
        }

        return $query->get();
    }

    public static function getFilteredGodown($request)
    {
        $regionFilter = $request->input('region');
        $circleFilter = $request->input('circle');
        $societyFilter = $request->input('society');
        $endDate = $request->input('endDate');
        $startDate = $request->input('startDate');
        $societyTypesFilter = $request->input('societyTypes');
        $loantypeFilter = $request->input('loantype');

        $query = Godowns::select('*');

        if ($regionFilter || $circleFilter || $societyFilter) {
            $query->whereIn('user_id', function ($subquery) use ($societyTypesFilter, $circleFilter, $regionFilter, $societyFilter) {
                $subquery->select('id')->from('users');
                if (!empty($regionFilter)) {
                    $subquery->where('region_id', $regionFilter);
                }
                if (!empty($societyFilter)) {
                    $subquery->where('society_id', $societyFilter);
                }
                if ($circleFilter) {
                    $subquery->where('circle_id', $circleFilter);
                }
                if ($societyTypesFilter) {
                    $subquery->where('role', Mtr_societytype::where('id', $societyTypesFilter)->value('role_id'));
                }
            });
        }

        if ($startDate && $endDate) {
            $query->whereBetween('godowndate', ["$startDate", "$endDate"]);
        } else {
            if ($startDate) {
                $query->whereDate('godowndate', '>=', $startDate);
            }
            if ($endDate) {
                $query->whereDate('godowndate', '<=', $endDate);
            }
        }

        if ($loantypeFilter) {
            $query->where('loantype_id', $loantypeFilter);
        }

        return $query->get();
    }
    public static function getFilteredService($request)
    {
        $regionFilter = $request->input('region');
        $circleFilter = $request->input('circle');
        $societyFilter = $request->input('society');
        $endDate = $request->input('endDate');
        $startDate = $request->input('startDate');
        $societyTypesFilter = $request->input('societyTypes');
        $loantypeFilter = $request->input('loantype');

        $query = Services::select('*');

        if ($regionFilter || $circleFilter || $societyFilter) {
            $query->whereIn('user_id', function ($subquery) use ($societyTypesFilter, $circleFilter, $regionFilter, $societyFilter) {
                $subquery->select('id')->from('users');
                if (!empty($regionFilter)) {
                    $subquery->where('region_id', $regionFilter);
                }
                if (!empty($societyFilter)) {
                    $subquery->where('society_id', $societyFilter);
                }
                if ($circleFilter) {
                    $subquery->where('circle_id', $circleFilter);
                }
                if ($societyTypesFilter) {
                    $subquery->where('role', Mtr_societytype::where('id', $societyTypesFilter)->value('role_id'));
                }
            });
        }

        if ($startDate && $endDate) {
            $query->whereBetween('servicesdate', ["$startDate", "$endDate"]);
        } else {
            if ($startDate) {
                $query->whereDate('servicesdate', '>=', $startDate);
            }
            if ($endDate) {
                $query->whereDate('servicesdate', '<=', $endDate);
            }
        }

        if ($loantypeFilter) {
            $query->where('loantype_id', $loantypeFilter);
        }

        return $query->get();
    }
    public static function getFilteredCropLoan($request)
    {
        $regionFilter = $request->input('region');
        $circleFilter = $request->input('circle');
        $societyFilter = $request->input('society');
        $endDate = $request->input('endDate');
        $startDate = $request->input('startDate');
        $societyTypesFilter = $request->input('societyTypes');
        $loantypeFilter = $request->input('loantype');

        $query = Croploan_entry::select('*');

        if ($regionFilter || $circleFilter || $societyFilter) {
            $query->whereIn('user_id', function ($subquery) use ($societyTypesFilter, $circleFilter, $regionFilter, $societyFilter) {
                $subquery->select('id')->from('users');
                if (!empty($regionFilter)) {
                    $subquery->where('region_id', $regionFilter);
                }
                if (!empty($societyFilter)) {
                    $subquery->where('society_id', $societyFilter);
                }
                if ($circleFilter) {
                    $subquery->where('circle_id', $circleFilter);
                }
                if ($societyTypesFilter) {
                    $subquery->where('role', Mtr_societytype::where('id', $societyTypesFilter)->value('role_id'));
                }
            });
        }

        if ($startDate && $endDate) {
            $query->whereBetween('croploandate', ["$startDate", "$endDate"]);
        } else {
            if ($startDate) {
                $query->whereDate('croploandate', '>=', $startDate);
            }
            if ($endDate) {
                $query->whereDate('servicesdate', '<=', $endDate);
            }
        }

        if ($loantypeFilter) {
            $query->where('loantype_id', $loantypeFilter);
        }

        return $query->get();
    }

    public  static function getJRFilteredLoans($request, $distinct = false)
    {
        $regionFilter = $request->input('region');
        $circleFilter = $request->input('circle');
        $societyFilter = $request->input('society');
        $endDate = $request->input('endDate');
        $startDate = $request->input('startDate');
        $societyTypesFilter = $request->input('societyTypes');
        $loantypeFilter = $request->input('loantype');

        $soctietyvalue = DB::table('mtr_societytype')
            ->whereIn('role_id', function ($query) use ($circleFilter, $regionFilter) {
                $query->select('role')
                    ->from('users');
                if($regionFilter) {
                    $query->where('region_id', $regionFilter);
                }
                if($circleFilter) {
                    $query->where('circle_id', $circleFilter);
                }
            });

        $societiestypes=$soctietyvalue->get();

        // Build the Loan query with additional conditions
        if($distinct){
            $query = Loan::select('*',
                DB::raw('SUM(disbursedamount) as disbursed_total'),
                DB::raw('SUM(collectedamount) as collect_total'),
                DB::raw('SUM(collectedno) as collect_count'),
                DB::raw('SUM(disbursedno) as disbursed_count'))->with('loantype');
//            $query = Loan::select('*')->with('loantype');
        }
        else {
            $query = Loan::select('*')->with('loantype') ->leftJoin('users', 'loan.user_id', '=', 'users.id')
                ->leftJoin('mtr_society', 'mtr_society.id', '=', 'users.society_id');
        }

        if ($regionFilter || $circleFilter || $societyFilter ) {
            $query->whereIn('user_id', function ($subquery) use ($societyTypesFilter, $circleFilter, $regionFilter, $societyFilter) {
                $subquery->select('id')->from('users');
//                    ->leftJoin('mtr_society', 'mtr_society.id', '=', 'users.society_id');
                if (!empty($regionFilter)) {
                    // Apply condition for region filter
                    $subquery->where('region_id', $regionFilter);
                }
                if (!empty($societyFilter)) {
                    // Apply condition for society filter
                    $subquery->where('society_id', $societyFilter);
                }
                if ($circleFilter) {
                    // Apply condition for circle filter
                    $subquery->where('circle_id', $circleFilter);
                }
                if ($societyTypesFilter) {
                    // Apply condition for socitytype filter
                    $subquery->where('role', Mtr_societytype::where('id', $societyTypesFilter)->value('role_id'));
                }
            });
        } else {
            $query->whereIn('user_id', function ($subquery) use ($societyFilter, $regionFilter) {
                $subquery->select('id')->from('users')->where('region_id', Auth::user()->region_id);
            });
        }

        if ($startDate && $endDate) {
            // Apply condition for circle filter
            $query->wherebetween('loandate', ["$startDate","$endDate"]);
        }
        else{
            if ($startDate) {
                // Apply condition for 'loandate' greater than '$startDate'
                $query->whereDate('loandate', '>=', $startDate);
            }
            if ($endDate) {
                // Apply condition for 'loandate' greater than '$startDate'
                $query->whereDate('loandate', '<=', $endDate);
            }

        }

        if($loantypeFilter)
        {
            $query->where('loantype_id', $loantypeFilter);
        }
        if($distinct){
            $query->groupBy('loandate', 'loantype_id');
        }

        return $query->get();

    }

    public  static function getJRFilteredDeposits($request)
    {
        $regionFilter = Auth::user()->region_id;
        $circleFilter = $request->input('circle');
        $societyFilter = $request->input('society');
        $endDate = $request->input('endDate');
        $startDate = $request->input('startDate');
        $societyTypesFilter = $request->input('societyTypes');
        $loantypeFilter = $request->input('loantype');

        $soctietyvalue = DB::table('mtr_societytype')
            ->whereIn('role_id', function ($query) use ($circleFilter, $regionFilter) {
                $query->select('role')
                    ->from('users');
                if($regionFilter) {
                    $query->where('region_id', $regionFilter);
                }
                if($circleFilter) {
                    $query->where('circle_id', $circleFilter);
                }
            });

        $societiestypes=$soctietyvalue->get();

        // Build the Loan query with additional conditions
        $query = Deposits::select('*')->with('deposittype');

        if ($regionFilter || $circleFilter || $societyFilter ) {
            $query->whereIn('user_id', function ($subquery) use ($societyTypesFilter, $circleFilter, $regionFilter, $societyFilter) {
                $subquery->select('id')->from('users');
                if (!empty($regionFilter)) {
                    // Apply condition for region filter
                    $subquery->where('region_id', $regionFilter);
                }
                if (!empty($societyFilter)) {
                    // Apply condition for society filter
                    $subquery->where('society_id', $societyFilter);
                }
                if ($circleFilter) {
                    // Apply condition for circle filter
                    $subquery->where('circle_id', $circleFilter);
                }
                if ($societyTypesFilter) {
                    // Apply condition for socitytype filter
                    $subquery->where('role', Mtr_societytype::where('id', $societyTypesFilter)->value('role_id'));
                }
            });
        } else {
            $query->whereIn('user_id', function ($subquery) use ($societyFilter, $regionFilter) {
                $subquery->select('id')->from('users')->where('region_id', Auth::user()->region_id);
            });
        }

        if ($startDate && $endDate) {
            // Apply condition for circle filter
            $query->wherebetween('depositdate', ["$startDate","$endDate"]);
        }
        else{
            if ($startDate) {
                // Apply condition for 'loandate' greater than '$startDate'
                $query->whereDate('depositdate', '>=', $startDate);
            }
            if ($endDate) {
                // Apply condition for 'loandate' greater than '$startDate'
                $query->whereDate('depositdate', '<=', $endDate);
            }

        }

        if($loantypeFilter)
        {
            $query->where('loantype_id', $loantypeFilter);
        }

        return $query->get();

    }

    public  static function getJRFilteredPurchase($request)
    {
        $regionFilter = $request->input('region');
        $circleFilter = $request->input('circle');
        $societyFilter = $request->input('society');
        $endDate = $request->input('endDate');
        $startDate = $request->input('startDate');
        $societyTypesFilter = $request->input('societyTypes');
        $loantypeFilter = $request->input('loantype');

        $soctietyvalue = DB::table('mtr_societytype')
            ->whereIn('role_id', function ($query) use ($circleFilter, $regionFilter) {
                $query->select('role')
                    ->from('users');
                if($regionFilter) {
                    $query->where('region_id', $regionFilter);
                }
                if($circleFilter) {
                    $query->where('circle_id', $circleFilter);
                }
            });

        $societiestypes=$soctietyvalue->get();

        // Build the Loan query with additional conditions
        $query = Purchases::select('*')->with('purchasetype');

        if ($regionFilter || $circleFilter || $societyFilter ) {
            $query->whereIn('user_id', function ($subquery) use ($societyTypesFilter, $circleFilter, $regionFilter, $societyFilter) {
                $subquery->select('id')->from('users');
                if (!empty($regionFilter)) {
                    // Apply condition for region filter
                    $subquery->where('region_id', $regionFilter);
                }
                if (!empty($societyFilter)) {
                    // Apply condition for society filter
                    $subquery->where('society_id', $societyFilter);
                }
                if ($circleFilter) {
                    // Apply condition for circle filter
                    $subquery->where('circle_id', $circleFilter);
                }
                if ($societyTypesFilter) {
                    // Apply condition for socitytype filter
                    $subquery->where('role', Mtr_societytype::where('id', $societyTypesFilter)->value('role_id'));
                }
            });
        } else {
            $query->whereIn('user_id', function ($subquery) use ($societyFilter, $regionFilter) {
                $subquery->select('id')->from('users')->where('region_id', Auth::user()->region_id);
            });
        }

        if ($startDate && $endDate) {
            // Apply condition for circle filter
            $query->wherebetween('purchasedate', ["$startDate","$endDate"]);
        }
        else{
            if ($startDate) {
                // Apply condition for 'loandate' greater than '$startDate'
                $query->whereDate('purchasedate', '>=', $startDate);
            }
            if ($endDate) {
                // Apply condition for 'loandate' greater than '$startDate'
                $query->whereDate('purchasedate', '<=', $endDate);
            }

        }

        if($loantypeFilter)
        {
            $query->where('loantype_id', $loantypeFilter);
        }

        return $query->get();

    }

    public  static function getJRFilteredSales($request)
    {
        $regionFilter = $request->input('region');
        $circleFilter = $request->input('circle');
        $societyFilter = $request->input('society');
        $endDate = $request->input('endDate');
        $startDate = $request->input('startDate');
        $societyTypesFilter = $request->input('societyTypes');
        $loantypeFilter = $request->input('loantype');

        $soctietyvalue = DB::table('mtr_societytype')
            ->whereIn('role_id', function ($query) use ($circleFilter, $regionFilter) {
                $query->select('role')
                    ->from('users');
                if($regionFilter) {
                    $query->where('region_id', $regionFilter);
                }
                if($circleFilter) {
                    $query->where('circle_id', $circleFilter);
                }
            });

        $societiestypes=$soctietyvalue->get();

        // Build the Loan query with additional conditions
        $query = Sales::select('*')->with('saletype');

        if ($regionFilter || $circleFilter || $societyFilter ) {
            $query->whereIn('user_id', function ($subquery) use ($societyTypesFilter, $circleFilter, $regionFilter, $societyFilter) {
                $subquery->select('id')->from('users');
                if (!empty($regionFilter)) {
                    // Apply condition for region filter
                    $subquery->where('region_id', $regionFilter);
                }
                if (!empty($societyFilter)) {
                    // Apply condition for society filter
                    $subquery->where('society_id', $societyFilter);
                }
                if ($circleFilter) {
                    // Apply condition for circle filter
                    $subquery->where('circle_id', $circleFilter);
                }
                if ($societyTypesFilter) {
                    // Apply condition for socitytype filter
                    $subquery->where('role', Mtr_societytype::where('id', $societyTypesFilter)->value('role_id'));
                }
            });
        } else {
            $query->whereIn('user_id', function ($subquery) use ($societyFilter, $regionFilter) {
                $subquery->select('id')->from('users')->where('region_id', Auth::user()->region_id);
            });
        }

        if ($startDate && $endDate) {
            // Apply condition for circle filter
            $query->wherebetween('saledate', ["$startDate","$endDate"]);
        }
        else{
            if ($startDate) {
                // Apply condition for 'loandate' greater than '$startDate'
                $query->whereDate('saledate', '>=', $startDate);
            }
            if ($endDate) {
                // Apply condition for 'loandate' greater than '$startDate'
                $query->whereDate('saledate', '<=', $endDate);
            }

        }

        if($loantypeFilter)
        {
            $query->where('loantype_id', $loantypeFilter);
        }

        return $query->get();

    }
    public  static function getJRFilteredGodown($request)
    {
        $regionFilter = $request->input('region');
        $circleFilter = $request->input('circle');
        $societyFilter = $request->input('society');
        $endDate = $request->input('endDate');
        $startDate = $request->input('startDate');
        $societyTypesFilter = $request->input('societyTypes');
        $loantypeFilter = $request->input('loantype');

        $soctietyvalue = DB::table('mtr_societytype')
            ->whereIn('role_id', function ($query) use ($circleFilter, $regionFilter) {
                $query->select('role')
                    ->from('users');
                if($regionFilter) {
                    $query->where('region_id', $regionFilter);
                }
                if($circleFilter) {
                    $query->where('circle_id', $circleFilter);
                }
            });

        $societiestypes=$soctietyvalue->get();

        // Build the Loan query with additional conditions
        $query = Godowns::select('*');

        if ($regionFilter || $circleFilter || $societyFilter ) {
            $query->whereIn('user_id', function ($subquery) use ($societyTypesFilter, $circleFilter, $regionFilter, $societyFilter) {
                $subquery->select('id')->from('users');
                if (!empty($regionFilter)) {
                    // Apply condition for region filter
                    $subquery->where('region_id', $regionFilter);
                }
                if (!empty($societyFilter)) {
                    // Apply condition for society filter
                    $subquery->where('society_id', $societyFilter);
                }
                if ($circleFilter) {
                    // Apply condition for circle filter
                    $subquery->where('circle_id', $circleFilter);
                }
                if ($societyTypesFilter) {
                    // Apply condition for socitytype filter
                    $subquery->where('role', Mtr_societytype::where('id', $societyTypesFilter)->value('role_id'));
                }
            });
        } else {
            $query->whereIn('user_id', function ($subquery) use ($societyFilter, $regionFilter) {
                $subquery->select('id')->from('users')->where('region_id', Auth::user()->region_id);
            });
        }

        if ($startDate && $endDate) {
            // Apply condition for circle filter
            $query->wherebetween('godowndate', ["$startDate","$endDate"]);
        }
        else{
            if ($startDate) {
                // Apply condition for 'loandate' greater than '$startDate'
                $query->whereDate('godowndate', '>=', $startDate);
            }
            if ($endDate) {
                // Apply condition for 'loandate' greater than '$startDate'
                $query->whereDate('godowndate', '<=', $endDate);
            }

        }

        if($loantypeFilter)
        {
            $query->where('loantype_id', $loantypeFilter);
        }

        return $query->get();

    }
    public  static function getJRFilteredService($request)
    {
        $regionFilter = $request->input('region');
        $circleFilter = $request->input('circle');
        $societyFilter = $request->input('society');
        $endDate = $request->input('endDate');
        $startDate = $request->input('startDate');
        $societyTypesFilter = $request->input('societyTypes');
        $loantypeFilter = $request->input('loantype');

        $soctietyvalue = DB::table('mtr_societytype')
            ->whereIn('role_id', function ($query) use ($circleFilter, $regionFilter) {
                $query->select('role')
                    ->from('users');
                if($regionFilter) {
                    $query->where('region_id', $regionFilter);
                }
                if($circleFilter) {
                    $query->where('circle_id', $circleFilter);
                }
            });

        $societiestypes=$soctietyvalue->get();

        // Build the Loan query with additional conditions
        $query = Services::select('*');

        if ($regionFilter || $circleFilter || $societyFilter ) {
            $query->whereIn('user_id', function ($subquery) use ($societyTypesFilter, $circleFilter, $regionFilter, $societyFilter) {
                $subquery->select('id')->from('users');
                if (!empty($regionFilter)) {
                    // Apply condition for region filter
                    $subquery->where('region_id', $regionFilter);
                }
                if (!empty($societyFilter)) {
                    // Apply condition for society filter
                    $subquery->where('society_id', $societyFilter);
                }
                if ($circleFilter) {
                    // Apply condition for circle filter
                    $subquery->where('circle_id', $circleFilter);
                }
                if ($societyTypesFilter) {
                    // Apply condition for socitytype filter
                    $subquery->where('role', Mtr_societytype::where('id', $societyTypesFilter)->value('role_id'));
                }
            });
        } else {
            $query->whereIn('user_id', function ($subquery) use ($societyFilter, $regionFilter) {
                $subquery->select('id')->from('users')->where('region_id', Auth::user()->region_id);
            });
        }

        if ($startDate && $endDate) {
            // Apply condition for circle filter
            $query->wherebetween('servicesdate', ["$startDate","$endDate"]);
        }
        else{
            if ($startDate) {
                // Apply condition for 'loandate' greater than '$startDate'
                $query->whereDate('servicesdate', '>=', $startDate);
            }
            if ($endDate) {
                // Apply condition for 'loandate' greater than '$startDate'
                $query->whereDate('servicesdate', '<=', $endDate);
            }

        }

        if($loantypeFilter)
        {
            $query->where('loantype_id', $loantypeFilter);
        }

        return $query->get();

    }
    public  static function getJRFilteredCropLoan($request,$distinct = false)
    {
        $regionFilter = $request->input('region');
        $circleFilter = $request->input('circle');
        $societyFilter = $request->input('society');
        $endDate = $request->input('endDate');
        $startDate = $request->input('startDate');
        $societyTypesFilter = $request->input('societyTypes');
        $loantypeFilter = $request->input('loantype');

        $soctietyvalue = DB::table('mtr_societytype')
            ->whereIn('role_id', function ($query) use ($circleFilter, $regionFilter) {
                $query->select('role')
                    ->from('users');
                if($regionFilter) {
                    $query->where('region_id', $regionFilter);
                }
                if($circleFilter) {
                    $query->where('circle_id', $circleFilter);
                }
            });

        $societiestypes=$soctietyvalue->get();

        // Build the Loan query with additional conditions
        $query = Croploan_entry::select('*');

        if ($regionFilter || $circleFilter || $societyFilter ) {
            $query->whereIn('user_id', function ($subquery) use ($societyTypesFilter, $circleFilter, $regionFilter, $societyFilter) {
                $subquery->select('id')->from('users');
                if (!empty($regionFilter)) {
                    // Apply condition for region filter
                    $subquery->where('region_id', $regionFilter);
                }
                if (!empty($societyFilter)) {
                    // Apply condition for society filter
                    $subquery->where('society_id', $societyFilter);
                }
                if ($circleFilter) {
                    // Apply condition for circle filter
                    $subquery->where('circle_id', $circleFilter);
                }
                if ($societyTypesFilter) {
                    // Apply condition for socitytype filter
                    $subquery->where('role', Mtr_societytype::where('id', $societyTypesFilter)->value('role_id'));
                }
            });
        } else {
            $query->whereIn('user_id', function ($subquery) use ($societyFilter, $regionFilter) {
                $subquery->select('id')->from('users')->where('region_id', Auth::user()->region_id);
            });
        }

        if ($startDate && $endDate) {
            // Apply condition for circle filter
            $query->wherebetween('croploandate', ["$startDate","$endDate"]);
        }
        else{
            if ($startDate) {
                // Apply condition for 'loandate' greater than '$startDate'
                $query->whereDate('croploandate', '>=', $startDate);
            }
            if ($endDate) {
                // Apply condition for 'loandate' greater than '$startDate'
                $query->whereDate('croploandate', '<=', $endDate);
            }

        }

        if($loantypeFilter)
        {
            $query->where('loantype_id', $loantypeFilter);
        }

        return $query->get();

    }

    public  static function getDRFilteredLoans($request, $distinct = false)
    {
        $regionFilter = $request->input('region');
        $circleFilter = $request->input('circle');
        $societyFilter = $request->input('society');
        $endDate = $request->input('endDate');
        $startDate = $request->input('startDate');
        $societyTypesFilter = $request->input('societyTypes');
        $loantypeFilter = $request->input('loantype');

        $soctietyvalue = DB::table('mtr_societytype')
            ->whereIn('role_id', function ($query) use ($circleFilter, $regionFilter) {
                $query->select('role')
                    ->from('users');
                if($regionFilter) {
                    $query->where('region_id', $regionFilter);
                }
                if($circleFilter) {
                    $query->where('circle_id', $circleFilter);
                }
            });

        $societiestypes=$soctietyvalue->get();



        //$query = Loan::select('*')->with('loantype');
        if($distinct){
            $query = Loan::select('*', DB::raw('SUM(disbursedamount) as disbursed_total'), DB::raw('SUM(collectedamount) as collect_total'), DB::raw('SUM(collectedno) as collect_count'), DB::raw('SUM(disbursedno) as disbursed_count'))->with('loantype');
        }
        else {
            $query = Loan::select('*')->with('loantype');
        }

        if ($regionFilter || $circleFilter || $societyFilter) {
            $query->whereIn('user_id', function ($subquery) use ($societyTypesFilter, $circleFilter, $regionFilter, $societyFilter) {
                $subquery->select('id')->from('users')->where('circle_id', Auth::user()->circle_id);
                if (!empty($regionFilter)) {
                    // Apply condition for region filter
                    $subquery->where('region_id', $regionFilter);
                }
                if (!empty($societyFilter)) {
                    // Apply condition for society filter
                    $subquery->where('society_id', $societyFilter);
                }
                if ($circleFilter) {
                    // Apply condition for circle filter
                    $subquery->where('circle_id', $circleFilter);
                }
                if ($societyTypesFilter) {
                    $subquery->where('role', Mtr_societytype::where('id', $societyTypesFilter)->value('role_id'));
                }
            });
        } else {

            $query->whereIn('user_id', function ($subquery) use ($societyFilter, $regionFilter) {
                $subquery->select('id')->from('users')->where('circle_id', Auth::user()->circle_id);
            });
        }


        if ($startDate && $endDate) {
            // Apply condition for circle filter
            $query->wherebetween('loandate', ["$startDate","$endDate"]);
        }
        else{
            if ($startDate) {
                // Apply condition for 'loandate' greater than '$startDate'
                $query->whereDate('loandate', '>=', $startDate);
            }
            if ($endDate) {
                // Apply condition for 'loandate' greater than '$startDate'
                $query->whereDate('loandate', '<=', $endDate);
            }

        }

        if($loantypeFilter)
        {
            $query->where('loantype_id', $loantypeFilter);
        }
        if($distinct){
            $query->groupBy('loandate', 'loantype_id');
        }
        return $query->get();

    }

    public  static function getDRFilteredDeposits($request)
    {
        $regionFilter = $request->input('region');
        $circleFilter = $request->input('circle');
        $societyFilter = $request->input('society');
        $endDate = $request->input('endDate');
        $startDate = $request->input('startDate');
        $societyTypesFilter = $request->input('societyTypes');
        $loantypeFilter = $request->input('loantype');

        $soctietyvalue = DB::table('mtr_societytype')
            ->whereIn('role_id', function ($query) use ($circleFilter, $regionFilter) {
                $query->select('role')
                    ->from('users');
                if($regionFilter) {
                    $query->where('region_id', $regionFilter);
                }
                if($circleFilter) {
                    $query->where('circle_id', $circleFilter);
                }
            });

        $societiestypes=$soctietyvalue->get();



        $query = Deposits::select('*')->with('deposittype');

        if ($regionFilter || $circleFilter || $societyFilter) {
            $query->whereIn('user_id', function ($subquery) use ($societyTypesFilter, $circleFilter, $regionFilter, $societyFilter) {
                $subquery->select('id')->from('users')->where('circle_id', Auth::user()->circle_id);
                if (!empty($regionFilter)) {
                    // Apply condition for region filter
                    $subquery->where('region_id', $regionFilter);
                }
                if (!empty($societyFilter)) {
                    // Apply condition for society filter
                    $subquery->where('society_id', $societyFilter);
                }
                if ($circleFilter) {
                    // Apply condition for circle filter
                    $subquery->where('circle_id', $circleFilter);
                }
                if ($societyTypesFilter) {
                    $subquery->where('role', Mtr_societytype::where('id', $societyTypesFilter)->value('role_id'));
                }
            });
        } else {

            $query->whereIn('user_id', function ($subquery) use ($societyFilter, $regionFilter) {
                $subquery->select('id')->from('users')->where('circle_id', Auth::user()->circle_id);
            });
        }


        if ($startDate && $endDate) {
            // Apply condition for circle filter
            $query->wherebetween('depositdate', ["$startDate","$endDate"]);
        }
        else{
            if ($startDate) {
                // Apply condition for 'loandate' greater than '$startDate'
                $query->whereDate('depositdate', '>=', $startDate);
            }
            if ($endDate) {
                // Apply condition for 'loandate' greater than '$startDate'
                $query->whereDate('depositdate', '<=', $endDate);
            }

        }

        if($loantypeFilter)
        {
            $query->where('loantype_id', $loantypeFilter);
        }

        return $query->get();

    }

    public  static function getDRFilteredPurchase($request)
    {
        $regionFilter = $request->input('region');
        $circleFilter = $request->input('circle');
        $societyFilter = $request->input('society');
        $endDate = $request->input('endDate');
        $startDate = $request->input('startDate');
        $societyTypesFilter = $request->input('societyTypes');
        $loantypeFilter = $request->input('loantype');

        $soctietyvalue = DB::table('mtr_societytype')
            ->whereIn('role_id', function ($query) use ($circleFilter, $regionFilter) {
                $query->select('role')
                    ->from('users');
                if($regionFilter) {
                    $query->where('region_id', $regionFilter);
                }
                if($circleFilter) {
                    $query->where('circle_id', $circleFilter);
                }
            });

        $societiestypes=$soctietyvalue->get();



        $query = Purchases::select('*')->with('purchasetype');

        if ($regionFilter || $circleFilter || $societyFilter) {
            $query->whereIn('user_id', function ($subquery) use ($societyTypesFilter, $circleFilter, $regionFilter, $societyFilter) {
                $subquery->select('id')->from('users')->where('circle_id', Auth::user()->circle_id);
                if (!empty($regionFilter)) {
                    // Apply condition for region filter
                    $subquery->where('region_id', $regionFilter);
                }
                if (!empty($societyFilter)) {
                    // Apply condition for society filter
                    $subquery->where('society_id', $societyFilter);
                }
                if ($circleFilter) {
                    // Apply condition for circle filter
                    $subquery->where('circle_id', $circleFilter);
                }
                if ($societyTypesFilter) {
                    $subquery->where('role', Mtr_societytype::where('id', $societyTypesFilter)->value('role_id'));
                }
            });
        } else {

            $query->whereIn('user_id', function ($subquery) use ($societyFilter, $regionFilter) {
                $subquery->select('id')->from('users')->where('circle_id', Auth::user()->circle_id);
            });
        }


        if ($startDate && $endDate) {
            // Apply condition for circle filter
            $query->wherebetween('purchasedate', ["$startDate","$endDate"]);
        }
        else{
            if ($startDate) {
                // Apply condition for 'loandate' greater than '$startDate'
                $query->whereDate('purchasedate', '>=', $startDate);
            }
            if ($endDate) {
                // Apply condition for 'loandate' greater than '$startDate'
                $query->whereDate('purchasedate', '<=', $endDate);
            }

        }

        if($loantypeFilter)
        {
            $query->where('loantype_id', $loantypeFilter);
        }

        return $query->get();

    }
    public  static function getDRFilteredSales($request)
    {
        $regionFilter = $request->input('region');
        $circleFilter = $request->input('circle');
        $societyFilter = $request->input('society');
        $endDate = $request->input('endDate');
        $startDate = $request->input('startDate');
        $societyTypesFilter = $request->input('societyTypes');
        $loantypeFilter = $request->input('loantype');

        $soctietyvalue = DB::table('mtr_societytype')
            ->whereIn('role_id', function ($query) use ($circleFilter, $regionFilter) {
                $query->select('role')
                    ->from('users');
                if($regionFilter) {
                    $query->where('region_id', $regionFilter);
                }
                if($circleFilter) {
                    $query->where('circle_id', $circleFilter);
                }
            });

        $societiestypes=$soctietyvalue->get();



        $query =Sales::select('*')->with('saletype');

        if ($regionFilter || $circleFilter || $societyFilter) {
            $query->whereIn('user_id', function ($subquery) use ($societyTypesFilter, $circleFilter, $regionFilter, $societyFilter) {
                $subquery->select('id')->from('users')->where('circle_id', Auth::user()->circle_id);
                if (!empty($regionFilter)) {
                    // Apply condition for region filter
                    $subquery->where('region_id', $regionFilter);
                }
                if (!empty($societyFilter)) {
                    // Apply condition for society filter
                    $subquery->where('society_id', $societyFilter);
                }
                if ($circleFilter) {
                    // Apply condition for circle filter
                    $subquery->where('circle_id', $circleFilter);
                }
                if ($societyTypesFilter) {
                    $subquery->where('role', Mtr_societytype::where('id', $societyTypesFilter)->value('role_id'));
                }
            });
        } else {

            $query->whereIn('user_id', function ($subquery) use ($societyFilter, $regionFilter) {
                $subquery->select('id')->from('users')->where('circle_id', Auth::user()->circle_id);
            });
        }


        if ($startDate && $endDate) {
            // Apply condition for circle filter
            $query->wherebetween('saledate', ["$startDate","$endDate"]);
        }
        else{
            if ($startDate) {
                // Apply condition for 'loandate' greater than '$startDate'
                $query->whereDate('saledate', '>=', $startDate);
            }
            if ($endDate) {
                // Apply condition for 'loandate' greater than '$startDate'
                $query->whereDate('saledate', '<=', $endDate);
            }

        }

        if($loantypeFilter)
        {
            $query->where('loantype_id', $loantypeFilter);
        }

        return $query->get();

    }
    public  static function getDRFilteredGodown($request)
    {
        $regionFilter = $request->input('region');
        $circleFilter = $request->input('circle');
        $societyFilter = $request->input('society');
        $endDate = $request->input('endDate');
        $startDate = $request->input('startDate');
        $societyTypesFilter = $request->input('societyTypes');
        $loantypeFilter = $request->input('loantype');

        $soctietyvalue = DB::table('mtr_societytype')
            ->whereIn('role_id', function ($query) use ($circleFilter, $regionFilter) {
                $query->select('role')
                    ->from('users');
                if($regionFilter) {
                    $query->where('region_id', $regionFilter);
                }
                if($circleFilter) {
                    $query->where('circle_id', $circleFilter);
                }
            });

        $societiestypes=$soctietyvalue->get();



        $query =Godowns::select('*');

        if ($regionFilter || $circleFilter || $societyFilter) {
            $query->whereIn('user_id', function ($subquery) use ($societyTypesFilter, $circleFilter, $regionFilter, $societyFilter) {
                $subquery->select('id')->from('users')->where('circle_id', Auth::user()->circle_id);
                if (!empty($regionFilter)) {
                    // Apply condition for region filter
                    $subquery->where('region_id', $regionFilter);
                }
                if (!empty($societyFilter)) {
                    // Apply condition for society filter
                    $subquery->where('society_id', $societyFilter);
                }
                if ($circleFilter) {
                    // Apply condition for circle filter
                    $subquery->where('circle_id', $circleFilter);
                }
                if ($societyTypesFilter) {
                    $subquery->where('role', Mtr_societytype::where('id', $societyTypesFilter)->value('role_id'));
                }
            });
        } else {

            $query->whereIn('user_id', function ($subquery) use ($societyFilter, $regionFilter) {
                $subquery->select('id')->from('users')->where('circle_id', Auth::user()->circle_id);
            });
        }


        if ($startDate && $endDate) {
            // Apply condition for circle filter
            $query->wherebetween('godowndate', ["$startDate","$endDate"]);
        }
        else{
            if ($startDate) {
                // Apply condition for 'loandate' greater than '$startDate'
                $query->whereDate('godowndate', '>=', $startDate);
            }
            if ($endDate) {
                // Apply condition for 'loandate' greater than '$startDate'
                $query->whereDate('godowndate', '<=', $endDate);
            }

        }

        if($loantypeFilter)
        {
            $query->where('loantype_id', $loantypeFilter);
        }

        return $query->get();

    }
    public  static function getDRFilteredService($request)
    {
        $regionFilter = $request->input('region');
        $circleFilter = $request->input('circle');
        $societyFilter = $request->input('society');
        $endDate = $request->input('endDate');
        $startDate = $request->input('startDate');
        $societyTypesFilter = $request->input('societyTypes');
        $loantypeFilter = $request->input('loantype');

        $soctietyvalue = DB::table('mtr_societytype')
            ->whereIn('role_id', function ($query) use ($circleFilter, $regionFilter) {
                $query->select('role')
                    ->from('users');
                if($regionFilter) {
                    $query->where('region_id', $regionFilter);
                }
                if($circleFilter) {
                    $query->where('circle_id', $circleFilter);
                }
            });

        $societiestypes=$soctietyvalue->get();



        $query =Services::select('*');

        if ($regionFilter || $circleFilter || $societyFilter) {
            $query->whereIn('user_id', function ($subquery) use ($societyTypesFilter, $circleFilter, $regionFilter, $societyFilter) {
                $subquery->select('id')->from('users')->where('circle_id', Auth::user()->circle_id);
                if (!empty($regionFilter)) {
                    // Apply condition for region filter
                    $subquery->where('region_id', $regionFilter);
                }
                if (!empty($societyFilter)) {
                    // Apply condition for society filter
                    $subquery->where('society_id', $societyFilter);
                }
                if ($circleFilter) {
                    // Apply condition for circle filter
                    $subquery->where('circle_id', $circleFilter);
                }
                if ($societyTypesFilter) {
                    $subquery->where('role', Mtr_societytype::where('id', $societyTypesFilter)->value('role_id'));
                }
            });
        } else {

            $query->whereIn('user_id', function ($subquery) use ($societyFilter, $regionFilter) {
                $subquery->select('id')->from('users')->where('circle_id', Auth::user()->circle_id);
            });
        }


        if ($startDate && $endDate) {
            // Apply condition for circle filter
            $query->wherebetween('servicesdate', ["$startDate","$endDate"]);
        }
        else{
            if ($startDate) {
                // Apply condition for 'loandate' greater than '$startDate'
                $query->whereDate('servicesdate', '>=', $startDate);
            }
            if ($endDate) {
                // Apply condition for 'loandate' greater than '$startDate'
                $query->whereDate('servicesdate', '<=', $endDate);
            }

        }

        if($loantypeFilter)
        {
            $query->where('loantype_id', $loantypeFilter);
        }

        return $query->get();

    }
    public  static function getDRFilteredCropLoan($request)
    {
        $regionFilter = $request->input('region');
        $circleFilter = $request->input('circle');
        $societyFilter = $request->input('society');
        $endDate = $request->input('endDate');
        $startDate = $request->input('startDate');
        $societyTypesFilter = $request->input('societyTypes');
        $loantypeFilter = $request->input('loantype');

        $soctietyvalue = DB::table('mtr_societytype')
            ->whereIn('role_id', function ($query) use ($circleFilter, $regionFilter) {
                $query->select('role')
                    ->from('users');
                if($regionFilter) {
                    $query->where('region_id', $regionFilter);
                }
                if($circleFilter) {
                    $query->where('circle_id', $circleFilter);
                }
            });

        $societiestypes=$soctietyvalue->get();



        $query =Croploan_entry::select('*');

        if ($regionFilter || $circleFilter || $societyFilter) {
            $query->whereIn('user_id', function ($subquery) use ($societyTypesFilter, $circleFilter, $regionFilter, $societyFilter) {
                $subquery->select('id')->from('users')->where('circle_id', Auth::user()->circle_id);
                if (!empty($regionFilter)) {
                    // Apply condition for region filter
                    $subquery->where('region_id', $regionFilter);
                }
                if (!empty($societyFilter)) {
                    // Apply condition for society filter
                    $subquery->where('society_id', $societyFilter);
                }
                if ($circleFilter) {
                    // Apply condition for circle filter
                    $subquery->where('circle_id', $circleFilter);
                }
                if ($societyTypesFilter) {
                    $subquery->where('role', Mtr_societytype::where('id', $societyTypesFilter)->value('role_id'));
                }
            });
        } else {

            $query->whereIn('user_id', function ($subquery) use ($societyFilter, $regionFilter) {
                $subquery->select('id')->from('users')->where('circle_id', Auth::user()->circle_id);
            });
        }


        if ($startDate && $endDate) {
            // Apply condition for circle filter
            $query->wherebetween('croploandate', ["$startDate","$endDate"]);
        }
        else{
            if ($startDate) {
                // Apply condition for 'loandate' greater than '$startDate'
                $query->whereDate('croploandate', '>=', $startDate);
            }
            if ($endDate) {
                // Apply condition for 'loandate' greater than '$startDate'
                $query->whereDate('croploandate', '<=', $endDate);
            }

        }

        if($loantypeFilter)
        {
            $query->where('loantype_id', $loantypeFilter);
        }

        return $query->get();

    }
}
