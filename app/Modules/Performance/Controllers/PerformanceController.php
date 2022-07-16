<?php

namespace App\Modules\Performance\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Performance;
use App\Models\PerformanceCompetencies;
use App\Models\PerformanceSummary;
use App\Models\PerformanceGoal;
use App\Models\Registration;
use App\Models\Roles;
use Illuminate\Support\Facades\DB;
class PerformanceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $registration = Registration::get();
        $performances = Performance::get();
        $performance_summary = PerformanceSummary::get();
        $performance_goal = PerformanceGoal::get();
        $performance_competencies = PerformanceCompetencies::get();

        $registration = Registration::all();
        $department = Department::all();
        $roles = Roles::all();

        return view('performance::index', ['performance' => $performances , 'performance_summary' => $performance_summary , 
        'performance_goal' => $performance_goal , 'performance_competencies' => $performance_competencies, 'registration' => $registration ,
         'department' => $department , 'roles' => $roles ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $registration = new Registration();
        $performance = new Performance();
        $performance_competencies = new PerformanceCompetencies();
        $performance_summary = new PerformanceSummary();
        $performance_goal = new PerformanceGoal();

        // $employeeDetails = DB::table("registration")->pluck("registration" , "id" ,"employee_number" , "lastname" , "firstname");

        // $data  = Registration::select('employee_number' , 'lastname' , 'firstname')->get();

        $registration = Registration::all();
        $department = Department::all();
        $roles = Roles::all();

        $mode = 'edit';

        return view('performance::forms', compact(['performance' , 'performance_competencies' , 'performance_goal' , 
        'performance_summary' , 'registration' , 'department', 'roles' , 'mode']));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);

        $employee = $data['employee'];
        $rating = $data['rating'];
        $summary = $data['summary'];
        $goal = $data['goal'];
        
        if($employee['id']) {
            //for update
            $performance = Performance::find($employee['id']);
            $performance->update($employee);
            $performance->rating()->update($rating);
            $performance->goal()->update($goal);
            $performance->summary()->update($summary);
        }
        else {
            // create new entry
            $performance = Performance::create($employee);
            $rating['employeeID'] = $performance->id;
            $rating = PerformanceCompetencies::create($rating);
            $goal['employeeID'] = $performance->id;
            $goal = PerformanceGoal::create($goal);
            $summary['employeeID'] = $performance->id;
            $summary = PerformanceSummary::create($summary);
        }

        return redirect()->route('performance.index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {       
        $performance_competencies = PerformanceCompetencies::where('employeeID' , $id)->first();
        $performance_summary = PerformanceSummary::where('employeeID' , $id)->first();
        $performance_goal = PerformanceGoal::where('employeeID' , $id)->first();

        $registration = Registration::all();
        $department = Department::all();
        $roles = Roles::all();
        
        $mode = 'show';
        $title = 'View Details';

        return view('performance::forms', compact(['performance' , 'performance_competencies' , 
        'performance_goal' , 'performance_summary' , 'registration', 'department' , 'roles', 'mode']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $performance = Performance::where('id', $id)->first();
        $performance_competencies = PerformanceCompetencies::where('employeeID' , $id)->first();
        $performance_summary = PerformanceSummary::where('employeeID' , $id)->first();
        $performance_goal = PerformanceGoal::where('employeeID' , $id)->first();

        $registration = Registration::all();
        $department = Department::all();
        $roles = Roles::all();
        
        $mode = 'edit';
        $title = 'Edit Details';

        return view('performance::forms', compact(['performance' , 'performance_competencies' , 
        'performance_goal' , 'performance_summary' , 'registration' ,  'department', 'roles' , 'mode']));
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
        return redirect()->route('performance.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $performance = Performance::whereId($id)->first();
        $performance->delete();

        return redirect()->route('performance.index');
    }


}