@extends('layouts.app')

@section('content')


<div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title pb-4">
          Table
		  <a href="{{ url('survey/create') }}" class="btn btn-primary float-end"> Add New</a>
        </h5>

        <table class="table table-striped border border-2">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Country</th>
                <th scope="col">Contact Number</th>
                <th scope="col">Email</th>
                <th scope="col" class="text-end">Actions</th>
              </tr>
            </thead>
            <tbody>

			 @foreach ($survey as $survey)
				<tr>
					<td>{{ $survey->id }}</td>
					<td>{{ $survey->firstname }} {{ $survey->lastname }}</td>
					<td>{{ $survey->country }}</td>
					<td>{{ $survey->contactNumber }}</td>
					<td>{{ $survey->email }}</td>

					
            <td class="text-end">
                <a href="{{ url('survey/show/' .$survey->id) }}" class="btn btn-sm btn-secondary"><i class="bx bxs-show"></i></a>
                <a href="{{ url('survey/edit/' .$survey->id) }}" class="btn btn-sm btn-primary"><i class="bx bxs-edit-alt"></i></a>
                <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-id="{{ $survey->id }}" data-bs-target="#deletionModal{{ $survey->id }}"><i class="bx bx-x"></i></a>
            </td>
        </tr>

        <!--Modal for deletion-->
        <div class="modal fade" id="deletionModal{{ $survey->id }}" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header"> 
                      <h4 class="modal-title" id="modalLabel"><b>Are you sure?</b></h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                    </div>
                    <div class="modal-body">
                      Once deleted, you will not be able to recover this Data!
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                      <a href="{{ url('survey/delete/' .$survey->id) }}" class="btn btn btn-danger">Yes</a>
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