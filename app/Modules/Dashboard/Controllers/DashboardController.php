<?php

namespace App\Modules\Dashboard\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = [
            [
                'id' => 1,
                'firstname' => 'Marlon',
                'lastname' => 'de la Cruz',
                'gender' => 'Male'
            ],
            [
                'id' => 2,
                'firstname' => 'Al Jhune',
                'lastname' => 'Alcober',
                'gender' => 'Male'
            ],
            [
                'id' => 3,
                'firstname' => 'Andrea',
                'lastname' => 'Hermogenes',
                'gender' => 'Female'
            ],
            [
                'id' => 4,
                'firstname' => 'John Carlo',
                'lastname' => 'de la Peña',
                'gender' => 'Male'
            ]
        ];

        return view('dashboard::index')
            ->with('title', 'User List')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = [
            'id' => null,
            'firstname' => '',
            'lastname' => '',
            'gender' => ''
        ];

        return view('dashboard::form')
            ->with('title', 'New User')
            ->with('user', $user);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = [
            'id' => 1,
            'firstname' => 'Marlon',
            'lastname' => 'de la Cruz',
            'gender' => 'Male'
        ];

        // $user = $users->find($id);

        return view('dashboard::form')
            ->with('title', 'User Detail')
            ->with('user', $user)
            ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = [
            'id' => 1,
            'firstname' => 'Marlon',
            'lastname' => 'de la Cruz',
            'gender' => 'Male'
        ];

        // $user = $users->find($id);

        return view('dashboard::form')
            ->with('title', 'User Detail')
            ->with('user', $user)
            ;
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
        //
    }
}
