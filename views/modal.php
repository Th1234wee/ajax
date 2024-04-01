<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data">
            <label for="">Name</label>
            <input type="text" name="_name" id="name" class="form-control">
            <label for="">Gender</label>
            <select name="_gender" id="gender" class="form-select">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <label for="">Profile</label>
            <input type="file" name="_file" id="file" class="form-control">
            <img class="my-3" id="image-choose" src="https://placehold.co/80" alt=""> 
            <input type="text" id="img">
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                <button id="accept_add" name="accept_add" type="submit" class="btn btn-primary">Confirm Add</button>
            </div>
        </form>
      </div>
      
    </div>
  </div>
</div>
