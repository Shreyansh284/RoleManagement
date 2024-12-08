@extends('panel.layouts.app')
@section('content')
    <div class="col-12">

        <div>
            <h5 class="card-title">Roles</h5>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="float-end mt-2">
                    @if(!empty($PermissionRoleAdd))
                    <a href="{{ url('panel/role/add') }}" data-bs-toggle="modal" data-bs-target="#addRoleModal"
                        class="btn btn-primary">Add</a>
                        @endif
                </div>

                <!-- Table with stripped rows -->
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col"> Created Date</th>
                            <th scope="col"> Updated Date</th>
                            @if(!empty($PermissionRoleEdit || $PermissionRoleDelete))
                            <th scope="col">Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($getRecords as $record)
                            <tr>
                                <th scope="row">{{ $record->id }}</th>
                                <td class="text-warning fw-bold">{{ $record->name }}</td>
                                <td class="text-secondary ">{{ $record->created_at->format('D, M j, Y - h:i A') }}</td>
                                <td class="text-secondary ">{{ $record->updated_at->format('D, M j, Y - h:i A') }}</td>
                                {{-- <td>{{$record->}}</td> --}}
                                <td>
                                    @if(!empty($PermissionRoleEdit))
                                    <a>
                                        <i class="bi bi-pencil-square text-success" data-bs-toggle="modal"
                                            data-bs-target="#editRoleModal{{ $record->id }}"></i>
                                    </a>
                                    @endif
                                    @if(!empty($PermissionRoleDelete))
                                    <a href="{{ url('panel/role/delete/' . $record->id) }}">
                                        <i class="bi bi-trash3-fill text-danger"></i>
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            @include('panel.modal.editRoleModal', [
                                'record' => $record,
                                'permissions' => $permissions,
                                'rolePermissions' => $rolePermissions,
                            ])
                        @endforeach

                    </tbody>
                </table>
                <!-- End Table with stripped rows -->
                @include('panel.modal.addRoleModal', ['permissions' => $permissions])

            </div>
        </div>
    </div>
@endsection
