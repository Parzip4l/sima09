<?php

namespace App\Http\Controllers;

use App\Kelahiran;
use App\User;
use App\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use PDF;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;


class PdfController extends Controller
{

    public function generatePdf(Request $request, $id)
    {
        // generate view blade menjadi html
        $kelahiran = Kelahiran::findOrFail($id);

        // Buat view PDF menggunakan Bootstrap
        
        // konfigurasi dompdf
        // Ambil data yang diperlukan untuk halaman PDF
        
        // Buat objek Dompdf baru
        $pdf = new Dompdf();
        $pdf->set_option('isRemoteEnabled', true);
        $pdf->set_option('isHtml5ParserEnabled', true);
        // Render view blade.php ke string HTML
        $page = View::make('pages.kelahiran.viewpdf', compact('kelahiran'))->render();
        
        // Masukkan string HTML ke objek Dompdf untuk di-render menjadi file PDF
        $pdf->loadHtml($page);
        // Atur opsi rendering Dompdf
        $pdf->setPaper('A4', 'portrait');
        
        // Render file PDF ke dalam buffer output
        $pdf->render();
        $output = $pdf->output();
        
        // Buat nama file PDF yang akan disimpan di direktori storage
        $fileName = 'laporan_kelahiran' . $id . '.pdf';
        
        // Simpan file PDF di direktori storage
        Storage::put($fileName, $pdf->output());
        
        // Ambil URL dari file PDF yang telah disimpan
        $url = Storage::path($fileName);
        
        // Redirect pengguna ke URL file PDF yang telah d   isimpan
        return response()->download($url);
    }

    public function downloadPdf($filename)
    {
        $fileName = $request->fileName;
        $path = storage_path('app/' . $filename);
        if (!file_exists($path)) {
            abort(404);
        }

        $headers = [
            'Content-Type' => 'application/pdf',
        ];

        return response()->download($path, $filename, $headers);
    }
}
