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
            'about' => [
                'page' => '關於我們',
                'img' => 'img/00-banner/01-about.png'
            ],
            'news' => [
                'page' => '動態消息',
                'img' => 'img/00-banner/02-news.png'
            ],
            'serve' => [
                'page' => '服務項目',
                'img' => 'img/00-banner/03-server.png'
            ],
            'award' => [
                'page' => '得獎及認證',
                'img' => 'img/00-banner/04-award.png'
            ],
            'performance' => [
                'page' => '工程實績',
                'img' => 'img/00-banner/05-performance.png'
            ],
            'construction' => [
                'page' => '在建工程',
                'img' => 'img/00-banner/06-constructions.png'
            ],
            'technology' => [
                'page' => '技術專區',
                'img' => 'img/00-banner/07-technology.png'
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
