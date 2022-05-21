<form action="POST">
    <div class="form-group">
      <input type="hidden" id="data_id" name="data_id" value="{{$data->id}}" />
        <button type="button" id="confirmDelete{{$data->id}}" onclick="confirmDelete('{{$data->id}}')" class="btn btn-danger confirmDelete"><span class="material-icons">
                delete
            </span></button>
    </div>
</form>