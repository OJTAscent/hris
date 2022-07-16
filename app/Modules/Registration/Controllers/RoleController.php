<?php

namespace App\Modules\Registration\Controllers;
use App\Http\Controllers\Controller;
// use App\Modules\Registration\Controllers\Registration;
use App\Models\Role;
use App\Models\Registration;





use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $role = Role::get();
        return view('registration::roleIndex', ['role' => $role]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $role = new Role();
        $title = 'Add Roles';
        $mode = 'edit';
        return view('registration::roleForm', compact('role', 'title', 'mode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        $roles = $data['role'];
        // dd($role);


        if($roles['id']) {
            //for update
            $role = Role::find($roles['id']);
            // dd($role);
            $role->update($roles);
           
        }
        else {
            $role = Role::create($roles);

        }

        
        return redirect()->route('role.index')
        ->with('status', 'Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $role= Role::where('id', $id)->first();
        $title = 'Roles';
        $mode = 'show';
        return view('registration::roleForm', compact('role', 'title', 'mode'));

        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role= Role::where('id', $id)->first();
        $title = 'Edit Role';
        $mode = 'edit';
        return view('registration::roleForm', compact('role', 'title', 'mode'));

        
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::where('id', $id)->first();
        // dd($role);
        $role->delete();

        return redirect()->route('role.index')->with('sucess', 'Deleted Successfully!');
    }
}
