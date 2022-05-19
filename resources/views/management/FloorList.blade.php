<div class="card">
    <div class="card-header">
        <h4>Floor List</h4>
    </div>
    <div class="card-body">
        <div class="table table-responsive">
            <table class="table table-bordered">
                <tr>
                    <thead>
                        <th>id</th>
                        <th>Floor Name</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($floor_list as $floor)
                    <tr>
                        <td>{{$floor->id}}</td>
                        <td>{{$floor->name}}</td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

        </div>
    </div>
</div>