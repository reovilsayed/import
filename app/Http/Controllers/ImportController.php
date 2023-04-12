<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Services\ProductImport;

class ImportController extends Controller
{

    public function index(Request $request)
    {
        $sheet = $request->file('sheet')->store('sheets');
        Excel::import(new ProductImport, $sheet);
        return back();
    }
}
