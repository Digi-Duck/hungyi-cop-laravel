<?php

namespace App\Http\Controllers;

use App\AwardStories;
use App\CertificationTrophys;
use App\Histories;
use App\JobOpportunities;
use App\JobOpportunitieUnits;
use App\Performances;
use App\PerformancesImgs;
use App\SafetyCases;
use App\SafetyDecrees;
use App\SafetyLinks;
use App\SafetyMinutes;
use App\SafetyPlans;
use App\SafetyZones;
use App\SafetyZonesSetings;
use App\SecurityPolities;
use App\Tenders;
use App\TendersImgs;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
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

    public function tender_detail($id)
    {
        $list = Tenders::find($id);
        $imgs = TendersImgs::all();
        return view('front.tender.detail', compact('list', 'imgs', 'id'));
    }

    public function serve()
    {
        return view('front.serve.index');
    }

    public function award_stories()
    {
        $lists = AwardStories::all()->sortByDesc('sort');
        return view('front.award_stories.index', compact('lists'));
    }

    public function certification_trophy()
    {
        $lists = CertificationTrophys::all()->sortByDesc('sort');
        return view('front.certification_trophy.index', compact('lists'));
    }

    public function performance($id)
    {
        $lists = Performances::all();
        $type_name = '實績';

        if ($id == 1)
            $type_name = '土木工程';
        elseif ($id == 2)
            $type_name = '環保工程';
        elseif ($id == 3)
            $type_name = '建築工程';
        elseif ($id == 4)
            $type_name = '其他';

        return view('front.performance.index', compact('lists', 'id', 'type_name'));
    }

    public function performance_detail($id)
    {
        $list = Performances::find($id);
        $imgs = PerformancesImgs::all();

        $type_name = '實績';
        if ($id == 1)
            $type_name = '土木工程';
        elseif ($id == 2)
            $type_name = '環保工程';
        elseif ($id == 3)
            $type_name = '建築工程';
        elseif ($id == 4)
            $type_name = '其他';

        return view('front.performance.detail', compact('list', 'imgs', 'type_name', 'id'));
    }

    public function occupational_safety()
    {
        $minutes = SafetyMinutes::all();
        $plans = SafetyPlans::all();
        $decrees = SafetyDecrees::all();
        $cases = SafetyCases::all();
        $links = SafetyLinks::all();
        $zones = SafetyZones::all()->sortByDesc('sort')->take(4);
        $zone_seting = SafetyZonesSetings::find(1);
        return view('front.occupational_safety.index', compact('minutes', 'plans', 'decrees', 'cases', 'links', 'zones', 'zone_seting'));
    }

    public function contact_us()
    {
        return view('front.contact_us.index');
    }
}
