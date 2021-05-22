@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('_partials._messages')
                <div class="card">
                    <div class="card-header">{{ __('Edit department') }}</div>

                    <div class="card-body">
                        <form action="{{route('departments.update', $department)}}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" type="text" name="name"
                                       class="form-control @error('name') is-invalid @enderror"
                                       placeholder="Name of department"
                                       value="{{ $department->name }}"

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
                                >{{ $department->description }}</textarea>
                                <span><small>( * Optional )</small></span>

                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            @if( isset(auth()->user()->role->permission['name']['department']['can-edit']))
                                <button class="btn btn-success">Update</button>
                            @endif
                            <a class="ml-2 text-warning" href="{{route('departments.index')}}">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
