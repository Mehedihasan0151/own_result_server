<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;
use Smalot\PdfParser\Parser;
use Illuminate\Support\Facades\Log;

class ResultController extends Controller
{
    public function index()
    {
        return view('results.index');
    }

    // public function upload(Request $request)
    // {
    //     $request->validate([
    //         'pdf' => 'required|mimes:pdf',
    //     ]);

    //     // ✅ Store the uploaded file in storage/app/private/uploads/
    //     $path = $request->file('pdf')->store('uploads');
    //     $filePath = storage_path('app/private/uploads/' . basename($path));

    //     if (!file_exists($filePath)) {
    //         return back()->with('error', "File not found at path: $filePath");
    //     }

    //     $parser = new Parser();
    //     $pdf = $parser->parseFile($filePath);
    //     $text = $pdf->getText();

    //     $count = 0;

    //     // ✅ 1. Parse PASSED students — (4th: 2.57, 3rd: 2.37, ...)
    //     preg_match_all(
    //         '/(\d+)\s*\(gpa4:\s*([\d.]+),,\s*gpa3:\s*([\d.]+),\s*gpa2:\s*([\d.]+),\s*gpa1:\s*([\d.]+)\)/i',
    //         $text,
    //         $passedMatches,
    //         PREG_SET_ORDER
    //     );

    //     foreach ($passedMatches as $m) {
    //         Result::updateOrCreate(
    //             ['roll' => $m[1]],
    //             [
    //                 'gpa4'    => $m[2],
    //                 'gpa3'    => $m[3],
    //                 'gpa2'    => $m[4],
    //                 'gpa1'    => $m[5],
    //                 'ref_sub' => null, // no failed subjects
    //             ]
    //         );
    //         $count++;
    //     }

    //     // ✅ 2. Parse FAILED students — { 4th: ref, 3rd: ref, ..., ref_sub: ... }
    //     preg_match_all(
    //         '/(\d+)\s*\{\s*gpa4:\s*(ref|[\d.]+),\s*gpa3:\s*(ref|[\d.]+),\s*gpa2:\s*(ref|[\d.]+),\s*gpa1:\s*(ref|[\d.]+),\s*ref_sub:\s*([^}]+)\}/i',
    //         $text,
    //         $failedMatches,
    //         PREG_SET_ORDER
    //     );
        

    //     foreach ($failedMatches as $m) {
    //         $refSubs = trim(preg_replace('/\s+/', ' ', $m[6])); // clean up whitespace/newlines

    //         Result::updateOrCreate(
    //             ['roll' => $m[1]],
    //             [
    //                 'gpa4'    => $m[2],
    //                 'gpa3'    => $m[3],
    //                 'gpa2'    => $m[4],
    //                 'gpa1'    => $m[5],
    //                 'ref_sub' => $refSubs, // store failed subjects list
    //             ]
    //         );
    //         $count++;
    //     }

    //     // Log::info("Inserted or updated $count records from PDF");
    //     return back()->with('success', "$count results imported successfully!");
    // }

    // -------- 5 semester upload ----------
    public function upload(Request $request)
    {
        $request->validate([
            'pdf' => 'required|mimes:pdf',
        ]);

        // Store file in storage/app/private/uploads/
        $path = $request->file('pdf')->store('uploads');
        $filePath = storage_path('app/private/uploads/' . basename($path));

        if (!file_exists($filePath)) {
            return back()->with('error', "File not found at path: $filePath");
        }

        $parser = new Parser();
        $pdf = $parser->parseFile($filePath);
        $text = $pdf->getText();

        $count = 0;

        // ✅ 1. Parse PASSED students — (4th: 2.57, 3rd: 2.37, ...)
        preg_match_all(
            '/(\d+)\s*\(gpa5:\s*([\d.]+),\s*gpa4:\s*([\d.]+),\s*gpa3:\s*([\d.]+),\s*gpa2:\s*([\d.]+),\s*gpa1:\s*([\d.]+)\)/i',
            $text,
            $passedMatches,
            PREG_SET_ORDER
        );

        foreach ($passedMatches as $m) {
            Result::updateOrCreate(
                ['roll' => $m[1]],
                [
                    'gpa5'    => $m[2],
                    'gpa4'    => $m[3],
                    'gpa3'    => $m[4],
                    'gpa2'    => $m[5],
                    'gpa1'    => $m[6],
                    'ref_sub' => null, // no failed subjects
                ]
            );
            $count++;
        }

        // ✅ 2. Parse FAILED students — { 4th: ref, 3rd: ref, ..., ref_sub: ... }
        preg_match_all(
            '/(\d+)\s*\{\s*gpa5:\s*(ref|[\d.]+),\s*gpa4:\s*(ref|[\d.]+),\s*gpa3:\s*(ref|[\d.]+),\s*gpa2:\s*(ref|[\d.]+),\s*gpa1:\s*(ref|[\d.]+),\s*ref_sub:\s*([^}]+)\}/i',
            $text,
            $failedMatches,
            PREG_SET_ORDER
        );
        

        foreach ($failedMatches as $m) {
            $refSubs = trim(preg_replace('/\s+/', ' ', $m[7])); // clean up whitespace/newlines

            Result::updateOrCreate(
                ['roll' => $m[1]],
                [
                    'gpa5'    => $m[2],
                    'gpa4'    => $m[3],
                    'gpa3'    => $m[4],
                    'gpa2'    => $m[5],
                    'gpa1'    => $m[6],
                    'ref_sub' => $refSubs, // store failed subjects list
                ]
            );
            $count++;
        }

        // Log::info("Inserted or updated $count records from PDF");
        return back()->with('success', "$count results imported successfully!");
    }




    // -------- search ----------
    public function search(Request $request)
    {
        $result = null;

        if ($request->filled('roll')) {
            
            $result = Result::where('roll', $request->roll)->first();
        }

        return view('result', compact('result'));
    }
}
