@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header">
            <main class="form-fill-up">
            <div class="row">
                <div class="col-md-12" id="left">	
			</div>
		
		<div class="col-md-12" id="center">
							
			<div class="co12 mb-4"><h3>Customer Information:
					@if ($mode == 'edit' ? '' : 'disabled')
						<a href="{{  route('survey.index') }}" type = "button" class="btn btn-secondary pe-4 ps-4 float-end"> Back</a>
					@endif

					@if ($mode == 'show' ? 'disabled' : '')
                      <a href="{{ route('survey.edit',$survey->id) }}" class="btn btn-primary pe-4 ps-4 me-2 float-end"> Edit</a>
                    @endif
				</h3>
				<div class="row">	
							<hr>
				</div>		
			</div>		
			
            <form action="{{ route('survey.store', $survey->id) }}" method="POST" class="row form-fill-up-survey needs-validation" novalidate>
				@csrf
				<label for="validation-fullName"> <h5>&nbsp;&nbsp;&nbsp;&nbsp;Customer Name</h5> </label>
  				
					<div class="col-md-6">
						<div class="container-fluid">
						<input type="hidden" name="survey[id]" value="{{ $survey->id }}">
						<input {{ $mode == 'show' ? 'disabled' : '' }} type="text" class="form-control" id="firstname" value="{{ $survey->firstname }}" name="survey[firstname]" required>
						<label for= "firstname" class="form-label text-muted sub-label mb-4">First Name</label>
							<div class="invalid-feedback">
								This field is required!
							</div>
						</div>
					</div>

					<div class="col-md-6">
						<div class="container-fluid">
						<input {{ $mode == 'show' ? 'disabled' : '' }} type="text" class="form-control" id="lastname" value="{{ $survey->lastname }}" name="survey[lastname]" required>
						<label for= "lastname" class="form-label text-muted sub-label mb-4">Last Name</label>
							<div class="invalid-feedback">
								This field is required!
							</div>

						</div>
					</div>
			
				  <br>
				  
					<!-- CUSTOMER ADDRESS-->

				<label for="validation-address"> <h5>&nbsp;&nbsp;&nbsp;&nbsp;Address</h5> </label>
				
						<div class="col-md-6">
							<div class="container-fluid">
							<input {{ $mode == 'show' ? 'disabled' : '' }} type="text" class="form-control" id="streetAdd1" value="{{ $survey->streetAdd1 }}" name="survey[streetAdd1]" required>
							<label for= "streetAdd1" class="form-label text-muted sub-label mb-4">Street Address</label>
                                <div class="invalid-feedback">
                                    This field is required!
                                </div>
    
							</div>
						</div>
			
					
						<div class="col-md-6">
							<div class="container-fluid">
								<input {{ $mode == 'show' ? 'disabled' : '' }} type="text" class="form-control" id="streetAdd2" value="{{ $survey->streetAdd2 }}" name="survey[streetAdd2]" required>
								<label for= "streetAdd2" class="form-label text-muted sub-label mb-4">Barangay</label>
									<div class="invalid-feedback">
										This field is required!
									</div>

							</div>
						</div>
						
						<div class="col-md-6">
							<div class="container-fluid">
								<input {{ $mode == 'show' ? 'disabled' : '' }} type="text" class="form-control" id="city" value="{{ $survey->city }}" name="survey[city]" required>
								<label for= "city" class="form-label text-muted sub-label mb-4">City/Municipality</label>
									<div class="invalid-feedback">
										This field is required!
									</div>

							</div>			
						</div>
		
			
						<div class="col-md-6">
							<div class="container-fluid">
							<input {{ $mode == 'show' ? 'disabled' : '' }} type="text" class="form-control" id="province" value="{{ $survey->province }}" name="survey[province]" required>
							<label for= "validate-province" class="form-label text-muted sub-label mb-4">State/Province</label>
								<div class="invalid-feedback">
									This field is required!
								</div>
							</div>			
						</div>


						<div class="col-md-6">
							<div class="container-fluid">
								<input {{ $mode == 'show' ? 'disabled' : '' }} type="text" class="form-control" id="postal" value="{{ $survey->postal }}" name="survey[postal]" required>
								<label for= "postal" class="form-label text-muted sub-label mb-4">Postal/Zip Code</label>
									<div class="invalid-feedback">
										This field is required!
									</div>

							</div>			
						</div>


						<div class="col-md-6">
							<div class="container-fluid">
							<select {{ $mode == 'show' ? 'disabled' : '' }}class="form-select select-country" id= "country" value="{{ $survey->country }}" name="survey[country]" aria-label="Default select example" required>
								<option selected></option>
								<option {{ ($survey->country) == 'Philippines' ? 'selected' : '' }} value="Philippines">Philippines</option>
								<option {{ ($survey->country) == 'Japan' ? 'selected' : '' }} value="Japan">Japan</option>
								<option {{ ($survey->country) == 'Korea' ? 'selected' : '' }} value="Korean">Korea</option>
								<option {{ ($survey->country) == 'Hawaii' ? 'selected' : '' }} value="Hawaii">Hawaii</option>
								<option {{ ($survey->country) == 'Canada' ? 'selected' : '' }} value="Canada">Canada</option>
								<option {{ ($survey->country) == 'Thailand' ? 'selected' : '' }} value="Thailand">Thailand</option>
								<option {{ ($survey->country) == 'Indonesia' ? 'selected' : '' }} value="Indonesia">Indonesia</option>
								<option {{ ($survey->country) == 'Dubai' ? 'selected' : '' }} value="Dubai">Dubai</option>
								<option {{ ($survey->country) == 'Malaysia' ? 'selected' : '' }} value="Malaysia">Malaysia</option>
								<option {{ ($survey->country) == 'Brunei' ? 'selected' : '' }} value="Brunei">Brunei</option>
							</select>
							<label for= "country" class="form-label text-muted sub-label mb-4">Country</label>
								<div class="invalid-feedback">
									This field is required!
								</div>
							</div>
						</div>

					<br>

					<!-- CONTACT NUMBER-->

						<div class="col-md-6">
							<div class="container-fluid">	
							<label for="validation-number1"> <h5 class="mb-4">Contact Number</h5> </label>
							<input {{ $mode == 'show' ? 'disabled' : '' }} type="text" 
							class="form-control" 
							placeholder="(000) 000-0000" 
							id="contactNumber" 
							value="{{ $survey->contactNumber }}" 
							name="survey[contactNumber]" 
							required>
								<div class="invalid-feedback">
									This field is required!
								</div>
							</div>
						</div>

					<br>
					<br>
					

					<!-- EMAIL-->

							
						<div class="col-md-6">
							<div class="container-fluid">	
							<label for="email"> <h5>Email</h5> </label>
							<input {{ $mode == 'show' ? 'disabled' : '' }} type="text" 
							class="form-control" placeholder="ex: myname@example.com" 
							id="email" value="{{ $survey->email }}" name="survey[email]" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
							<label for= "email" class="form-label text-muted sub-label mb-4">example@example.com</label>
								<div class="invalid-feedback">
									This field is required!
								</div>
							</div>
						</div>
								
								<br>
								<br>

					<!-- CUSTOMER FEEDBACK-->

							<div class="mb-3">
								<div class="container-fluid">
  								<label for="exampleFormControlTextarea1" 
								  class="form-label">How long have you been using this product and why?</label>
  								<textarea {{ $mode == 'show' ? 'disabled' : '' }} 
								  class="form-control" id="exampleFormControlTextarea1" 
								  value="{{ $survey->exampleFormControlTextarea1 }}" 
								  name="survey[exampleFormControlTextarea1]" 
								  required rows="3"><?php echo $survey['exampleFormControlTextarea1']; ?> </textarea>
								    <div class="invalid-feedback">
                                        This field is required!
                                    </div>
  							    </div>
							</div>

								<br>
								<br>

							<div class="mb-3">
								<div class="container-fluid">
  								<label for="exampleFormControlTextarea2" 
								  class="form-label">Write your comments and suggestions aboout our products in comparison with other competitors:</label>
  								<textarea {{ $mode == 'show' ? 'disabled' : '' }} 
								  class="form-control" id="exampleFormControlTextarea2" 
								  value="{{ $survey->exampleFormControlTextarea2 }}" 
								  name="survey[exampleFormControlTextarea2]" 
								  required rows="3"><?php echo $survey['exampleFormControlTextarea2']; ?></textarea>
                                    <div class="invalid-feedback">
                                        This field is required!
                                    </div>
  							    </div>
							</div>

								<br>
								<br>

							<div class="mb-3">
								<div class="container-fluid">
  								<label for="exampleFormControlTextarea3"
								   class="form-label">Are you satisfied with our product performance? share your opinions:</label>
  								<textarea {{ $mode == 'show' ? 'disabled' : '' }} 
								  class="form-control" id="exampleFormControlTextarea3" 
								  value="{{ $survey->exampleFormControlTextarea3 }}" 
								  name="survey[exampleFormControlTextarea3]"
								  required rows="3"><?php echo $survey['exampleFormControlTextarea3']; ?></textarea>
                                    <div class="invalid-feedback">
                                        This field is required!
                                    </div>
  							    </div>
							</div>

								<br>
								<br>

							<div class="mb-3">
								<div class="container-fluid">
  								<label for="exampleFormControlTextarea4" 
								  class="form-label">Tell us something about your shopping experiences to buy our product:</label>
  								<textarea {{ $mode == 'show' ? 'disabled' : '' }} 
								  class="form-control" id="exampleFormControlTextarea4" 
								  value="{{ $survey->exampleFormControlTextarea4 }}" 
								  name="survey[exampleFormControlTextarea4]" 
								  required rows="3"><?php echo $survey['exampleFormControlTextarea4']; ?></textarea>
                                    <div class="invalid-feedback">
                                        This field is required!
                                    </div>
  							    </div>
							</div>

								<br>
								<br>

							<div class="mb-3">
								<div class="container-fluid">
  								<label for="exampleFormControlTextarea5" 
								  class="form-label">Would you like to continue with our product? If no, why? </label>
  								<textarea {{ $mode == 'show' ? 'disabled' : '' }} 
								  class="form-control" id="exampleFormControlTextarea5" 
								  value="{{ $survey->exampleFormControlTextarea5 }}" 
								  name="survey[exampleFormControlTextarea5]" 
								  required rows="3"><?php echo $survey['exampleFormControlTextarea5']; ?></textarea>
                                    <div class="invalid-feedback">
                                        This field is required!
                                    </div>
  							    </div>
							</div>

								<br>
								<br>

							<div class="mb-3">
								<div class="container-fluid">
  									<label for="exampleFormControlTextarea6" 
									  class="form-label">What kind of challenges would you like to see in our product so as to enhance your satisfaction level?</label>
  									<textarea {{ $mode == 'show' ? 'disabled' : '' }} 
									  class="form-control" id="exampleFormControlTextarea6" 
									  value="{{ $survey->exampleFormControlTextarea6}}" 
									  name="survey[exampleFormControlTextarea6]" 
									  required rows="3"><?php echo $survey['exampleFormControlTextarea6']; ?></textarea>
                                        <div class="invalid-feedback">
                                            This field is required!
                                        </div>
  							    </div>
							</div>

							<div class="co12"><h6>Thank you for completing this survey!</h6>
									<div class="row">
									</div>		
							</div>
							

							
							<!-- Delete Warning Modal --> 
							{{-- <form action="{{ route('survey.delete', $survey->id) }}" method="post">
								<div class="modal-body">
									@csrf
									@method('DELETE')
									<h5 class="text-center">Are you sure you want to delete {{ $survey->name }} ?</h5>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
									<button type="submit" class="btn btn-danger">Yes, Delete Project</button>
								</div>
							</form> --}}
							

							<!-- FOOTER-->
							<div class="card-footer">
								@if ($mode == 'show' ? '' : 'disabled')
								<a href="{{  route('survey.index') }}" type = "button" class="btn btn-primary pe-4 ps-4 float-end"> Back</a>
								@endif
								@if($mode == 'show' ? '' : 'disabled')
								<button type ="submit" class="btn btn-success pe-4 ps-4 float-end me-2">Submit</button>
								@endif
							</div>
						



					    </div>
			    </div>
            </form>    
            </main>    
	    </div>
    </div>
</div>

@endsection