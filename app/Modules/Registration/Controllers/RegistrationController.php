<?php

namespace App\Modules\Registration\Controllers;

use App\Models\Registration;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Models\Job;

use App\Models\Emergency;

use App\Models\Role;
use App\Models\Department;
use App\Models\WorkingType;


class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $registration = Registration::get();

        $working_types = WorkingType::get();
        $departments = Department::all();
        // return view('registration::index');
        return view('registration::index', compact(['registration', 'departments', 'working_types']));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // $roles = new Roles();
        
        // $roles = Roles::get();
        $registration = new Registration();
        $job = new Job();
        $emergency = new Emergency();
        $title = 'New Employee';
        $mode = 'edit';
        // return view('registration::registrationForm1', ['registration' => $registration],  ['emergency' => $emergency], ['job' => $job])
        //     ->with('job', $job)
        //     ->with('title', 'New Employee');

        $roles = Role::all();
        $departments = Department::all();
        $working_types = Role::all();

        return view('registration::registrationForm1', compact(['registration', 'job', 'emergency', 'title', 'mode','roles', 'departments', 'working_types']));
        // ->with( 'roles', $roles);
        
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request
     *  @return \Illuminate\Http\UploadedFile  $request
     * @return \Illuminate\Http\Response
     * 
     * 
     */

    public function store(Request $request)
    {

        $data = $request->all();

        // dd($data);

        if ($request->hasFile('image_path')) {
            $filenameExt = $request->file('image_path')->getClientOriginalName();
            $filename = pathinfo($filenameExt, PATHINFO_FILENAME);
            $extension = $request->file('image_path')->getClientOriginalExtension();
            $imageName = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('image_path')->storeAs('public/images', $imageName);
        } else {
            $imageName = 'noimage.jpg';
            $path = '';
        }

        $employee = $data['employee'];
        $employee['image_path'] = $imageName;
        $date = date('Ymd');
        // $employee_number= $date . '-'.  str_pad( "000", STR_PAD_LEFT , 2);
        $employee_number = str_pad($date, 12, "-0000", STR_PAD_RIGHT);
        // dd($employee_number);
        $employee['employee_number'] = $employee_number;
        $job = $data['job'];
        $emergency = $data['emergency'];
        // dd($employee);

        if ($employee['id']) {

            $registration = Registration::find($employee['id']);
            if ($registration) {

                if ($request->hasFile('image_path')) {
                    $filenameExt = $request->file('image_path')->getClientOriginalName();
                    $filename = pathinfo($filenameExt, PATHINFO_FILENAME);
                    $extension = $request->file('image_path')->getClientOriginalExtension();
                    $imageName = $filename . '_' . time() . '.' . $extension;
                    $path = $request->file('image_path')->storeAs('public/images', $imageName);
                } elseif ((isset($imageName) && file_exists(public_path('storage/images/', 'image_path')))) {
                    $imageName = $registration->image_path;
                } else {
                    $imageName = 'noimage.jpg';
                    $path = '';
                }
                if ((isset($employee_number))){
                    $employee_number = $registration->employee_number;
                }
                $employee['image_path'] = $imageName;
                $employee['employee_number'] = $employee_number;
                // dd($employee_number);
                $registration->update($employee);
                $registration->job()->update($job);
                $registration->emergency()->update($emergency);

                return redirect()->route('registration.index')->with('status', 'Profile updated!');
            } else {
                return redirect()->route('registration.index')->with('status', 'Profile ID not found!');
            }
        } else {
            $registration = Registration::create($employee);
            // dd($registration);
            $job['employee_id'] = $registration->id;
            $job = Job::create($job);
            $emergency['employee_id'] = $registration->id;
            $emergency = Emergency::create($emergency);
        }
        // dd($emergency);


        // Registration::create($request->all());
        return redirect()->route('registration.index')
            ->with('status', 'Added Successfully');

        // return Job::with('job')->get();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $registration = Registration::where('id', $id)->first();
        $emergency = Emergency::where('employee_id', $id)->first();
        $job = Job::where('employee_id', $id)->first();
        $title = 'View Details';
        $mode = 'show';
        $roles = Role::all();

        // dd($job);

        $departments = Department::all();
        $working_types = WorkingType::all();

        // return view('registration::employeeInformation', ['registration' => $registration])
        //     ->with('mode', 'show')
        //     ->with('emergency', $emergency)
        //     ->with('title', 'View Details');

        return view('registration::registrationForm1', compact(['registration', 'job', 'emergency', 'title', 'mode','roles', 'departments', 'working_types']));
      

        // dd($return);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $registration = Registration::where('id', $id)->first();
        $emergency = Emergency::where('employee_id', $id)->first();
        $job = Job::where('employee_id', $id)->first();
        $roles = Role::all();


        $departments = Department::all();
        $working_types = WorkingType::all();
        // dd($emergency);

        return view('registration::form', [
            'registration' => $registration,
            'job' => $job,
            'emergency' => $emergency,
            'roles' => $roles,
            'title' => 'Edit Employee',
            'mode' => 'edit',
            'status' => 'Updated Successfully',
            'message-type' => 'success',
            'departments' => $departments,
            'working_types' => $working_types
        ]);

        // dd($return);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $registration = Registration::where('id', $id)->first();
        // dd($registration);
        $registration->delete();

        return redirect()->route('registration.index')->with('sucess', 'Deleted Successfully!');
    }
}
