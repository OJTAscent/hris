@extends('layouts.app')

@section('content')
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title pb-4">
          {{ $title }}
          <a href="{{ url('/') }}" class="btn btn-secondary float-end"> Back</a>
          @if (request()->segment(1) == 'show')
            <a href="{{ url('/edit/'.$user['id']) }}" class="btn btn-primary me-2 float-end"> Edit</a>
          @endif
          
        </h5>

        <div class="col-lg-12 shadow my-4">
            <form class="p-4">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">First Name</label>
                  <input type="text" {{ request()->segment(1) == 'show' ? 'disabled' : '' }} class="form-control" value="{{ $user['firstname'] }}">
                  <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Last Name</label>
                  <input type="text" {{ request()->segment(1) == 'show' ? 'disabled' : '' }} class="form-control"  value="{{ $user['lastname'] }}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Gender</label>
                    <input type="text" {{ request()->segment(1) == 'show' ? 'disabled' : '' }} class="form-control"  value="{{ $user['gender'] }}">
                  </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

      </div>
    </div>
  </div>
@endsection