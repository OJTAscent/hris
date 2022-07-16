@extends('layouts.app')

@section('content')
    <div class="col-lg-12">
        <div class="card shadow">
            <div class="card-header">                
                <div class="card-title px-2">Employee Performance Review
                    <a href="{{ url('performance/create') }}" class="btn btn-primary float-end"> Add a New Entry</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped border border-2 mt-4">
                    <thead>
                        <tr>
                            <th class="col-md-1">ID</th>
                            <th class="col-md-1">First Name</th>
                            <th class="col-md-1">Last Name</th>
                            <th class="col-md-1">Title</th>
                            <th class="col-md-1">Department</th>
                            <th class="col-md-1 text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody> 
                        @foreach ($performance as $performance)                  
                            <tr>
                                <td class="col-md-1">{{ $performance->id }}</td>
                                <td class="col-md-1">{{ $performance->firstName }}</td>
                                <td class="col-md-1">{{ $performance->lastName }}</td>
                                <td class="col-md-1">{{ $performance->title }}</td>
                                <td class="col-md-1">{{ $performance->department }}</td>
                                <td class="col-md-1 text-end">
                                    <a href="{{ url('performance/show/' .$performance->id) }}" class="btn btn-sm btn-secondary" href=""><i class="bx bxs-show"></i></a>
                                    <a href="{{ route('performance.edit' , $performance->id) }}" class="btn btn-sm btn-primary"><i class="bx bxs-edit-alt"></i></a>
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-id="{{ $performance->id }}" data-bs-target="#deletionEmployeeDeets{{ $performance->id }}"><i class="bx bx-x"></i></button>
                                </td>
                            </tr> 

                            <!-- Modal for deletion -->
                            <div class="modal fade" id="deletionEmployeeDeets{{ $performance->id }}" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ModalLabel"><b>Are you sure?</b></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            The data will be permanently deleted, are you sure you want to delete the entire entry? 
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <a href="{{ route('performance.delete' , $performance->id) }}" class="btn btn-danger">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
 
@endsection

