<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Part;
use Illuminate\Support\Carbon;
use DateTime;
use DateTimeZone;
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
     * @return \Illuminate\View\View
     */
    public function index()
    {

        $usercount = User::where('role_id' , 3)->count();
        $vendorcount = User::where('role_id' , 2)->count();
        $partcount = Part::count();
        $date =date('Y-m-d');

            $all_dates = [];
            $range_from_date = new Carbon(date('Y-m-d', strtotime('-6 day', strtotime($date))));
            $range_to_date = new Carbon($date);

            while ($range_from_date->lte($range_to_date)) {
                $all_dates[] = $range_from_date->toDateString();
                $range_from_date->addDay();
            }
            $dated=[];
            foreach ($all_dates as $range_date) {
                array_push($dated , $range_date);

                $start = $range_date . " 00:00:00";
                $end = $range_date . " 23:59:59";

                $week[] = Part::where('created_at', '>', $start)->where('created_at', '<', $end)
        // ->where('deleted_at' , '=' , null)
                    ->count();
             }
             $currentYear = date('Y');
        $all_months = [];

        // Generate an array of months for the current year
        for ($month = 1; $month <= 12; $month++) {
            $all_months[] = $currentYear . '-' . str_pad($month, 2, '0', STR_PAD_LEFT);
        }

        $monthly_counts = [];
        foreach ($all_months as $month) {
            $start = $month . "-01 00:00:00";
            $end = $month . "-" . date('t', strtotime($month)) . " 23:59:59";

            $count = User::where('created_at', '>=', $start)
                ->where('created_at', '<=', $end)
                // ->where('deleted_at', '=', null)
                ->count();

            $monthly_counts[] = $count;
        }
        // Extract values without keys
        $values = json_encode($monthly_counts);
        $week = json_encode($week);
        $dated = json_encode($dated);
        return view('dashboard' , compact('usercount', 'vendorcount', 'partcount','week' , 'values','dated'));
    }



    public function getMonthData(){

        $currentYear = date('Y');
        $all_months = [];

        // Generate an array of months for the current year
        for ($month = 1; $month <= 12; $month++) {
            $all_months[] = $currentYear . '-' . str_pad($month, 2, '0', STR_PAD_LEFT);
        }

        $monthly_counts = [];
        foreach ($all_months as $month) {
            $start = $month . "-01 00:00:00";
            $end = $month . "-" . date('t', strtotime($month)) . " 23:59:59";

            $count = User::where('created_at', '>=', $start)
                ->where('created_at', '<=', $end)
                // ->where('deleted_at', '=', null)
                ->count();

            $monthly_counts[] = $count;
        }
        // Extract values without keys
        $values = array_values($monthly_counts);
    }
}
