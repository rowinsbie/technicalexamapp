@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h3>Maintenance Form</h3>
                        </div>
                        <div class="col-lg-6 text-end">
                            <a href="{{url('new-maintenance')}}" class="btn btn-primary">Add</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if(count($maintenance) <= 0)
                        <div class="text-center">
                            <img src="{{asset('images/Empty.png')}}" width="30%" class="img-fluid" />
                            <h2>No Data found!</h2>
                            <p>To add maintenance, look at the top right and click the add button </p>
                        </div>
                    @else
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Area Code</th>
                                <th>Description</th>
                                <th>Floor</th>
                                <th>Row</th>
                                <th>Column</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($maintenance as $data)
                            <tr>
                                <td>{{$data->area_code}}</td>
                                <td>{{$data->description}}</td>
                                <td>{{$data->Floor->name}}</td>
                                <td>{{$data->row}}</td>
                                <td>{{$data->column}}</td>
                                <td>

                                    <a href="{{url('maintenance-update')}}/{{$data->id}}" class="btn btn-primary"><span
                                            class="material-icons">
                                            border_color
                                        </span></a>
                                    @include("maintenance.DeleteConfirmation")

                                    <a href="" class="btn btn-primary"><span class="material-icons">
                                            list_alt
                                        </span></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function confirmDelete(id) {
    Swal.fire({
        title: 'Do you want to delete?',
        showDenyButton: true,
       
        confirmButtonText: 'Yes',
        denyButtonText: `No`,
        icon:"question"
    }).then((result) => {
        if (result.isConfirmed) {
            axios.post('{{url("delete-maintenance")}}',{
                id:id
            }).then(res => {
                if(res && res.status == 200)
                {
                    Swal.fire({
                        title:"Deleted!",
                        text:"The maintenance record has been deleted from the database",
                        icon:"success"
                    }).then(res => {
                            location.reload();
                    });
                }
            }).catch(err => {       
                console.log(err);
            });
        } 
    })
}
</script>
@endsection