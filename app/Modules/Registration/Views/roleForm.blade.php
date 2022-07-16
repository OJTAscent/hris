@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('role.store') }}" method="POST" class="row g-3 needs-validation p-4" novalidate>
                    @csrf
                    <h5 class="card-title">
                        {{ $title }}
                        <a href="{{ route('role.index') }}" class="btn btn-secondary float-end"> Back</a>

                        @if ($mode == 'show')
                            <a href="{{ route('role.edit', $role->id) }}" class="btn btn-primary me-2 float-end"> Edit</a>
                        @endif
                    </h5>

                    <div class="row">
                        <div class="form-group col-lg-6 mb-2">
                            <input type="hidden" name="role[id]" id="id" value="{{ $role->id }}">

                            <label for="validationCustom01" class="form-label">Code</label>
                            <input type="text" {{ $mode == 'show' ? 'disabled' : '' }} class="form-control"
                                id="validationCustom01" name="role[code]" value="{{ $role->code }}" required>
                            <div class="invalid-feedback">
                                This field is required
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-6 mb-2">
                            <label for="validationCustom01" class="form-label">Description</label>
                            <input {{ $mode == 'show' ? 'disabled' : '' }} type="text" class="form-control"
                                id="validationCustom01" name="role[description]" value="{{ $role->description }}"
                                required>
                            <div class="invalid-feedback">
                                This field is required
                            </div>
                        </div>
                    </div>
            </div>

            <div class="card-footer me-4">

                <button class="btn btn-primary float-end" {{ $mode == 'show' ? 'disabled' : '' }} type="submit">Submit</button>
            </div>


            </form>
        </div>
    </div>
    </div>
@endsection
