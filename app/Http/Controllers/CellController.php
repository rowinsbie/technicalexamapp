<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateCellRequest;
use App\Models\CellModel as Cell;
class CellController extends Controller
{
    public function updateCell(UpdateCellRequest $request)
    {

        
        return Cell::first()->update([
            'max_column'=>$request['column'],
            'max_row'=>$request['row']
        ]);
    }
}
