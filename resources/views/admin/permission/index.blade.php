@extends('admin.layouts.app')

@section('content')


    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                @include('_partials._messages')
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between">
                        <h6 class="m-0 font-weight-bold text-info">All Permissions</h6>
                        <a href="{{route('permissions.create')}}" class="text-warning text-md">
                            <i class="fas fa-plus-square"></i> Create
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Name</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>

                                </thead>
                                <tbody>
                                @forelse($permissions as $key => $permission)
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td>{{$permission->role->name}}</td>

                                        <td class="text-center">

                                            <a href="{{route('permissions.edit', $permission)}}" class="text-success">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                        </td>
                                        <td class="text-center">
                                            @if(isset( auth()->user()
                                            ->role->permission['name']['permission']['can-delete'] ))
                                            <a href="" class="text-danger" data-toggle="modal" data-target="#exampleModal{{$permission->id}}">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            @endif
                                        </td>
                                    </tr>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$permission->id}}" tabindex="-1"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Are you sure ?</h5>

                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    The record will be deleted.
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                    <form action="{{route('permissions.destroy', $permission)}}"
                                                          method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <td>No permission</td>
                                @endforelse

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
