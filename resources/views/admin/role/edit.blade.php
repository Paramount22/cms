@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('_partials._messages')
                <div class="card">
                    <div class="card-header">{{ __('Edit Role') }}</div>

                    <div class="card-body">
                        <form action="{{route('roles.update', $role)}}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" type="text" name="name"
                                       class="form-control @error('name') is-invalid @enderror"
                                       placeholder="Name of department"
                                       value="{{ $role->name }}"

                                >

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">Description*</label>
                                <textarea name="description" id="description" rows="3"
                                class="form-control @error('description') is-invalid @enderror" placeholder="About department"
                                >{{ $role->description }}</textarea>
                                <span><small>( * Optional )</small></span>

                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            @if( isset(auth()->user()->role->permission['name']['role']['can-edit']))
                                <button class="btn btn-success">Update</button>
                            @endif
                            <a class="ml-2 text-warning" href="{{route('roles.index')}}">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
