<?php

namespace App\Http\Controllers;

use App\AwardStories;
use App\CertificationTrophys;
use App\Constructions;
use App\ConstructionsImgs;
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
use App\SubBanners;
use App\TechnologyZones;
use App\Tenders;
use App\TendersImgs;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $performances = Performances::all()->sortByDesc('sort');
        $tenders = Tenders::all()->sortByDesc('tender_date')->take(4);
        $sub_banner = SubBanners::where('page', '首頁')->first();
        return view('front.index', compact('performances', 'tenders', 'sub_banner'));
    }

    public function vision()
    {
        $sub_banner = SubBanners::where('page', '理念願景')->first();
        return view('front.vision.index', compact('sub_banner'));
    }

    public function history()
    {
        $lists = Histories::all()->sortBy('year');
        $sub_banner = SubBanners::where('page', '公司沿革')->first();
        return view('front.history.index', compact('lists', 'sub_banner'));
    }

    public function security_policy()
    {
        $lists = SecurityPolities::orderby('sort', 'asc')->get();
        $sub_banner = SubBanners::where('page', '職安品質政策')->first();
        return view('front.security_policy.index', compact('lists', 'sub_banner'));
    }

    public function job_opportunities()
    {
        $lists = JobOpportunities::all();
        $units = JobOpportunitieUnits::all();
        $sub_banner = SubBanners::where('page', '職缺公告')->first();
        return view('front.job_opportunity.index', compact('lists', 'units', 'sub_banner'));
    }

    public function tender()
    {
        $lists = Tenders::orderby('sort', 'asc')->paginate();
        $sub_banner = SubBanners::where('page', '得標資訊')->first();
        return view('front.tender.index', compact('lists', 'sub_banner'));
    }

    public function tender_detail($id)
    {
        $list = Tenders::find($id);
        $imgs = TendersImgs::where('tender_id', $id)->get();
        $list->view_times = $list->view_times + 1;
        $list->save();
        $sub_banner = SubBanners::where('page', '得標資訊')->first();
        return view('front.tender.detail', compact('list', 'imgs', 'id', 'sub_banner'));
    }

    public function serve()
    {
        $sub_banner = SubBanners::where('page', '服務項目')->first();
        return view('front.serve.index', compact('sub_banner'));
    }

    public function award_stories()
    {
        $lists = AwardStories::orderBy('sort', 'asc')->get();
        $sub_banner = SubBanners::where('page', '得獎事蹟')->first();
        return view('front.award_stories.index', compact('lists', 'sub_banner'));
    }

    public function certification_trophy()
    {
        $lists = CertificationTrophys::orderBy('sort', 'asc')->get();
        $sub_banner = SubBanners::where('page', '認證')->first();
        return view('front.certification_trophy.index', compact('lists', 'sub_banner'));
    }

    public function performance($id)
    {
        $type_name = '實績';
        $lists = Performances::where('type_id', $id)->orderby('sort', 'asc')->paginate(4);

        if ($id == 1)
            $type_name = '土木工程';
        elseif ($id == 2)
            $type_name = '環保工程';
        elseif ($id == 3)
            $type_name = '建築工程';
        elseif ($id == 4)
            $type_name = '其他';

        $sub_banner = SubBanners::where('page', '工程實績/' . $type_name)->first();

        return view('front.performance.index', compact('lists', 'id', 'type_name', 'sub_banner'));
    }

    public function constructions($id)
    {
        $type_name = '實績';
        $lists = Constructions::where('type_id', $id)->orderby('sort', 'asc')->paginate(4);

        if ($id == 1)
            $type_name = '土木工程';
        elseif ($id == 2)
            $type_name = '環保工程';
        elseif ($id == 3)
            $type_name = '建築工程';
        elseif ($id == 4)
            $type_name = '其他';

        $sub_banner = SubBanners::where('page', '在建工程/' . $type_name)->first();

        return view('front.constructions.index', compact('lists', 'id', 'type_name', 'sub_banner'));
    }

    public function performance_detail($id)
    {
        $list = Performances::find($id);
        $imgs = PerformancesImgs::where('performances_id', $id)->get();
        // $imgs = PerformancesImgs::all();

        // if ($_SESSION[$list->id . 'come'] != 'v') {
        $list->view_times = $list->view_times + 1;
        $list->save();
        // $_SESSION[$list->id . 'come'] = 'v';

        $type_name = '實績';
        if ($list->type_id == 1)
            $type_name = '土木工程';
        elseif ($list->type_id == 2)
            $type_name = '環保工程';
        elseif ($list->type_id == 3)
            $type_name = '建築工程';
        elseif ($list->type_id == 4)
            $type_name = '其他';

        $sub_banner = SubBanners::where('page', '工程實績/' . $type_name)->first();

        return view('front.performance.detail', compact('list', 'imgs', 'type_name', 'id', 'sub_banner'));
    }

    public function constructions_detail($id)
    {
        $list = Constructions::find($id);
        $imgs = ConstructionsImgs::where('construction_id', $id)->get();
        // $imgs = PerformancesImgs::all();
        $list->view_times = $list->view_times + 1;
        $list->save();
        // dd($imgs);

        $type_name = '實績';
        if ($list->type_id == 1)
            $type_name = '土木工程';
        elseif ($list->type_id == 2)
            $type_name = '環保工程';
        elseif ($list->type_id == 3)
            $type_name = '建築工程';
        elseif ($list->type_id == 4)
            $type_name = '其他';

        $sub_banner = SubBanners::where('page', '在建工程/' . $type_name)->first();

        return view('front.constructions.detail', compact('list', 'imgs', 'type_name', 'id', 'sub_banner'));
    }

    public function technology($id)
    {
        $zone = TechnologyZones::with('blocks')->orderBy('sort', 'asc')->find($id);
        return view('front.technology.index', compact('zone'));
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
        $sub_banner = SubBanners::where('page', '職安資訊')->first();
        return view('front.occupational_safety.index', compact('minutes', 'plans', 'decrees', 'cases', 'links', 'zones', 'zone_seting', 'sub_banner'));
    }

    public function contact_us()
    {
        $sub_banner = SubBanners::where('page', '聯絡我們')->first();
        return view('front.contact_us.index', compact('sub_banner'));
    }
}
