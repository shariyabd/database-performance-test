<?php

use App\Livewire\EmployeesList;
use App\Models\NonOptimizedEmployee;
use Illuminate\Support\Facades\Route;
use App\Livewire\OptimizedEmployeesList;
use App\Livewire\NonOptimizedEmployeeList;

Route::get('/', function () {
    return redirect('/employees');
});

Route::get('/employees', OptimizedEmployeesList::class);
Route::get('/non-optimized-employees', NonOptimizedEmployeeList::class);