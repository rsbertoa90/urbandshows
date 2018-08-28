<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use PDF;
use Carbon\Carbon;

class PdfController extends Controller
{
    public function prices()
    {
        $categories = Category::all();
        $today = Carbon::now()->format('d/m/Y');
        $pdf = PDF::loadView('pdf.ListaDePrecios', compact('categories','today'));
        return $pdf->download('Precios-Mates-Fabi.pdf');
    }
}
