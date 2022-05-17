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
                    <tr>
                        <td>34</td>
                        <td>Test</td>
                        <td>Ground</td>
                        <td>3</td>
                        <td>4</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection