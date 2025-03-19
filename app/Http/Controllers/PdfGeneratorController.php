<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\User;


class PdfGeneratorController extends Controller
{
   
public function index($id)
{
    $user = User::findOrFail($id);
    $pdf = PDF::loadView('pdf.resume', compact('user'));

    return $pdf->download('resume.pdf');
}
}
