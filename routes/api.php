<?php

use App\Http\Resources\UpcomingResource;
use App\Http\Resources\TodayTaskResource;
use App\Models\Upcoming;
use App\Models\Today;
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
