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
                    <form method="POST">
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
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label for="row">No. of Rows</label>
                            <select id="rows" name="rows" class="form-control">
                                <option value="">Select Rows</option>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label for="row">No. of Columns</label>
                            <select id="columns" name="columns" class="form-control">
                                <option value="">Select Columns</option>
                            </select>
                        </div>
                        <div class="form-group mt-3 text-end">
                            <button type="button" class="btn btn-primary">Add</button>
                            <button type="button" class="btn bordered">Cancel</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection