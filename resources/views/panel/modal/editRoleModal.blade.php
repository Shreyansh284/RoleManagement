{{-- <div class="modal fade" id="editRoleModal{{ $record->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Role</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{url('panel/role/edit/'.$record->id)}}" method="post">
          @csrf
          <div class="modal-body">
            <div class="col-md-12">
              <div class="form-floating">
                <input type="text" name="name" class="form-control" value="{{$record->name}} "id="floatingName" placeholder="Your Name">
                <label for="floatingName">Enter Role</label>
                @if($errors->has('name'))
                <div class="text-danger mt-2">
                    {{ $errors->first('name') }}
                </div>
                @endif
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
  </div> --}}

  {{-- <div class="modal fade" id="editRoleModal{{ $record->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Role</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('panel/role/edit/' . $record->id) }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" name="name" class="form-control" value="{{ old('name', $record->name) }}" id="floatingName" placeholder="Enter Role">
                            <label for="floatingName">Enter Role</label>

                            @if($errors->has('name'))
                                <div class="text-danger mt-2">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-12  p-4">
                            <label for="permissions" class="form-label my-2 fw-bold">Permissions</label>
                
                            @foreach ($permissions as $permissionGroup)
                              <div class="row mb-2">
                                <!-- Display group name -->
                                <div class="col-md-3">
                                  <p>{{ $permissionGroup['name'] }}</p>
                                </div>
                                <div class="col-md-9">
                                  <div class="row">
                                    
                                    @foreach ($permissionGroup['group'] as $permission)
                                    <div class="col-3">
                                          <label class="me-3 ">
                                            <input type="checkbox" name="permission_id[]" value="{{ $permission['id'] }}"> {{ $permission['name'] }}
                                          </label>
                                        </div>
                                        @endforeach
                                  </div>  
                                 
                                </div>
                              </div>
                              <hr>
                            @endforeach
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
</div> --}}
{{-- <script>
    $('#editRoleModal').on('hidden.bs.modal', function (e) {
    if ($('.is-invalid').length > 0) {
        // Prevent closing if there's an invalid field
        e.preventDefault();
    }
});
</script> --}}

<div class="modal fade" id="editRoleModal{{ $record->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Role</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('panel/role/edit/' . $record->id) }}" method="post">
                @csrf
                <div class="modal-body">
                    <!-- Role Name -->
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" name="name" class="form-control" value="{{ old('name', $record->name) }}" id="floatingName" placeholder="Enter Role">
                            <label for="floatingName">Enter Role</label>

                            @if($errors->has('name'))
                                <div class="text-danger mt-2">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>
                        
                    </div>

                    <!-- Permissions -->
                    <div class="col-md-12 p-4">
                        <label for="permissions" class="form-label my-2 fw-bold">Permissions</label>
                        @foreach ($permissions as $permissionGroup)
                            <div class="row mb-2">
                                <div class="col-md-3">
                                    <p>{{ $permissionGroup['name'] }}</p>
                                </div>
                                <div class="col-md-9">
                                    <div class="row">
                                        @foreach ($permissionGroup['group'] as $permission)
                                            <div class="col-3">
                                                <label>
                                                    <input type="checkbox" 
                                                           name="permission_id[]" 
                                                           value="{{ $permission['id'] }}" 
                                                           {{ in_array($permission['id'], $rolePermissions[$record->id] ?? []) ? 'checked' : '' }}> 
                                                    {{ $permission['name'] }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @endforeach
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
