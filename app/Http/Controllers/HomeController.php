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
        $exchange = $this->exchangeApi('RON');

        if (Gate::allows('see-dashboard'))
            return view('dashboard', compact('exchange'));

        return view('profile.edit');
    }

    public function exchangeApi($currency)
    {
        $client = new Client();
        $response = $client->request('GET', 'https://api.exchangeratesapi.io/latest');
        $exchange = json_decode($response->getBody());

        return [
            'currency' => $exchange->rates->$currency,
            'date' => $exchange->date
        ];
    }
}
