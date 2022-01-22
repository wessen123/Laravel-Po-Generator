<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Helpers\Helper;

class TestingHelperController extends Controller
{
    function index(){

        Helper::test();
    }
}
