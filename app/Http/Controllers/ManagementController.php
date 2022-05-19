<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FloorList as Floor;
use App\Models\CellModel as Cell;
class ManagementController extends Controller
{
    public function index(Request $request)
    {
        return view('management.form',
         [
            'floor_list'=>Floor::all(),
            'cell'=>Cell::first()
         ]);
    }

    public function createFloor(Request $request)
    {
            return Floor::create([
                'name'=>$request['floorName']
            ]);
    }
}