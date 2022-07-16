<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Registration;

use App\Models\Job;
use Illuminate\Support\Facades\Response;
use App\routes\api\employeeDetails;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/employeeDetails', function(Request $request){
    $emp = Registration::where('employee_number', '=', "$request->employee_number")->with('job', 'emergency')->first();
    return response()->json($emp);
});

