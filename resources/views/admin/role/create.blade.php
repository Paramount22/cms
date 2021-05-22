@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('_partials._messages')
                <div class="card">
                    <div class="card-header">{{ __('Create role') }}</div>

                    <div class="card-body">
                        <form action="{{route('roles.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" type="text" name="name"
                                       class="form-control @error('name') is-invalid @enderror"
                                       placeholder="Name of role"
                                       value="{{ old('name') }}"
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
                                          class="form-control @error('description') is-invalid @enderror"
                                          placeholder="Description of role"
                                ></textarea>
                                <span><small>( * Optional )</small></span>

                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <button class="btn btn-success">Submit</button>
                            <a class="ml-2 btn btn-outline-secondary" href="{{route('roles.index')}}">Back</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
