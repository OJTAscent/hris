<?php

namespace App\Modules\Survey\Controllers;

use Illuminate\Http\Request;

use App\Models\Survey;

use App\Http\Controllers\Controller;

use App\Models\Registration;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surveys = Survey::get();


        return view('survey::index', ['survey' => $surveys]);
        // $surveys = Survey::get();
        // return view('survey::index', ['survey' => $surveys]);
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $survey = new Survey();

        return view('survey::form')
        ->with('mode', 'edit')
        ->with('survey',$survey);
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
        $customer = $data['survey'];
        // dd($survey);
       
        if($customer['id']) {

            $survey = Survey::find($customer['id']);
            $survey->update($customer);
        }
    
         else{
             $survey = Survey::create($customer);
         }
         return redirect()->route('survey.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $survey = Survey::where('id', $id)->first();

        return view('survey::form',['survey' => $survey])
            ->with('mode', 'show')
            ->with('title', 'View Details');
            
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $survey = Survey::where('id', $id)->first();
        // return view('survey::form',['surveys' => $survey])
        // ->with('title', 'Edit Form');

        // $survey = Survey::find($id);
        $survey = Survey::where('id', $id)->first();

        $return = view('survey::form', ['survey' => $survey])
            ->with('title', 'Edit Form')
            ->with('mode', 'edit');
           
        return $return;

       
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
        $survey = Survey::whereId($id)->firstorfail();
        $survey->delete();
        return redirect()->route('survey.index');
    }
}

