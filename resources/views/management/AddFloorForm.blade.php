<form method="POST">
    @csrf
    <div class="form-group">
        <label for="floor-name">Floor Name</label>
        <input type="text" name="floor-name" id="floor-name" class="form-control" />
    </div>
    <div class="form-group mt-3">
        <button class="btn btn-primary form-control" id="add-floor-btn">Add Floor</button>
    </div>
    <div class="form-group mt">
        <span class="badge bg-danger" id="responseMessage"></span>
    </div>
</form>

<script>

    let AddFloorBtn = document.getElementById('add-floor-btn');
    let responseMessage = document.getElementById('responseMessage');
    AddFloorBtn.addEventListener("click",function(e)
    {
        e.preventDefault();
        let floorName = document.getElementById('floor-name').value;
        if(floorName == '')
        {
           Swal.fire({
               title:"Attention!",
               text:"Please enter the Floor Name",
               icon:"warning"
           });
           return false;
        }
        createNewFloor({
            floorName:floorName
        });
    });

    let createNewFloor = (floorData) => {
        axios.post('{{url("create-floor")}}',floorData)
        .then(res => {
                if(res)
                {
                    Swal.fire({
                        title:"New Floor",
                        text:"a new floor has been added",
                        icon:"success"
                    }).then(res => {
                            location.reload();
                    });
                }
        }).catch(err => {
            if(err & err.response && err.response.status == 422)
            {
                Swal.fire({
               title:"Attention!",
               text:"Please enter the Floor Name",
               icon:"warning"
           });
            }
        });
    }
</script>