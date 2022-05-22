<div class="modal fade" id="assignForm{{$c}}{{$r}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                <h2>Confirmation</h2>
            </div>
            <div class="modal-body">
                <form action="POST">
                    @csrf
                
                    <div class="form-group mt-3 ">
                  
                        <label for="status">Status</label>
                    <select name="new-status" class="form-control mb-3" id="new-status">
                            <option value="">Select Status</option>
                            @foreach($statusList as $status)
                                <option value="{{$status->id}}">{{$status->status}}</option>
                            @endforeach
                        </select>
                        <button type="button" onclick="updateStatus({
                                status:this.previousElementSibling.value ,
                                row:{{$maintenanceStatus->row_no}},
                                column:{{$maintenanceStatus->column_no}},
                                maintenanceID:{{$maintenance->id}}
                            })" class="btn btn-primary save">Save</button>
                        <button type="button" data-bs-dismiss="modal" class="btn border">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


