<?php

use App\Http\Resources\UpcomingResource;
use App\Http\Resources\TodayTaskResource;
use App\Models\Upcoming;
use App\Models\Today;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Upcoming Task //
Route::get('/upcoming', function() {
    $upcoming = Upcoming::all();

    return UpcomingResource::collection($upcoming); // this returns selectd columns defined in the UpcomingResource

    //return $upcoming;    // this returns all the columns in the table name upcomings
});

Route::get('/today', function() {
    $today = Today::all();

    return TodayTaskResource::collection($today); // this returns selected columns defined in the TodayTaskResource
});

// Add a new task
Route::post('/upcoming', function(Request $request) {
    return Upcoming::create([
        'title' => $request->title,
        'taskId' => $request->taskId,
        'waiting' => $request->waiting,

    ]);
});

// Delete upcoming task
Route::delete('/upcoming/{taskId}', function($taskId) {
    DB::table('upcomings')->where('taskId', $taskId)->delete();

    return 204;
});

// Today Task
Route::post('/dailytask', function(Request $request) {
    return Today::create([
        'id' => $request->id,
        'title' => $request->title,
        'taskId' => $request->taskId
    ]);
});

// Delete Today Task
Route::delete('/dailytask/{taskId}', function($taskId) {
    DB::table('todays')->where('taskId', $taskId)->delete();
    return 204;
});
