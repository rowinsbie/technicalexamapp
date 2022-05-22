@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h3>Add</h3>
                        </div>
                        <div class="col-lg-6 text-end">
                            <a href="{{url('home')}}" class="btn btn-dark">back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" id="Maintenance-Form">
                        @csrf
                        <div class="form-group mt-3">
                            <label for="area-code">Area Code</label>
                            <input type="text" id="area-code" name="area-code" class="form-control" readonly
                                value="{{rand(0,83838)}}">
                        </div>
                        <div class="form-group mt-3">
                            <label for="description">Description</label>
                            <input type="text" id="desc" name="desc" class="form-control"
                                placeholder="Enter description here...">
                        </div>
                        <div class="form-group mt-3">
                            <label for="floor_no">Floor No.</label>
                            <select id="floorno" name="floorno" class="form-control">
                                <option value="">Select Floor No.</option>
                                @foreach($FloorList as $floor)
                                <option value='{{$floor->id}}'>{{$floor->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label for="row">No. of Rows</label>
                            <select id="rows" name="rows" class="form-control">
                                <option value="">Select Rows</option>
                                @for($i = 1; $i <= $cell->max_row; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label for="row">No. of Columns</label>
                            <select id="columns" name="columns" class="form-control">
                                <option value="">Select Columns</option>
                                @for($i = 1; $i <= $cell->max_column; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                            </select>
                        </div>
                        <div class="form-group mt-3 text-end">
                            <button type="button" id="add-btn" class="btn btn-primary">Add</button>
                            <button type="button" class="btn bordered">Cancel</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
let addBtn = document.getElementById("add-btn");
addBtn.addEventListener("click", function(e) {
    let form = document.getElementById("Maintenance-Form");
    let data = {
        areaCode: document.getElementById("area-code").value,
        description: document.getElementById("desc").value,
        floor_no: document.getElementById("floorno").value,
        row: document.getElementById('rows').value,
        column: document.getElementById("columns").value
    }
    axios.post('{{url("add-new-maintenance")}}', data).then(res => {


        if (res && res.request) {
            Swal.fire({
                title: "Created!",
                text: "The maintenance has been created!",
                icon: "success"
            }).then(res => {
                location.href = "{{url('home')}}";
            });
        }
    }).catch(err => {
        if (err && err.response && err.response.status == 422) {
            Swal.fire({
                title: "Attention!",
                text: "Please make sure no field is left unfilled",
                icon: "warning"
            });

        }
    });

});
</script>
@endsection