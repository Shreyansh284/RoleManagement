@extends('panel.layouts.app')
@section('content')
<div class="col-12">

    <div>
        <h5 class="card-title">User</h5>
    </div>
    <div class="card">
      <div class="card-body">
            <div class="float-end mt-2">
              @if(!empty($PermissionRoleAdd))
                <a href="{{url('panel/role/add')}}" data-bs-toggle="modal" data-bs-target="#addUserModal" class="btn btn-primary">Add</a>
                @endif
            </div>
     
        <!-- Table with stripped rows -->
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Role</th>
              {{-- <th scope="col"> Created Date</th>
              <th scope="col"> Updated Date</th> --}}
              @if(!empty($PermissionRoleEdit)||!empty($PermissionRoleDelete))
              <th scope="col">Action</th>
              @endif
            </tr>
          </thead>
          <tbody>
             @foreach ($getUserRecords as $record )
                
            <tr>
                <th scope="row">{{$record->id}}</th>
                <td class="text-black" >{{$record->name}}</td>
                <td class="text-black" >{{$record->email}}</td>
                <td class="text-success fw-bold" >{{$record->role_name}}</td>
                {{-- <td class="text-secondary ">{{ $record->created_at->format('D, M j, Y - h:i A') }}</td>
                <td class="text-secondary ">{{ $record->updated_at->format('D, M j, Y - h:i A') }}</td> --}}

                <td>
                  @if(!empty($PermissionRoleEdit))
                    <a>
                        <i class="bi bi-pencil-square text-success"  data-bs-toggle="modal" data-bs-target="#editUserModal{{ $record->id }}" ></i>
                    </a>
                    @endif
                    @if(!empty($PermissionRoleDelete))
 
                    <a href="{{ url('panel/user/delete/' . $record->id) }}">
                        <i class="bi bi-trash3-fill text-danger"></i>
                    </a>
                    @endif
                </td>
            </tr>
            @include('panel.modal.editUserModal', ['record' => $record,'getRecords'=>$getRoleRecords])
            @endforeach 

          </tbody>
        </table>
        <!-- End Table with stripped rows -->
        @include('panel.modal.addUserModal',['getRecords'=>$getRoleRecords])

      </div>
    </div>
</div>

@endsection