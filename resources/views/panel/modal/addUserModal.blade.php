{{-- <div class="modal fade" id="addRoleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Role</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ url('panel/role/add') }}" method="post">
        @csrf
        <div class="modal-body">
          <!-- Role Name Input -->
          <div class="col-md-12">
            <div class="form-floating">
              <input type="text" name="name" class="form-control" id="floatingName" placeholder="Enter Role Name" required>
              <label for="floatingName">Enter Role Name</label>
            </div>
          </div>


        <div class="col-md-12">
          <label for="inputText" class="form-label mb-2 col-sm12 col-form-label">Permissions</label>
          @foreach ($permissions as $value )
          <div class="row mb-2">


            <div class="col-md-3">
                <p>{{$value['name']}}</p>
              </div>
            <div class="col-md-9">
              <div class="row">
                @foreach ($value['group'] as $group )
                  <div class="col-md-4">
<label for=""><input type="checkbox" name="" id="">{{$group['name']}}</label>
                   
                  </div>
                @endforeach
              </div>
              </div>
          </div>
            @endforeach
        </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add Role</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End Add Role Modal --> --}}

<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  ">
    <div class="modal-content"> 
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ url('panel/user/add') }}" method="post">
        @csrf
        <div class="modal-body ">
          <!-- Role Name Input -->
          <div class="col-md-12 mb-2">
            <div class="form-floating">
              <input type="text" name="name" class="form-control" id="floatingName" placeholder="Enter User Name" required>
              <label for="floatingName">Enter User Name</label>
            </div>
          </div>
          <div class="col-md-12 mb-2">
            <div class="form-floating">
              <input type="email" name="email" class="form-control" id="floatingName" placeholder="Enter User Email" >
              <label for="floatingName">Enter User Email</label>
              <div class="invalid-feedback">
                {{$errors->first('email')}}
              </div>
              
            </div>
          </div>
          <div class="col-md-12 mb-2">
            <div class="form-floating">
              <input type="text" name="password" class="form-control" id="floatingName" placeholder="Enter User Password" required>
              <label for="floatingName">Enter User Password</label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-floating">
              <select class="form-select" aria-label="Default select example" name='role_id' required>
                <option selected disabled>Open this select menu</option>
                @foreach ($getRecords as $getRecord )
                  
                <option value="{{$getRecord->id}}">{{$getRecord->name}}</option>
                @endforeach
              </select>
              <label for="floatingName">Add Role</label>
            </div>
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add User</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End Add Role Modal -->

