<?php

namespace App\Http\Controllers;

use App\SafetyZonesSetings;
use App\SecurityPolities;
use App\SubBanners;
use Illuminate\Http\Request;

class InitialController extends Controller
{
    //
    public function initial()
    {
        SafetyZonesSetings::create([
            'title' => '特殊專區',
            'switch' => null
        ]);

        $subBannerData = array(
            'index' => [
                'page' => '首頁',
                'img' => 'img/00-banner/00-index.jpg'
            ],
            'vision' => [
                'page' => '理念願景',
                'img' => 'img/00-banner/01-about.png'
            ],
            'history' => [
                'page' => '公司沿革',
                'img' => 'img/00-banner/01-about.png'
            ],
            'security_policy' => [
                'page' => '職安品質政策',
                'img' => 'img/00-banner/01-about.png'
            ],
            'job_opportunities' => [
                'page' => '職缺公告',
                'img' => 'img/00-banner/02-news.png'
            ],
            'tender' => [
                'page' => '得標資訊',
                'img' => 'img/00-banner/02-news.png'
            ],
            'serve' => [
                'page' => '服務項目',
                'img' => 'img/00-banner/03-server.png'
            ],
            'award_stories' => [
                'page' => '得獎事蹟',
                'img' => 'img/00-banner/04-award.png'
            ],
            'certification_trophy' => [
                'page' => '認證',
                'img' => 'img/00-banner/04-award.png'
            ],
            'performance_1' => [
                'page' => '工程實績/土木工程',
                'img' => 'img/00-banner/05-performance.png'
            ],
            'performance_2' => [
                'page' => '工程實績/環保工程',
                'img' => 'img/00-banner/05-performance.png'
            ],
            'performance_3' => [
                'page' => '工程實績/建築工程',
                'img' => 'img/00-banner/05-performance.png'
            ],
            'performance_4' => [
                'page' => '工程實績/其他',
                'img' => 'img/00-banner/05-performance.png'
            ],
            'construction_1' => [
                'page' => '在建工程/土木工程',
                'img' => 'img/00-banner/06-constructions.png'
            ],
            'construction_2' => [
                'page' => '在建工程/環保工程',
                'img' => 'img/00-banner/06-constructions.png'
            ],
            'construction_3' => [
                'page' => '在建工程/建築工程',
                'img' => 'img/00-banner/06-constructions.png'
            ],
            'construction_4' => [
                'page' => '在建工程/其他',
                'img' => 'img/00-banner/06-constructions.png'
            ],
            'occupational' => [
                'page' => '職安資訊',
                'img' => 'img/00-banner/08-occupational.png'
            ],
            'contact' => [
                'page' => '聯絡我們',
                'img' => 'img/00-banner/09-contact.png'
            ],
        );

        foreach ($subBannerData as $key => $value) {
            SubBanners::create([
                'page' => $value['page'],
                'img' => $value['img']
            ]);
        }
    }
}
