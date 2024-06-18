<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Barryvdh\DomPDF\Facade as Pdf;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    //
    public function downloadPdf($id, $tempId){
        $resume = Resume::where('id', $id)->first();
        if($tempId == 1){
            $pdf = FacadePdf::loadView('deliverables.resume', ['resume'=>$resume]);
            return $pdf->download('resume.pdf');
        }
        elseif($tempId == 2){
            $pdf = FacadePdf::loadView('deliverables.resume2', ['resume'=>$resume]);
            return $pdf->download('resume2.pdf');
        }
    }
}
