@extends('layouts.app')

@section('content')

    {{-- {{ dd($performance); }} --}}

    <div class="container-fluid">
        <div class="row">
            <main class="form">
                <div class="col-md-12">
                    <form action="{{ route('performance.store') }}" method="POST"
                        class="row form-fill-up-employee" id="forms">                       
                            <div class="card-body">

                                <input type="hidden" id="currentSection" value="sectionA">

                                <div class="card shadow m xy-1" id="form-1">
                                        <div class="card-header">
                                            <div class="card-title pb-0 pt-2 px-4 mx-1">Employee Performance Review
                                                @if ($mode == 'edit' ? '' : 'disabled')
                                                    <a href="{{ route('performance.edit', $performance->id) }}"
                                                        class="btn btn-primary me-2 float-end mx-4"> Edit</a>
                                                @endif
                                            </div>
                                        </div>
                                        
                                        <div class="row card-body">
                                            @csrf
                                            <div class="col-md-12 first-name-col">
                                                <input type="hidden" name="employee[id]" id="id" value="{{ $performance->id }}">

                                                <div class="form-group col-lg-6 mb-4">        
                                                    <select {{ $mode == 'show' ? 'disabled' : '' }} 
                                                    class="employeeDetails form-select mt-4 dynamic" 
                                                    data-dependent= "firstName,lastName,title,department,supervisor1,supervisor2,dateHired" 
                                                    value="{{ $performance->employee_number }}" 
                                                    id="employee_number" 
                                                    name="employee[employee_number]" 
                                                    aria-label="Default select example" 
                                                    required>                                                               

                                                        <option selected></option> 
                                                        @foreach ($registration as $employeeNumber)                                                                                                                                                                                            
                                                            <option {{ ($performance->employee_number) == $employeeNumber->employee_number ? 'selected' : '' }} value="{{ $employeeNumber->employee_number }}"> 
                                                                {{ $employeeNumber->employee_number }} - {{ $employeeNumber->lastname }} , {{ $employeeNumber->firstname }}</option>
                                                        @endforeach 
                                                    </select>                                               
                                                </div>
                                            </div>                                           

                                            <div class="col-md-6 first-name-col">
                                                <div class="container-fluid">
                                                    <label for="validation-fname" id="label-form-1" class="form-label mt-4 mb-4"
                                                        style="font-weight: bold;">Employee Name</label>
           
                                                    <input {{ $mode == 'show' ? 'disabled' : '' }} type="text"
                                                        class="first-name form-control mb-2" id="firstName" name="employee[firstName]"
                                                        value="{{ $performance->firstName }}" placeholder="">

                                                    <label class="text-muted sub-label mt-2" id="labeling">First Name</label>

                                                </div>
                                            </div>

                                            <div class="col-md-6 last-name-col">
                                                <div class="container-fluid">
                                                    <label for="validation-fname" id="label-form-1" class="form-label mt-4 mb-4 invisible">Employee
                                                        Name</label>

                                                    <input {{ $mode == 'show' ? 'disabled' : '' }} type="text"
                                                        class="last-name form-control mb-2" id="lastName" name="employee[lastName]"
                                                        value="{{ $performance->lastName }}" placeholder="">

                                                    <label class="form-label text-muted sub-label mt-2">Last Name</label>
                                                </div>
                                            </div>

                                            <div class="col-md-6 title-col">
                                                <div class="container-fluid">
                                                    <label class="form-label my-3 mb-4" id="label-form-1" style="font-weight: bold;">Title</label>

                                                    <input {{ $mode == 'show' ? 'disabled' : '' }} type="text"
                                                        class="title form-control mb-2" id="title" name="employee[title]"
                                                        value="{{ $performance->title }}" placeholder="">
                                                </div>
                                            </div>

                                            <div class="col-md-6 department-col">
                                                <div class="container-fluid">
                                                    <label class="form-label my-3 mb-4" id="label-form-1" style="font-weight: bold;">Department</label>

                                                    {{-- <input {{ $mode == 'show' ? 'disabled' : '' }} type="text"
                                                        class="department form-control mb-2" id="department" name="employee[department]"
                                                        value="{{ $performance->department }}" placeholder=""> --}}

                                                    <select {{ $mode == 'show' ? 'disabled' : '' }} class="form-select mb-2"                                                           
                                                        value="{{ $performance->employee_number }}" 
                                                        id="department" name="employee[department]" aria-label="Default select example">                                                               
                                                        <option selected></option> 
                                                        @foreach ($department as $dynamicDepartment)                                                                                                                                                                      
                                                            <option {{ ($performance->department) == $dynamicDepartment->code ? 'selected' : '' }} value="{{ $dynamicDepartment->code }}"> 
                                                                {{ $dynamicDepartment->code }} - {{ $dynamicDepartment->department }} </option>
                                                        @endforeach         
                                                    </select>                 
                                                </div>
                                            </div>

                                            <div class="col-md-12 supervisor-col">
                                                <div class="container-fluid">
                                                    <label class="form-label my-4" id="label-form-1" style="font-weight: bold;">Supervisor</label>
                                                        
                                                    <select {{ $mode == 'show' ? 'disabled' : '' }} class="form-select mb-2" id= "supervisor" value="" name="employee[supervisor]" aria-label="Default select example">
                                                        <option selected></option>
                                                        @foreach ($roles as $dynamicRoles)                                           
                                                            <option {{ ($performance->supervisor) == $dynamicRoles->code ? 'selected' : '' }} value="{{ $dynamicRoles->code }}">
                                                            {{ $dynamicRoles->code }} - {{ $dynamicRoles->description }} </option>
                                                        @endforeach                        
                                                    </select> 

                                                    <label class="form-label text-muted sub-label">First Name</label>
                                                </div>
                                            </div>

                                            <div class="col-md-6 date-col">
                                                <div class="container-fluid">
                                                    <label class="form-label my-3" id="label-form-1" style="font-weight: bold;">Date of Hire</label>
                                                    {{-- <div class="input-group date" data-provide="datepicker"> --}}
                                                        <input type="date" class="form-control my-2"
                                                            {{ $mode == 'show' ? 'disabled' : '' }} name="employee[dateHired]"
                                                            id="dateHired" value="{{ $performance->dateHired }}">
                                                    {{-- </div> --}}
                                                </div>
                                            </div>
                                            {{ csrf_field() }}
                                        </div>
                                        {{-- button section --}}

                                        <div class="card-footer form-navigation">
                                            <div class="float-end">
                                                {{-- @if ($mode == 'show' ? '' : 'disabled')
                                                    <button type="button" class="btn btn-primary mx-4">Save</button>
                                                @endif --}}
                                                <button type="button" class="btn btn-primary mx-4" id="nextBtn">Next</button>
                                            </div>
                
                                            <div class="float-start">
                                                <a href="{{ url('performance') }}" class="btn btn-secondary float-end mx-4">Back</a>
                                                {{-- <button type="button" class="btn btn-secondary mx-4" id="prevBtn" onclick="nextPrev(-1)">Previous</button> --}}
                                            </div>
                                        </div>
                                </div>

                                <div class="card shadow m xy-1" id="form-2">
                                    <div class="card-header">
                                        <div class="card-title pb-0 pt-2 px-4 mx-1">Performance Competencies
                                        </div>
                                    </div>

                                    <input type="hidden" name="rating[employeeID]" value="{{ $performance->id }}">

                                    <div class="card-body">
                                            <div class="col-md-12">
                                                <div class="container-fluid">

                                                    <p class="skill-description mt-4 mb-4">Skill and proficiency in carrying out
                                                        assignments.</p>

                                                    <div class="form-group text-center">
                                                        <div class="form-check form-check-inline">
                                                            <input {{ $mode == 'show' ? 'disabled' : '' }}
                                                                class="form-check-input mx-5" style="width: 1.75rem; height: 1.75rem;"
                                                                type="radio" name="rating[inlineRadioOptions]" id="inlineRadioOptions" value="1" {{ $performance_competencies->inlineRadioOptions == 1 ? 'checked' : '' }}
                                                                >
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input {{ $mode == 'show' ? 'disabled' : '' }}
                                                                class="form-check-input mx-5" style="width: 1.75rem; height: 1.75rem;"
                                                                type="radio" name="rating[inlineRadioOptions]" id="inlineRadioOptions" value="2" {{ $performance_competencies->inlineRadioOptions == 2 ? 'checked' : '' }}
                                                                >
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input {{ $mode == 'show' ? 'disabled' : '' }}
                                                                class="form-check-input mx-5" style="width: 1.75rem; height: 1.75rem;"
                                                                type="radio" name="rating[inlineRadioOptions]" id="inlineRadioOptions" value="3" {{ $performance_competencies->inlineRadioOptions == 3 ? 'checked' : '' }}
                                                                >
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input {{ $mode == 'show' ? 'disabled' : '' }}
                                                                class="form-check-input mx-5" style="width: 1.75rem; height: 1.75rem;"
                                                                type="radio" name="rating[inlineRadioOptions]" id="inlineRadioOptions" value="4" {{ $performance_competencies->inlineRadioOptions == 4 ? 'checked' : '' }}
                                                                >
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input {{ $mode == 'show' ? 'disabled' : '' }}
                                                                class="form-check-input mx-5" style="width: 1.75rem; height: 1.75rem;"
                                                                type="radio" name="rating[inlineRadioOptions]" id="inlineRadioOptions" value="5" {{ $performance_competencies->inlineRadioOptions == 5 ? 'checked' : '' }}
                                                                >
                                                        </div>
                                                        
                                                        <label for="rating[inlineRadioOptions]" class="is-invalid" style="visibility: hidden"></label>

                                                    </div>
                            
                                                    <div class="col-md-6 offset-md-3">
                                                        <table>
                                                            <tr>
                                                                <td class="col-md-1">
                                                                    <p class="text-start" style="margin-left: 3%;">Needs <br>
                                                                        Improvement</p>
                                                                </td>
                                                                <td class="col-md-1">
                                                                    <p class="text-end">Exceeds <br> Expectation</p>
                                                                </td>
                                                            <tr>
                                                        </table>
                                                    </div>

                                                    <div class="form-group">
                                                        <p class="skill-description mt-4">Brief explanation.</p>
                                                        <textarea {{ $mode == 'show' ? 'disabled' : '' }} class="form-control" placeholder="Leave a comment here"
                                                            name="rating[comment]" value="{{ $performance_competencies->comment }}" id="comment"><?php echo $performance_competencies['comment'];?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>

                                    <div class="card-body">
                                            <div class="col-md-12">
                                                <div class="container-fluid">
                
                                                    <p class="skill-description mt-4 mb-4">Possesses skills and knowledge to perform the job competently.</p>
                                                
                                                    <div class="form-group text-center">         
                                                        <div class="form-check form-check-inline">
                                                            <input {{ $mode == 'show' ? 'disabled' : '' }} class="form-check-input mx-5" style="width: 1.75rem; height: 1.75rem;" type="radio" name="rating[inlineRadioOptions1]" id="inlineRadioOptions1" value="1" {{ $performance_competencies->inlineRadioOptions1 == 1 ? 'checked' : '' }}>                                                
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input {{ $mode == 'show' ? 'disabled' : '' }} class="form-check-input mx-5" style="width: 1.75rem; height: 1.75rem;" type="radio" name="rating[inlineRadioOptions1]" id="inlineRadioOptions1" value="2" {{ $performance_competencies->inlineRadioOptions1 == 2 ? 'checked' : '' }}>                                                
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input {{ $mode == 'show' ? 'disabled' : '' }} class="form-check-input mx-5" style="width: 1.75rem; height: 1.75rem;" type="radio" name="rating[inlineRadioOptions1]" id="inlineRadioOptions1" value="3" {{ $performance_competencies->inlineRadioOptions1 == 3 ? 'checked' : '' }}>                                               
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input {{ $mode == 'show' ? 'disabled' : '' }} class="form-check-input mx-5" style="width: 1.75rem; height: 1.75rem;" type="radio" name="rating[inlineRadioOptions1]" id="inlineRadioOptions1" value="4" {{ $performance_competencies->inlineRadioOptions1 == 4 ? 'checked' : '' }}>                                                
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input {{ $mode == 'show' ? 'disabled' : '' }} class="form-check-input mx-5" style="width: 1.75rem; height: 1.75rem;" type="radio" name="rating[inlineRadioOptions1]" id="inlineRadioOptions1" value="5" {{ $performance_competencies->inlineRadioOptions1 == 5 ? 'checked' : '' }}>                   
                                                        </div>

                                                        <label for="rating[inlineRadioOptions1]" class="is-invalid" style="visibility: hidden"></label>
                                                    </div>
                
                                                    
                                                    <div class="col-md-6 offset-md-3">
                                                        <table>
                                                            <tr>
                                                                <td class="col-md-1"><p class="text-start" style="margin-left: 3%;">Needs <br> Improvement</p></td>
                                                                <td class="col-md-1"><p class="text-end">Exceeds <br> Expectation</p></td>
                                                            <tr>
                                                        </table>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <p class="skill-description mt-4">Brief explanation.</p>
                                                        <textarea {{ $mode == 'show' ? 'disabled' : '' }} class="form-control" placeholder="Leave a comment here" name="rating[comment1]" value="{{ $performance_competencies->comment1 }}" id="comment1"><?php echo  $performance_competencies['comment1'];?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>

                                    <div class="card-body">
                                            <div class="col-md-12">
                                                <div class="container-fluid">
                
                                                    <p class="skill-description mt-4 mb-4">Skill at planning, organizing and prioritizing workload.</p>
                            
                                                    <div class="form-group text-center">         
                                                        <div class="form-check form-check-inline">
                                                            <input {{ $mode == 'show' ? 'disabled' : '' }} class="form-check-input mx-5" style="width: 1.75rem; height: 1.75rem;" type="radio" name="rating[inlineRadioOptions2]" id="inlineRadioOptions2" value="1" {{ $performance_competencies->inlineRadioOptions2 == 1? 'checked' : '' }}>                                                
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input {{ $mode == 'show' ? 'disabled' : '' }} class="form-check-input mx-5" style="width: 1.75rem; height: 1.75rem;" type="radio" name="rating[inlineRadioOptions2]" id="inlineRadioOptions2" value="2" {{ $performance_competencies->inlineRadioOptions2 == 2 ? 'checked' : '' }}>                                                
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input {{ $mode == 'show' ? 'disabled' : '' }} class="form-check-input mx-5" style="width: 1.75rem; height: 1.75rem;" type="radio" name="rating[inlineRadioOptions2]" id="inlineRadioOptions2" value="3" {{ $performance_competencies->inlineRadioOptions2 == 3 ? 'checked' : '' }}>                                               
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input {{ $mode == 'show' ? 'disabled' : '' }} class="form-check-input mx-5" style="width: 1.75rem; height: 1.75rem;" type="radio" name="rating[inlineRadioOptions2]" id="inlineRadioOptions2" value="4" {{ $performance_competencies->inlineRadioOptions2 == 4 ? 'checked' : '' }}>                                                
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input {{ $mode == 'show' ? 'disabled' : '' }} class="form-check-input mx-5" style="width: 1.75rem; height: 1.75rem;" type="radio" name="rating[inlineRadioOptions2]" id="inlineRadioOptions2" value="5" {{ $performance_competencies->inlineRadioOptions2 == 5 ? 'checked' : '' }}>                   
                                                        </div>

                                                        <label for="rating[inlineRadioOptions2]" class="is-invalid" style="visibility: hidden"></label>
                                                    </div>
                                                                                          
                                                    <div class="col-md-6 offset-md-3">
                                                        <table>
                                                            <tr>
                                                                <td class="col-md-1"><p class="text-start" style="margin-left: 3%;">Needs <br> Improvement</p></td>
                                                                <td class="col-md-1"><p class="text-end">Exceeds <br> Expectation</p></td>
                                                            <tr>
                                                        </table>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <p class="skill-description mt-4">Brief explanation.</p>
                                                        <textarea {{ $mode == 'show' ? 'disabled' : '' }} class="form-control" placeholder="Leave a comment here" name="rating[comment2]" value="" id="comment2"><?php echo  $performance_competencies['comment2'];?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>

                                    <div class="card-body">
                                            <div class="col-md-12">
                                                <div class="container-fluid">
                
                                                    <p class="skill-description mt-4 mb-4">Holds self accountable for assigned responsibilities; sees tasks through completion in a timely manner.</p>
                                                
                                                    <div class="form-group text-center">         
                                                        <div class="form-check form-check-inline">
                                                            <input {{ $mode == 'show' ? 'disabled' : '' }} class="form-check-input mx-5" style="width: 1.75rem; height: 1.75rem;" type="radio" name="rating[inlineRadioOptions3]" id="inlineRadioOptions3" {{ $performance_competencies->inlineRadioOptions3 == 1 ? 'checked' : '' }} value="1">                                                
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input {{ $mode == 'show' ? 'disabled' : '' }} class="form-check-input mx-5" style="width: 1.75rem; height: 1.75rem;" type="radio" name="rating[inlineRadioOptions3]" id="inlineRadioOptions3" {{ $performance_competencies->inlineRadioOptions3 == 2 ? 'checked' : '' }} value="2">                                                
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input {{ $mode == 'show' ? 'disabled' : '' }} class="form-check-input mx-5" style="width: 1.75rem; height: 1.75rem;" type="radio" name="rating[inlineRadioOptions3]" id="inlineRadioOptions3" {{ $performance_competencies->inlineRadioOptions3 == 3 ? 'checked' : '' }} value="3">                                               
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input {{ $mode == 'show' ? 'disabled' : '' }} class="form-check-input mx-5" style="width: 1.75rem; height: 1.75rem;" type="radio" name="rating[inlineRadioOptions3]" id="inlineRadioOptions3" {{ $performance_competencies->inlineRadioOptions3 == 4 ? 'checked' : '' }}value="4">                                                
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input {{ $mode == 'show' ? 'disabled' : '' }} class="form-check-input mx-5" style="width: 1.75rem; height: 1.75rem;" type="radio" name="rating[inlineRadioOptions3]" id="inlineRadioOptions3" {{ $performance_competencies->inlineRadioOptions3 == 5 ? 'checked' : '' }} value="5">                   
                                                        </div>

                                                        <label for="rating[inlineRadioOptions3]" class="is-invalid" style="visibility: hidden"></label>
                                                    </div>
                
                                                    
                                                    <div class="col-md-6 offset-md-3">
                                                        <table>
                                                            <tr>
                                                                <td class="col-md-1"><p class="text-start" style="margin-left: 3%;">Needs <br> Improvement</p></td>
                                                                <td class="col-md-1"><p class="text-end">Exceeds <br> Expectation</p></td>
                                                            <tr>
                                                        </table>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <p class="skill-description mt-4">Brief explanation.</p>
                                                        <textarea {{ $mode == 'show' ? 'disabled' : '' }} class="form-control" placeholder="Leave a comment here" name="rating[comment3]" value="" id="comment3"><?php echo $performance_competencies['comment3'];?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>               

                                    <div class="card-body">
                                            <div class="col-md-12">
                                                <div class="container-fluid">
                
                                                    <p class="skill-description mt-4 mb-4">Proficiency at improving work methods and procedures as a means toward greater efficiency.</p>
                                                    
                                                    <div class="form-group text-center">         
                                                        <div class="form-check form-check-inline">
                                                            <input {{ $mode == 'show' ? 'disabled' : '' }} class="form-check-input mx-5" style="width: 1.75rem; height: 1.75rem;" type="radio" name="rating[inlineRadioOptions4]" id="inlineRadioOptions4" {{ $performance_competencies->inlineRadioOptions4 == 1 ? 'checked' : '' }} value="1">                                                
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input {{ $mode == 'show' ? 'disabled' : '' }} class="form-check-input mx-5" style="width: 1.75rem; height: 1.75rem;" type="radio" name="rating[inlineRadioOptions4]" id="inlineRadioOptions4" {{ $performance_competencies->inlineRadioOptions4 == 2 ? 'checked' : '' }} value="2">                                                
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input {{ $mode == 'show' ? 'disabled' : '' }} class="form-check-input mx-5" style="width: 1.75rem; height: 1.75rem;" type="radio" name="rating[inlineRadioOptions4]" id="inlineRadioOptions4" {{ $performance_competencies->inlineRadioOptions4 == 3 ? 'checked' : '' }} value="3">                                               
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input {{ $mode == 'show' ? 'disabled' : '' }} class="form-check-input mx-5" style="width: 1.75rem; height: 1.75rem;" type="radio" name="rating[inlineRadioOptions4]" id="inlineRadioOptions4" {{ $performance_competencies->inlineRadioOptions4 == 4 ? 'checked' : '' }} value="4">                                                
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input {{ $mode == 'show' ? 'disabled' : '' }} class="form-check-input mx-5" style="width: 1.75rem; height: 1.75rem;" type="radio" name="rating[inlineRadioOptions4]" id="inlineRadioOptions4" {{ $performance_competencies->inlineRadioOptions4 == 5 ? 'checked' : '' }} value="5">                   
                                                        </div>

                                                        <label for="rating[inlineRadioOptions4]" class="is-invalid" style="visibility: hidden"></label>
                                                    </div>
                
                                                    
                                                    <div class="col-md-6 offset-md-3">
                                                        <table>
                                                            <tr>
                                                                <td class="col-md-1"><p class="text-start" style="margin-left: 3%;">Needs <br> Improvement</p></td>
                                                                <td class="col-md-1"><p class="text-end">Exceeds <br> Expectation</p></td>
                                                            <tr>
                                                        </table>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <p class="skill-description mt-4">Brief explanation.</p>
                                                        <textarea {{ $mode == 'show' ? 'disabled' : '' }} class="form-control" placeholder="Leave a comment here" name="rating[comment4]" value="" id="comment4"><?php echo $performance_competencies['comment4'];?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>

                                    <div class="card-body">
                                            <div class="col-md-12">
                                                <div class="container-fluid">
                
                                                    <p class="skill-description mt-4 mb-4">Communicates with supervisor, peers and customers.</p>
                                                    
                                                    <div class="form-group text-center">         
                                                        <div class="form-check form-check-inline">
                                                            <input {{ $mode == 'show' ? 'disabled' : '' }} class="form-check-input mx-5" style="width: 1.75rem; height: 1.75rem;" type="radio" name="rating[inlineRadioOptions5]" id="inlineRadioOptions5" {{ $performance_competencies->inlineRadioOptions5 == 1 ? 'checked' : '' }} value="1">                                                
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input {{ $mode == 'show' ? 'disabled' : '' }} class="form-check-input mx-5" style="width: 1.75rem; height: 1.75rem;" type="radio" name="rating[inlineRadioOptions5]" id="inlineRadioOptions5" {{ $performance_competencies->inlineRadioOptions5 == 2 ? 'checked' : '' }} value="2">                                                
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input {{ $mode == 'show' ? 'disabled' : '' }} class="form-check-input mx-5" style="width: 1.75rem; height: 1.75rem;" type="radio" name="rating[inlineRadioOptions5]" id="inlineRadioOptions5" {{ $performance_competencies->inlineRadioOptions5 == 3 ? 'checked' : '' }} value="3">                                               
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input {{ $mode == 'show' ? 'disabled' : '' }} class="form-check-input mx-5" style="width: 1.75rem; height: 1.75rem;" type="radio" name="rating[inlineRadioOptions5]" id="inlineRadioOptions5" {{ $performance_competencies->inlineRadioOptions5 == 4 ? 'checked' : '' }} value="4">                                                
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input {{ $mode == 'show' ? 'disabled' : '' }} class="form-check-input mx-5" style="width: 1.75rem; height: 1.75rem;" type="radio" name="rating[inlineRadioOptions5]" id="inlineRadioOptions5" {{ $performance_competencies->inlineRadioOptions5 == 5 ? 'checked' : '' }}  value="5">                   
                                                        </div>

                                                        <label for="rating[inlineRadioOptions5]" class="is-invalid" style="visibility: hidden"></label>
                                                    </div>
                
                                                    
                                                    <div class="col-md-6 offset-md-3">
                                                        <table>
                                                            <tr>
                                                                <td class="col-md-1"><p class="text-start" style="margin-left: 3%;">Needs <br> Improvement</p></td>
                                                                <td class="col-md-1"><p class="text-end">Exceeds <br> Expectation</p></td>
                                                            <tr>
                                                        </table>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <p class="skill-description mt-4">Brief explanation.</p>
                                                        <textarea {{ $mode == 'show' ? 'disabled' : '' }} class="form-control" placeholder="Leave a comment here" name="rating[comment5]" value="" id="comment5"><?php echo $performance_competencies['comment4'];?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>

                                    <div class="card-body">
                                            <div class="col-md-12">
                                                <div class="container-fluid">
                
                                                    <p class="skill-description mt-4 mb-4">Ability to work independently.</p>
                                                    
                                                    <div class="form-group text-center">         
                                                        <div class="form-check form-check-inline">
                                                            <input {{ $mode == 'show' ? 'disabled' : '' }} class="form-check-input mx-5" style="width: 1.75rem; height: 1.75rem;" type="radio" name="rating[inlineRadioOptions6]" id="inlineRadioOptions6"  value="1" {{ $performance_competencies->inlineRadioOptions6 == 1 ? 'checked' : '' }}>                                                
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input {{ $mode == 'show' ? 'disabled' : '' }} class="form-check-input mx-5" style="width: 1.75rem; height: 1.75rem;" type="radio" name="rating[inlineRadioOptions6]" id="inlineRadioOptions6" value="2" {{ $performance_competencies->inlineRadioOptions6 == 2 ? 'checked' : '' }}>                                                
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input {{ $mode == 'show' ? 'disabled' : '' }} class="form-check-input mx-5" style="width: 1.75rem; height: 1.75rem;" type="radio" name="rating[inlineRadioOptions6]" id="inlineRadioOptions6" value="3" {{ $performance_competencies->inlineRadioOptions6 == 3 ? 'checked' : '' }}>                                               
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input {{ $mode == 'show' ? 'disabled' : '' }} class="form-check-input mx-5" style="width: 1.75rem; height: 1.75rem;" type="radio" name="rating[inlineRadioOptions6]" id="inlineRadioOptions6" value="4" {{ $performance_competencies->inlineRadioOptions6 == 4 ? 'checked' : '' }}>                                                
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input {{ $mode == 'show' ? 'disabled' : '' }} class="form-check-input mx-5" style="width: 1.75rem; height: 1.75rem;" type="radio" name="rating[inlineRadioOptions6]" id="inlineRadioOptions6" value="5" {{ $performance_competencies->inlineRadioOptions6 == 5 ? 'checked' : '' }}>                   
                                                        </div>

                                                        <label for="rating[inlineRadioOptions6]" class="is-invalid" style="visibility: hidden"></label>
                                                    </div>
                
                                                    
                                                    <div class="col-md-6 offset-md-3">
                                                        <table>
                                                            <tr>
                                                                <td class="col-md-1"><p class="text-start" style="margin-left: 3%;">Needs <br> Improvement</p></td>
                                                                <td class="col-md-1"><p class="text-end">Exceeds <br> Expectation</p></td>
                                                            <tr>
                                                        </table>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <p class="skill-description mt-4">Brief explanation.</p>
                                                        <textarea {{ $mode == 'show' ? 'disabled' : '' }} class="form-control" placeholder="Leave a comment here" name="rating[comment6]" value="" id="comment6"><?php echo $performance_competencies['comment6'];?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>

                                    <div class="card-body">
                                            <div class="col-md-12">
                                                <div class="container-fluid">
                
                                                    <p class="skill-description mt-4 mb-4">Reliability (attendance, punctuality, meeting deadlines).</p>
                                                    
                                                    <div class="form-group text-center">         
                                                        <div class="form-check form-check-inline">
                                                            <input {{ $mode == 'show' ? 'disabled' : '' }} class="form-check-input mx-5" style="width: 1.75rem; height: 1.75rem;" type="radio" name="rating[inlineRadioOptions7]" id="inlineRadioOptions7" {{ $performance_competencies->inlineRadioOptions7 == 1 ? 'checked' : '' }} value="1">                                                
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input {{ $mode == 'show' ? 'disabled' : '' }} class="form-check-input mx-5" style="width: 1.75rem; height: 1.75rem;" type="radio" name="rating[inlineRadioOptions7]" id="inlineRadioOptions7" {{ $performance_competencies->inlineRadioOptions7 == 2 ? 'checked' : '' }} value="2">                                                
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input {{ $mode == 'show' ? 'disabled' : '' }} class="form-check-input mx-5" style="width: 1.75rem; height: 1.75rem;" type="radio" name="rating[inlineRadioOptions7]" id="inlineRadioOptions7" {{ $performance_competencies->inlineRadioOptions7 == 3 ? 'checked' : '' }} value="3">                                               
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input {{ $mode == 'show' ? 'disabled' : '' }} class="form-check-input mx-5" style="width: 1.75rem; height: 1.75rem;" type="radio" name="rating[inlineRadioOptions7]" id="inlineRadioOptions7" {{ $performance_competencies->inlineRadioOptions7 == 4 ? 'checked' : '' }} value="4">                                                
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input {{ $mode == 'show' ? 'disabled' : '' }} class="form-check-input mx-5" style="width: 1.75rem; height: 1.75rem;" type="radio" name="rating[inlineRadioOptions7]" id="inlineRadioOptions7" {{ $performance_competencies->inlineRadioOptions7 == 5 ? 'checked' : '' }} value="5">                   
                                                        </div>

                                                        <label for="rating[inlineRadioOptions7]" class="is-invalid" style="visibility: hidden"></label>
                                                    </div>
                                                    
                                                    <div class="col-md-6 offset-md-3">
                                                        <table>
                                                            <tr>
                                                                <td class="col-md-1"><p class="text-start" style="margin-left: 3%;">Needs <br> Improvement</p></td>
                                                                <td class="col-md-1"><p class="text-end">Exceeds <br> Expectation</p></td>
                                                            <tr>
                                                        </table>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <p class="skill-description mt-4">Brief explanation.</p>
                                                        <textarea {{ $mode == 'show' ? 'disabled' : '' }} class="form-control" placeholder="Leave a comment here" name="rating[comment7]" value="" id="comment7"><?php echo $performance_competencies['comment7'];?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>

                                    <div class="card-body">
                                            <div class="col-md-12">
                                                <div class="container-fluid">
                
                                                    <p class="skill-description mt-4 mb-4">Abilitiy to work coopereatively with supervisoion or as a part of a team.</p>

                                                    <div class="form-group text-center">         
                                                        <div class="form-check form-check-inline">
                                                            <input {{ $mode == 'show' ? 'disabled' : '' }} class="form-check-input mx-5" style="width: 1.75rem; height: 1.75rem;" type="radio" name="rating[inlineRadioOptions8]" id="inlineRadioOptions8" value="1" {{ $performance_competencies->inlineRadioOptions8 == 1 ? 'checked' : '' }}>                                                
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input {{ $mode == 'show' ? 'disabled' : '' }} class="form-check-input mx-5" style="width: 1.75rem; height: 1.75rem;" type="radio" name="rating[inlineRadioOptions8]" id="inlineRadioOptions8" value="2" {{ $performance_competencies->inlineRadioOptions8 == 2 ? 'checked' : '' }}>                                                
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input {{ $mode == 'show' ? 'disabled' : '' }} class="form-check-input mx-5" style="width: 1.75rem; height: 1.75rem;" type="radio" name="rating[inlineRadioOptions8]" id="inlineRadioOptions8" value="3" {{ $performance_competencies->inlineRadioOptions8 == 3 ? 'checked' : '' }}>                                               
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input {{ $mode == 'show' ? 'disabled' : '' }} class="form-check-input mx-5" style="width: 1.75rem; height: 1.75rem;" type="radio" name="rating[inlineRadioOptions8]" id="inlineRadioOptions8" value="4" {{ $performance_competencies->inlineRadioOptions8 == 4 ? 'checked' : '' }}>                                                
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input {{ $mode == 'show' ? 'disabled' : '' }} class="form-check-input mx-5" style="width: 1.75rem; height: 1.75rem;" type="radio" name="rating[inlineRadioOptions8]" id="inlineRadioOptions8" value="5" {{ $performance_competencies->inlineRadioOptions8 == 5 ? 'checked' : '' }}>                   
                                                        </div>

                                                        <label for="rating[inlineRadioOptions8]" class="is-invalid" style="visibility: hidden"></label>
                                                    </div>
                                                    
                                                    <div class="col-md-6 offset-md-3">
                                                        <table>
                                                            <tr>
                                                                <td class="col-md-1"><p class="text-start" style="margin-left: 3%;">Needs <br> Improvement</p></td>
                                                                <td class="col-md-1"><p class="text-end">Exceeds <br> Expectation</p></td>
                                                            <tr>
                                                        </table>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <p class="skill-description mt-4">Brief explanation.</p>
                                                        <textarea {{ $mode == 'show' ? 'disabled' : '' }} class="form-control" placeholder="Leave a comment here" name="rating[comment8]" value="" id="comment8"><?php echo $performance_competencies['comment8'];?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>

                                    <div class="card-body"> 
                                            <div class="col-md-12">
                                                <div class="container-fluid">
                
                                                    <p class="skill-description mt-4 mb-4">Willingness to take on additional responsibilities.</p>
                                                    
                                                    <div class="form-group text-center">         
                                                        <div class="form-check form-check-inline">
                                                            <input {{ $mode == 'show' ? 'disabled' : '' }} class="form-check-input mx-5" style="width: 1.75rem; height: 1.75rem;" type="radio" name="rating[inlineRadioOptions9]" id="inlineRadioOptions9" value="1" {{ $performance_competencies->inlineRadioOptions9 == 1 ? 'checked' : '' }}>                                                
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input {{ $mode == 'show' ? 'disabled' : '' }} class="form-check-input mx-5" style="width: 1.75rem; height: 1.75rem;" type="radio" name="rating[inlineRadioOptions9]" id="inlineRadioOptions9" value="2" {{ $performance_competencies->inlineRadioOptions9 == 2 ? 'checked' : '' }}>                                                
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input {{ $mode == 'show' ? 'disabled' : '' }} class="form-check-input mx-5" style="width: 1.75rem; height: 1.75rem;" type="radio" name="rating[inlineRadioOptions9]" id="inlineRadioOptions9" value="3" {{ $performance_competencies->inlineRadioOptions9 == 3 ? 'checked' : '' }}>                                               
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input {{ $mode == 'show' ? 'disabled' : '' }} class="form-check-input mx-5" style="width: 1.75rem; height: 1.75rem;" type="radio" name="rating[inlineRadioOptions9]" id="inlineRadioOptions9" value="4" {{ $performance_competencies->inlineRadioOptions9 == 4 ? 'checked' : '' }}>                                                
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input {{ $mode == 'show' ? 'disabled' : '' }} class="form-check-input mx-5" style="width: 1.75rem; height: 1.75rem;" type="radio" name="rating[inlineRadioOptions9]" id="inlineRadioOptions9" value="5" {{ $performance_competencies->inlineRadioOptions9 == 5 ? 'checked' : '' }}>                   
                                                        </div>

                                                        <label for="rating[inlineRadioOptions9]" class="is-invalid" style="visibility: hidden"></label>
                                                    </div>
                
                                                    
                                                    <div class="col-md-6 offset-md-3">
                                                        <table>
                                                            <tr>
                                                                <td class="col-md-1"><p class="text-start" style="margin-left: 3%;">Needs <br> Improvement</p></td>
                                                                <td class="col-md-1"><p class="text-end">Exceeds <br> Expectation</p></td>
                                                            <tr>
                                                        </table>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <p class="skill-description mt-4">Brief explanation.</p>
                                                        <textarea {{ $mode == 'show' ? 'disabled' : '' }} class="form-control" placeholder="Leave a comment here" name="rating[comment9]" value="" id="comment9"><?php echo $performance_competencies['comment9'];?></textarea>
                                                    </div>
                                                </div>
                                            </div>                                           
                                        </div>
                                        <div class="card-footer">
                                            <div class="float-end">
                                                <button type="button" class="btn btn-primary mx-4" id="nextBtn1">Next</button>
                                            </div>
                
                                            <div class="float-start">
                                                <button type="button" class="btn btn-secondary mx-4" id="prevBtn">Previous</button>
                                            </div>
                                        </div>
                                </div>
              
                                <div class="card shadow m xy-1" id="form-3">
                                    <div class="card-header">
                                        <div class="card-title pb-0 pt-2 px-4 mx-1">Performance Summary
                                        </div>
                                    </div>

                                    <div class="row card-body">
                                        @csrf
            
                                        <p class="list-label-2 mt-3 px-4">List the employee's development goals for the coming year:</p>
            
                                        <div class="col-md-12 mt-1 px-4">
                                            <label class="form-label" style="font-weight: bold;">What makes employee effective?</label>
            
                                            <input type="hidden" name="summary[employeeID]" value="{{ $performance->id }}">
            
                                            <textarea {{ $mode == 'show' ? 'disabled' : '' }} type="text" class="form-control mb-4" id="employeeEffectivity1"  value=""  name="summary[employeeEffectivity1]" placeholder="Type here..." rows="4"><?php echo $performance_summary['employeeEffectivity1'];?></textarea>
                                        </div>
                
                                        <p class="list-label-2 px-4">List the employee's development goals for the coming year:</p>
                
                                        <div class="col-md-12 px-4">
                                            <label class="form-label" style="font-weight: bold;">What makes employee effective?</label>
                                                
                                            <textarea {{ $mode == 'show' ? 'disabled' : '' }} type="text" class="form-control mb-5" id="employeeEffectivity2"  value=""  name="summary[employeeEffectivity2]" placeholder="Type here..." rows="4"><?php echo $performance_summary['employeeEffectivity2'];?></textarea>
                                        </div>
                
                                        <div class="col-md-12 px-4">
                                            <label class="form-label" style="font-weight: bold;">In what way is the employee ready for increased responsibility? What additional training will he/she need to be succesful?</label>
                
                                            <textarea {{ $mode == 'show' ? 'disabled' : '' }} type="text" class="form-control" id="textAreaQuestion1"  value=""  name="summary[textAreaQuestion1]" placeholder="Type here..." rows="4"><?php echo $performance_summary['textAreaQuestion1'];?></textarea>             
                                        </div>              
                                    </div>

                                    <div class="card-footer">
                                        <div class="float-end">
                                            {{-- @if ($mode == 'show' ? '' : 'disabled')
                                                <button type="button" class="btn btn-primary mx-4">Save</button>
                                            @endif --}}
                                            <button type="button" class="btn btn-primary mx-4" id="nextBtn2">Next</button>
                                        </div>
            
                                        <div class="float-start">
                                            <button type="button" class="btn btn-secondary mx-4" id="prevBtn1">Previous</button>
                                            {{-- <button type="button" class="btn btn-secondary mx-4" id="prevBtn" onclick="nextPrev(-1)">Previous</button> --}}
                                        </div>
                                    </div>
                                </div>

                                <div class="card shadow m xy-1" id="form-4">
                                    <div class="card-header">
                                        <div class="card-title pb-0 pt-2 px-4 mx-1">Performance Summary
                                        </div>
                                    </div>

                                    <div class="card-body">                               
                                        <div class="col-md-12 skill-col">
                                            <div class="container-fluid">
                                                <p class="list-label-1 mt-4">List the employee's performance goals for the coming year:</p>
                
                                                <div class="col-md-12 form1" id="list-label-1">
                                                    <label class="form-label mt-1" style="font-weight: bold;">Performance Goal</label>
            
                                                    <input type="hidden" name="goal[employeeID]" value="{{ $performance->id }}">
                
                                                    <textarea {{ $mode == 'show' ? 'disabled' : '' }} type="text" class="form-control" id="performanceGoal1"  name="goal[performanceGoal1]" value="" placeholder="Type here..." rows="4"><?php echo $performance_goal['performanceGoal1'];?></textarea>
                                                </div>
                
                                                <div class="col-md-12 form1" id="list-label-1">
                                                    <label class="form-label mt-4" style="font-weight: bold;">How do these align with departamental goals?</label>
                
                                                    <textarea {{ $mode == 'show' ? 'disabled' : '' }} type="text" class="form-control" id="performanceGoal2" name="goal[performanceGoal2]" value="" placeholder="Type here..." rows="4"><?php echo $performance_goal['performanceGoal2'];?></textarea>                                          
                                                </div>
                
                                                <p class="list-label-2 mt-4">List the employee's development goals for the coming year:</p>
                
                                                <div class="col-md-12 form1" id="list-label-1">
                                                    <label class="form-label mt-1" style="font-weight: bold;">Development Goal</label>
                
                                                    <textarea {{ $mode == 'show' ? 'disabled' : '' }} type="text" class="form-control" id="developmentGoal1" name="goal[developmentGoal1]" value="" placeholder="Type here..." rows="4"><?php echo $performance_goal['developmentGoal1'];?></textarea>
                                                </div>
                
                                                <div class="col-md-12 form1" id="list-label-1">
                                                    <label class="form-label mt-4" style="font-weight: bold;">In the coming year, how will you provide guidance and assitance for the employee to accomplish his/her goals?</label>
                
                                                    <textarea {{ $mode == 'show' ? 'disabled' : '' }} type="text" class="form-control" id="developmentGoal2" name="goal[developmentGoal2]" value="" placeholder="Type here..." rows="4"><?php echo $performance_goal['developmentGoal2'];?></textarea>                                           
                                                </div>
                                            </div>
                                        </div>   
                                    </div>
                                    
                                    <div class="card-footer">
                                        <div class="float-end">
                                            @if ($mode == 'show' ? '' : 'disabled')
                                                <button type="submit" class="btn btn-primary mx-4">Save</button>
                                            @endif  
                                        </div>
            
                                        <div class="float-start">
                                            <button type="button" class="btn btn-secondary mx-4" id="prevBtn2">Previous</button>
                                            {{-- <button type="button" class="btn btn-secondary mx-4" id="prevBtn" onclick="nextPrev(-1)">Previous</button> --}}
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                    </form>
                </div>
            </main>
        </div>
    </div>

@endsection

@section('scripts')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

    {{-- validation --}}
    <script>
        jQuery.validator.setDefaults({
            // debug: true,
            success: "valid"
        });

        console.log("Potek ka naman");

        let section = $('#currentSection').val();

        var form = $('#forms');

        form.validate({
            errorClass: "is-invalid",
            validClass: "is-valid",
            rules: {
                // section A
                "employee[employee_number]" : {
                    required: true
                },
                "employee[firstName]" : {
                    required: true
                },
                "employee[lastName]" : {
                    required: true
                },
                "employee[title]" : {
                    required: true
                },
                "employee[department]" : {
                    required: true
                },
                "employee[supervisor]" : {
                    required: true
                },
                "employee[dateHired]" : {
                    required: true
                },
                // section B
                "rating[inlineRadioOptions]" :{
                    required: true,
                },
                "rating[inlineRadioOptions1]" :{
                    required: true,
                },
                "rating[inlineRadioOptions2]" :{
                    required: true,
                },
                "rating[inlineRadioOptions3]" :{
                    required: true,
                },
                "rating[inlineRadioOptions4]" :{
                    required: true,
                },
                "rating[inlineRadioOptions5]" :{
                    required: true,
                },
                "rating[inlineRadioOptions6]" :{
                    required: true,
                },
                "rating[inlineRadioOptions7]" :{
                    required: true,
                },
                "rating[inlineRadioOptions8]" :{
                    required: true,
                },
                "rating[inlineRadioOptions9]" :{
                    required: true,
                },
                "rating[comment]" : {
                    required: true
                },
                "rating[comment1]" : {
                    required: true
                },
                "rating[comment2]" : {
                    required: true
                },
                "rating[comment3]" : {
                    required: true
                },
                "rating[comment4]" : {
                    required: true
                },
                "rating[comment5]" : {
                    required: true
                },
                "rating[comment6]" : {
                    required: true
                },
                "rating[comment7]" : {
                    required: true
                },
                "rating[comment8]" : {
                    required: true
                },
                "rating[comment9]" : {
                    required: true
                },
                // section C
                "summary[employeeEffectivity1]" : {
                    required: true
                },
                "summary[employeeEffectivity2]" : {
                    required: true
                },
                "summary[textAreaQuestion1]" : {
                    required: true
                },
                // section D
                "goal[performanceGoal1]" : {
                    required: true
                },
                "goal[performanceGoal2]" : {
                    required: true
                },
                "goal[developmentGoal1]" : {
                    required: true
                },
                "goal[developmentGoal2]" : {
                    required: true
                },
            },
            submitHandler: function(form) {
                form.submit();
            }
        });

        $('#nextBtn').click(function() {
            if (form.valid()) {
                $('#form-1').hide();
                $('#form-2').show();
                $('#form-3').hide();
                $('#form-4').hide();
                console.log("nextBtn");
            }
        });

        $('#nextBtn1').click(function() {
            if (form.valid()) {
                $('#form-1').hide();
                $('#form-2').hide();
                $('#form-3').show();
                $('#form-4').hide();
                console.log("nextButtonMagvalidatekana");
            }
        });

        $('#nextBtn2').click(function() {
            if (form.valid()) {
                $('#form-1').hide();
                $('#form-2').hide();
                $('#form-3').hide();
                $('#form-4').show();
                console.log("nextButtonMagvalidatekanaBurat");
            }
        });

        $('#prevBtn').click(function() {
                $('#form-1').show();
                $('#form-2').hide();
                $('#form-3').hide();
                $('#form-4').hide();
                console.log("prevBtn");
        });

        $('#prevBtn1').click(function() {
                $('#form-1').hide();
                $('#form-2').show();
                $('#form-3').hide();
                $('#form-4').hide();
        });

        $('#prevBtn2').click(function() {
                $('#form-1').hide();
                $('#form-2').hide();
                $('#form-3').show();
                $('#form-4').hide();
                console.log("prevBtn2");
        });

    </script>
    {{-- populate --}}
    <script>
        $(function() {
            $('#employee_number').click(function() {
                let emp_no = $(this).val();
                $.ajax({
                    type: "GET",
                    url: "/api/employeeDetails",
                    data: {employee_number: emp_no},
                    success:function(data) {
                        console.log('data' , data)
                    }
                })
                .done(function(data) {
                    $('#firstName').val(data.firstname);
                    $('#lastName').val(data.lastname);                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                
                    $('#title').val(data.job.title);
                    $('#department').val(data.job.department);
                    $('#dateHired').val(data.job.start_date);
                    console.log('data >>>>', data)
                });
            });
        });
    </script>
@endsection

    <style>
        #form-2 {
            display: none;
        }

        #form-3 {
            display: none;
        }

        #form-4 {
            display: none;
        }

        .card-footer {
            height: 70px;
        }
        
        .is-invalid {
            width: 100%;
            margin-top: .25rem;
            font-size: .875em;
            color: red;
        }
    </style>
