<?php

namespace App\Http\Controllers;

use App\TravelPackage;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index(Request $request, $slug)
    {
        $travelPackage = TravelPackage::with('galleries')
            ->where('slug', $slug)
            ->firstOrFail();

        return view('pages.detail', [
            'TravelPackage' => $travelPackage,
        ]);
    }
}
