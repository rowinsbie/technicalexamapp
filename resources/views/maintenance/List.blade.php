@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class=" card text-center">
               <div class="card-header">
               <h2>Preview table</h2>
               </div>
               <div class="card-body">
                    <h3>{{$maintenance->description}}</h3>

                    <div>
                   
                    @for($r = 1; $r <= $maintenance->row; $r++)
                            <div class="row mt-3">
                            @for($c = 1; $c <= $maintenance->column; $c++)
                                <div class="col-lg-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <H1>R{{$r}}C{{$c}}</H1>
                                            @php $maintenanceStatus = $maintenance->MaintenanceStatus->where('column_no',$c)->where('row_no',$r)->first(); @endphp
                                            @php $theStatus = $maintenanceStatus->Status->status; @endphp
                                            @if($maintenanceStatus->status_id == 4)
                                                <button disabled class="btn btn-dark">{{$theStatus}}</button>
                                            @else
                                            <button  class="btn btn-primary">{{$theStatus}}</button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endfor   
                                
                            </div>
                            
                    @endfor
                    </div>
               </div>
            </div>

</div>
</div>
</div>
@endsection