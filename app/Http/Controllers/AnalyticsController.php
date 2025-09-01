<?php

namespace App\Http\Controllers;

use App\Models\Analytics;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($website_id)
    {
        return view('websites.analytics', ['analytics' => Analytics::where('website_id', $website_id)->get()]);
    }
}
