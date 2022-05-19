<form action="POST">
    @csrf
    <div class="row mt-3">
        <div class="col-lg-4">
            <div class="form-group">
                <label for="column">Max. Column</label>
                <input type="number" id="max-column" name="max-column" class="form-control" value="{{$cell->max_column}}" />
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="column">Max. Row</label>
                <input type="number" id="max-row" name="max-row" class="form-control" value="{{$cell->max_row}}" />
            </div>
        </div>
        <div class="col-lg-4">
            <button type="button" id="update" name="update" class="btn btn-primary form-control mt-4">Update</button>
        </div>
    </div>
</form>

<script>
    let updateBtn = document.getElementById("update");

    updateBtn.addEventListener("click",function(e)
    {
        e.preventDefault();

        let max_column = document.getElementById("max-column").value;
        let max_row = document.getElementById("max-row").value;
        updateCellMax({
            column:max_column,
            row:max_row
        });
    });

    let updateCellMax = (data) => {
            axios.post("{{url('update-cell')}}",data)
            .then(res => {
                console.log(res);
            }).catch(err => {
                console.log(err);
            });
    }

</script>
