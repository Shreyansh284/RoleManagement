<div class="modal fade" id="editUserModal{{ $record->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Role</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('panel/user/edit/'. $record->id) }}" method="post">
                @csrf
                <div class="modal-body ">
                    <!-- Role Name Input -->
                    <div class="col-md-12 mb-2">
                      <div class="form-floating">
                        <input type="text" name="name" class="form-control" id="floatingName" placeholder="Enter User Name" value="{{ $record->name }}" required>
                        <label for="floatingName">Enter User Name</label>
                      </div>
                    </div>
                    <div class="col-md-12 mb-2">
                      <div class="form-floating">
                        <input type="email" name="email" class="form-control" id="floatingName" placeholder="Enter User Email" value="{{ $record->email }}" required>
                        <label for="floatingName">Enter User Email</label>
                        <div class="invalid-feedback">
                          {{$errors->first('email')}}
                        </div>
                        
                      </div>
                    </div>
            
                    <div class="col-md-12">
                      <div class="form-floating">
                        <select class="form-select" aria-label="Default select example" name='role_id' required >
                            <option value={{null}}>Select</option>
                            @foreach ($getRecords as $getRecord )
                          <option {{$getRecord->id==$record->role_id?'selected':
                            ''}}  value="{{$getRecord->id}}">{{$getRecord->name}}</option>
                          @endforeach
                        </select>
                        <label for="floatingName">Add Role</label>
                      </div>
                    </div>
          
                  </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
