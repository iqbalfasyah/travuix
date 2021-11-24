<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TravelPackage;
class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $travelPackages = TravelPackage::with('galleries')
            ->take(4)
            ->get();
        return view('pages.home', [
            'TravelPackages' => $travelPackages,
        ]);
    }
}
