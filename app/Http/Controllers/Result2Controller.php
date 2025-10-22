<?php

namespace App\Http\Controllers;

use Smalot\PdfParser\Parser;
use App\Models\Result;
use Illuminate\Http\Request;

class Result2Controller extends Controller
{
    public function index()
    {
        return view('results.index');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'pdf' => 'required|mimes:pdf|max:10240',
        ]);

        $file = $request->file('pdf');
        $parser = new Parser();
        $pdf = $parser->parseFile($file->getPathName());
        $text = $pdf->getText();

        // Split by roll number pattern
        preg_match_all('/(\d+)\s*{([^}]*)}/', $text, $matches, PREG_SET_ORDER);

        foreach ($matches as $match) {
            $roll = trim($match[1]);
            $content = trim($match[2]);

            // Extract GPA and refs
            $data = [
                'roll' => $roll,
                'gpa1' => self::extractGpa($content, 'gpa1'),
                'gpa2' => self::extractGpa($content, 'gpa2'),
                'gpa3' => self::extractGpa($content, 'gpa3'),
                'gpa4' => self::extractGpa($content, 'gpa4'),
                'gpa5' => self::extractGpa($content, 'gpa5'),
                'ref_subjects' => self::extractRefs($content),
            ];

            Result::updateOrCreate(['roll' => $roll], $data);
        }

        return back()->with('success', 'PDF uploaded and parsed successfully!');
    }

    private static function extractGpa($text, $key)
    {
        if (preg_match("/$key:\s*([\d\.]+)/", $text, $m)) {
            return (float)$m[1];
        }
        return null; // skip ref or missing GPA
    }

    private static function extractRefs($text)
    {
        if (preg_match('/ref_sub:\s*([^)]+?\(T\)[^}]*)/si', $text, $m)) {
            // Example match: "26831(T), 25912(T)"
            $refs = trim($m[1]);
            // Split by comma and clean spaces
            $refs = array_map('trim', preg_split('/,\s*/', $refs));
            return $refs;
        }
        return null;
    }

    public function search(Request $request)
    {
        $roll = $request->input('roll');
        $result = Result::where('roll', $roll)->first();

        if (!$result) {
            return view('results.search', ['error' => 'No record found']);
        }

        return view('results.single', compact('result'));
    }
}
