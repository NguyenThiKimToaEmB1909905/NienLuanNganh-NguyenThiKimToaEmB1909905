<?php

namespace App\Http\Controllers;

use DB;
use App\Models\contact;
use App\Models\Social;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Session;

// trả về trang j đó khi thành công or thất bại
session_start();

class ContactController extends Controller
{
    public function introduce(){// giới thiệu
        return view('pages.introduce-news.introduce');

    }
    public function news(){
        return view('pages.introduce-news.news');
    }

}
