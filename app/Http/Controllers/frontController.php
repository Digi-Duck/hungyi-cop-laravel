<?php

namespace App\Http\Controllers;

use App\AwardStories;
use App\CertificationTrophys;
use App\Histories;
use App\JobOpportunities;
use App\JobOpportunitieUnits;
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

    public function occupational_safety()
    {
        return view('front.occupational_safety.index');
    }

    public function contact_us()
    {
        return view('front.contact_us.index');
    }
}
