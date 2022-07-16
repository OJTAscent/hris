@extends('layouts.app')

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title pb-4">
                    Employee Information
                    <a href="{{ route('registration.create') }}" class="btn btn-primary float-end"> Add New</a>

                </h5>

                <!-- Table with stripped rows -->
                <div class="col-lg-12 shadow my-4">
                    @if (Session::has('status'))
                        <div class="alert alert-info">{{ Session::get('status') }}</div>
                    @endif

                    {{-- @if (Session::has('message'))
                        <div class="alert alert-{{ Session::get('message-type') }} alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <i
                                class="glyphicon glyphicon-{{ Session::get('message-type') == 'success' ? 'ok' : 'remove' }}"></i>
                            {{ Session::get('message') }}
                        </div>
                    @endif --}}

                    <table class="table table-striped border border-2">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th width="20%">Employee Number</th>
                                <th width="10%">Firstname</th>
                                <th width="10%">Lastname</th>
                                <th width="10%">Email</th>
                                <th width="20%">Address</th>
                                <th width="30%" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($registration as $registration)
                                <tr>
                                    <td>{{ $registration->id }}</td>
                                    <td>{{ $registration->employee_number }}</td>
                                    <td>{{ $registration->firstname }}</td>
                                    <td>{{ $registration->lastname }}</td>
                                    <td>{{ $registration->email }}</td>
                                    <td>{{ $registration->streetAddress1 }},
                                        {{ $registration->streetAddress2 }},
                                        {{ $registration->city }},
                                        {{ $registration->state }}</td>

                                    <td class="text-end">
                                        <a href="{{ url('registration/show/' . $registration->id) }}"
                                            class="btn btn-sm btn-secondary"><i class="bx bxs-show"></i></a>
                                        <a href="{{ url('registration/edit/' . $registration->id) }}"
                                            class="btn btn-sm btn-primary"><i class="bx bxs-edit-alt"></i></a>
                                        {{-- <a href="{{ route('registration.delete', $registration->id) }}"
                                            class="btn btn-sm btn-danger"> <i class="bx bx-x"></i> </a> --}}
                                        <a class="btn btn-sm btn-danger" data-bs-toggle="modal" role="button"
                                            data-id="{{ $registration->id }}"
                                            data-bs-target="#modaldelete{{ $registration->id }}"><i
                                                class="bx bx-x"></i></a>


                                    </td>

                                </tr>
                                {{-- Modal delete --}}
                                <div class="modal fade" id="modaldelete{{ $registration->id }}" tabindex="-1"
                                    aria-labelledby="ModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="modalLabel"><b>Confirmation</b></h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Do you want to delete this information? 
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">No</button>

                                                <a href="{{ route('registration.delete', $registration->id) }}"
                                                    class="btn btn btn-primary">Yes</a>

                                            </div>
                                        </div>
                                    </div>
                                    {{-- End of modal delete --}}
                            @endforeach


                </div>
                </tbody>

                </table>

            </div>

            <!-- End Table with stripped rows -->


            <!--Modal for deletion-->

            {{-- End of Modal delete --}}

        </div>
    </div>
    </div>
@endsection
