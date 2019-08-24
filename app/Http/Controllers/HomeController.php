<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://api.exchangeratesapi.io/latest');
        $exchange = json_decode($response->getBody());
        $eur_ron = $exchange->rates->RON;
        $exc_date = $exchange->date;

        if(Gate::allows('see-dashboard'))
            return view('dashboard', compact('eur_ron', 'exc_date'));

        return view('profile.edit');
    }
}
