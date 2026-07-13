<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OfertaController extends Controller
{
    public function index()
    {
        $response = Http::withoutVerifying()
            ->withHeaders([
                'User-Agent' => 'GameDeals-Proyecto/1.0 (tucorreo@ejemplo.com)',
            ])
            ->get('https://www.cheapshark.com/api/1.0/deals', [
                'storeID' => 1,
                'upperPrice' => 100,
            ]);

        $ofertas = $response->json();

        return view('ofertas', ['ofertas' => $ofertas]);
    }
}