<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FloorList as Floor;
class ManagementController extends Controller
{
    public function index(Request $request)
    {
        return view('management.form');
    }

    public function createFloor(Request $request)
    {
            return Floor::create([
                'name'=>$request['floorName']
            ]);
    }
}
