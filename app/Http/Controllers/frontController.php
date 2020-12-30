<?php

namespace App\Http\Controllers;

use App\Histories;
use App\JobOpportunities;
use App\JobOpportunitieUnits;
use App\SecurityPolities;
use App\Tenders;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        return view('front.index');
    }

    public function history()
    {
        $lists = Histories::all()->sortBy('year');
        return view('front.history.index', compact('lists'));
    }

    public function security_policy()
    {
        $list = SecurityPolities::find(1);
        return view('front.security_policy.index', compact('list'));
    }

    public function job_opportunities()
    {
        $lists = JobOpportunities::all();
        $units = JobOpportunitieUnits::all();
        return view('front.job_opportunity.index', compact('lists', 'units'));
    }

    public function tender()
    {
        $lists = Tenders::all();
        return view('front.tender.index', compact('lists'));
    }
}
