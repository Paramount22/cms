@extends('admin.layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('_partials._messages')
            <div class="card">
                <div class="card-header">Edit leave</div>
                <div class="card-body">
                    <form action="{{route('leaves.update', $leave)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label>From date</label>
                            <input name="from" class="form-control
                                    @error('from') is-invalid @enderror" required="" id="datepicker"
                                value="{{$leave->from}}"
                            >
                            @error('firstname')
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label>To date</label>
                            <input name="to" class="form-control @error('to') is-invalid @enderror"
                                   required="" id="datepicker1" value="{{$leave->to}}">
                            @error('to')
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Type of leave</label>
                            <select class="form-control" name="type" required="">
                                <option value="annualleave">Annual leave</option>
                                <option value="sickleave">Sick leave</option>
                                <option value="parental">Parental leave</option>
                                <option value="other">Other leave</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Description </label>
                            <textarea class="form-control @error('description') is-invalid @enderror"
                                      name="description" rows="3">{{$leave->description}}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                            @enderror
                        </div>
                        <button class="btn btn-success">Update</button>
                        <a class="btn btn-outline-secondary ml-2" href="{{url('/leaves/create#leaves')}}">Back</a>

                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
