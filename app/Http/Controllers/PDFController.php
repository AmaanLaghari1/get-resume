<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Barryvdh\DomPDF\Facade as Pdf;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    //
    public function downloadPdf($id){
        $resume = Resume::where('id', $id)->first();
        $pdf = FacadePdf::loadView('deliverables.resume', ['resume'=>$resume]);
        return $pdf->download('resume.pdf');
    }
}
