<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NewMaintenanceRequest;
use App\Models\FloorList as Floor;
use App\Models\CellModel as Cell;
use App\Models\MaintenanceModel as Maintenance;
class MaintenanceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home',[
            'maintenance'=>Maintenance::all()
        ]);
    }

    public function MaintenanceForm(Request $request)
    {
        return view('maintenance.form',[
            'cell'=>Cell::first(),
            'FloorList'=>Floor::all()
        ]);
    }


    public function createNewMaintenance(Request $request)
    {
        return Maintenance::create([
            'area_code'=>$request['areaCode'],
            'description'=>$request['description'],
            'floor_id'=>$request['floor_no'],
            'row'=>$request['row'],
            'column'=>$request['column']
        ]);
    }
}
