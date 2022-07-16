<?php

namespace App\Modules\Directories\Controllers;

use App\Http\Controllers\Controller;
// use App\Modules\Directories\Controllers\RolesController;
use App\Models\Role;


use Illuminate\Http\Request;

class RolesController extends Controller
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
        return view('directories::roles.index', ['role' => $role]);
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
        return view('directories::roles.form', compact('role', 'title', 'mode'));
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


        if ($roles['id']) {
            //for update
            $role = Role::find($roles['id']);
            // dd($role);
            $role->update($roles);
        } else {
            $role = Role::create($roles);
        }


        return redirect()->route('roles.index')
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
        $role = Role::where('id', $id)->first();
        $title = 'Roles';
        $mode = 'show';
        return view('directories::roles.form', compact('role', 'title', 'mode'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::where('id', $id)->first();
        $title = 'Edit Role';
        $mode = 'edit';
        return view('directories::roles.form', compact('role', 'title', 'mode'));
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

        return redirect()->route('roles.index')->with('sucess', 'Deleted Successfully!');
    }
}
