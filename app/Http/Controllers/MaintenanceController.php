<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NewMaintenanceRequest as MaintenanceRequest;
use App\Models\FloorList as Floor;
use App\Models\CellModel as Cell;
use App\Models\MaintenanceModel as Maintenance;
use App\Models\MaintenanceStatus;
use App\Models\Status;

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
        $isDeleted = Maintenance::find($request['id'])->delete();
        if($isDeleted)
        {
            return MaintenanceStatus::where('maintenance_id',$request['id'])->delete();
        }
    }

    public function UpdateMaintenance(MaintenanceRequest $request)
    {
        $isUpdated = Maintenance::find($request['id'])->update([
            'area_code'=>$request['areaCode'],
            'description'=>$request['description'],
            'floor_id'=>$request['floor_no'],
            'row'=>$request['row'],
           
            'column'=>$request['column']
        ]);
        if($isUpdated)
        {
            $this->setMaintenanceStatus(Maintenance::find($request['id']));
        }
    }

    public function List(Request $request)
    {
        return view('maintenance.List',[
          
            'maintenance'=>Maintenance::where('id',$request['id'])->first(),
            'statusList'=>Status::all()
        ]);
    }


    public function createNewMaintenance(MaintenanceRequest $request)
    {
        $isCreated =  Maintenance::create([
            'area_code'=>$request['areaCode'],
            'description'=>$request['description'],
            'floor_id'=>$request['floor_no'],
            'row'=>$request['row'],
            'column'=>$request['column']
        ]);
        if($isCreated)
        {
            $this->setMaintenanceStatus($isCreated);
        }
    }

    private function setMaintenanceStatus($Maintenance)
    {       
        for($r = 1; $r <= $Maintenance->row; $r++)
        {
            for($c = 1; $c <= $Maintenance->column; $c++)
            {
                if(!MaintenanceStatus::doesExists(['column_no'=>$c,'row_no'=>$r,'mid'=>$Maintenance->id]))
                {
                    MaintenanceStatus::create([
                        'maintenance_id'=>$Maintenance->id,
                        'column_no'=>$c,
                        'row_no'=>$r,
                        'status_id'=>2 // by default
                    ]);
                } else {
                   
                
                    MaintenanceStatus::where('maintenance_id',$Maintenance->id)
                    ->where('column_no','>',$Maintenance->column)
                    ->OrWhere('row_no','>',$Maintenance->row)
                    ->delete();

                    // MaintenanceStatus::where('maintenance_id',$Maintenance->id)
                    // ->where('row_no','>',$Maintenance->row)
                    // ->delete();
                  
                   
                }
              
            }
        }

         
           
    }

    public function UpdateStatus(Request $request)
    {
        return MaintenanceStatus::where('maintenance_id',$request['maintenanceID'])
        ->where('column_no',$request['column'])
        ->where('row_no',$request['row'])
        ->update([
            'status_id'=>$request['status']
        ]);
    }

}