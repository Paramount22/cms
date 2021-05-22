@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('_partials._messages')
                <div class="card">
                    <div class="card-header">{{ __('Create permission') }}</div>

                    <div class="card-body">
                        <form action="{{route('permissions.store')}}" method="post">
                            @csrf

                            <div class="form-group">
                                <label>Role</label>
                                <select class="form-control @error('role_id') is-invalid @enderror" name="role_id" >
                                    <option value="">Select role</option>
                                    @foreach(App\Models\Role::all() as $role)
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                        @error('role_id')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </select>
                                <table class="table table-striped table-dark mt-3">
                                    <thead>
                                    <tr>
                                        <th scope="col">Permission</th>
                                        <th scope="col">can-add</th>
                                        <th scope="col">can-edit</th>
                                        <th scope="col">can-view</th>
                                        <th scope="col">can-delete</th>
                                        <th scope="col">can-list</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Department</td>
                                            <td>
                                                <input type="checkbox" name="name[department][can-add]" value="1">
                                            </td>
                                            <td>
                                                <input type="checkbox" name="name[department][can-edit]" value="1">
                                            </td>
                                            <td>
                                                <input type="checkbox" name="name[department][can-view]" value="1">
                                            </td>
                                            <td>
                                                <input type="checkbox" name="name[department][can-delete]" value="1">
                                            </td>
                                            <td>
                                                <input type="checkbox" name="name[department][can-list]" value="1">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Role</td>
                                            <td>
                                                <input type="checkbox" name="name[role][can-add]" value="1">
                                            </td>
                                            <td>
                                                <input type="checkbox" name="name[role][can-edit]" value="1">
                                            </td>
                                            <td>
                                                <input type="checkbox" name="name[role][can-view]" value="1">
                                            </td>
                                            <td>
                                                <input type="checkbox" name="name[role][can-delete]" value="1">
                                            </td>
                                            <td>
                                                <input type="checkbox" name="name[role][can-list]" value="1">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Permissions</td>
                                            <td>
                                                <input type="checkbox" name="name[permission][can-add]" value="1">
                                            </td>
                                            <td>
                                                <input type="checkbox" name="name[permission][can-edit]" value="1">
                                            </td>
                                            <td>
                                                <input type="checkbox" name="name[permission][can-view]" value="1">
                                            </td>
                                            <td>
                                                <input type="checkbox" name="name[permission][can-delete]" value="1">
                                            </td>
                                            <td>
                                                <input type="checkbox" name="name[permission][can-list]" value="1">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>User</td>
                                            <td>
                                                <input type="checkbox" name="name[user][can-add]" value="1">
                                            </td>
                                            <td>
                                                <input type="checkbox" name="name[user][can-edit]" value="1">
                                            </td>
                                            <td>
                                                <input type="checkbox" name="name[user][can-view]" value="1">
                                            </td>
                                            <td>
                                                <input type="checkbox" name="name[user][can-delete]" value="1">
                                            </td>
                                            <td>
                                                <input type="checkbox" name="name[user][can-list]" value="1">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Notice</td>
                                            <td>
                                                <input type="checkbox" name="name[notice][can-add]" value="1">
                                            </td>
                                            <td>
                                                <input type="checkbox" name="name[notice][can-edit]" value="1">
                                            </td>
                                            <td>
                                                <input type="checkbox" name="name[notice][can-view]" value="1">
                                            </td>
                                            <td>
                                                <input type="checkbox" name="name[notice][can-delete]" value="1">
                                            </td>
                                            <td>
                                                <input type="checkbox" name="name[notice][can-list]" value="1">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Approve leave</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <input type="checkbox" name="name[leave][can-list]" value="1">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Mail</td>
                                            <td>
                                                <input type="checkbox" name="name[mail][can-add]" value="1">
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>

                            <button class="btn btn-success">Submit</button>
                            <a class="ml-2 btn btn-outline-secondary" href="{{route('permissions.index')}}">Back</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
