@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class=" card">
               <div class="card-header  text-center">
               <h2>Preview table</h2>
               </div>
               <div class="card-body">
                    <h3>{{$maintenance->description}}</h3>

                    <div>
                   
                    @for($r = 1; $r <= $maintenance->row; $r++)
                            <div class="row mt-3">
                            @for($c = 1; $c <= $maintenance->column; $c++)
                                <div class="col-lg-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <H1>R{{$r}}C{{$c}}</H1>
                                            @php $maintenanceStatus = $maintenance->MaintenanceStatus->where('column_no',$c)->where('row_no',$r)->first(); @endphp
                                            @php $theStatus = $maintenanceStatus->Status->status; @endphp
                                            @if($maintenanceStatus->status_id == 4)
                                                <button disabled class="btn btn-dark">{{$theStatus}} </button>
                                            @else

                                            <button data-bs-toggle="modal"  data-bs-target="#assignForm{{$c}}{{$r}}"  class="btn btn-primary assignment">{{$theStatus}}</button>
                                            @include('maintenance.UpdateStatus')
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
<script>
    let updateStatus = (obj) => {
        if(obj.status == '')
        {
            Swal.fire({
                title:"Attention!",
                text:"Please select status from the option",
                icon:"warning"
            });
            return false;
        }

        axios.post('{{url("update-status")}}',obj)
        .then(res => {
            if(res)
            {
                Swal.fire({
                    title:"Updated!",
                    text:"Status of column " + obj.column + " and row " + obj.row + " has been updated!",
                    icon:"success"
                }).then(res => {
                    location.reload();
                });
            }
        }).catch(err => {
            console.log(err);
        });
        
    }
</script>
@endsection