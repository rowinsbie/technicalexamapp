<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NewMaintenanceRequest as MaintenanceRequest;
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

    public function Update(Request $request)
    {
        $data = Maintenance::find($request['id']);
        if(!$data)
        {
            abort(404);
        }

       return view('maintenance.updateForm',[
        'cell'=>Cell::first(),
        'FloorList'=>Floor::all(),
        'maintenance'=>$data
    ]);
    }

    public function Delete(Request $request)
    {
        return Maintenance::find($request['id'])->delete();
    }

    public function UpdateMaintenance(MaintenanceRequest $request)
    {
        return Maintenance::find($request['id'])->update([
            'area_code'=>$request['areaCode'],
            'description'=>$request['description'],
            'floor_id'=>$request['floor_no'],
            'row'=>$request['row'],
            'column'=>$request['column']
        ]);
    }


    public function createNewMaintenance(MaintenanceRequest $request)
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
