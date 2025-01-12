<?php

use App\Http\Controllers\AcademicianController;
use App\Http\Controllers\GrantController;
use App\Http\Controllers\MilestoneController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(); 

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/dashboard/admin', [DashboardController::class, 'admin'])->name('dashboard.admin');
    Route::get('/dashboard/leader', [DashboardController::class, 'leader'])->name('dashboard.leader');
    Route::get('/dashboard/staff', [DashboardController::class, 'staff'])->name('dashboard.staff');

    Route::resource('academicians', AcademicianController::class);

    Route::resource('grants', GrantController::class);
    Route::post('grants/{grantId}/add-member', [GrantController::class, 'addMember'])->name('grants.addMember');
    Route::delete('grants/{grant}/remove-member/{academician}', [GrantController::class, 'removeMember'])->name('grants.removeMember');

    Route::resource('grants.milestones', MilestoneController::class)->shallow();
    Route::get('grants/{grant_id}/milestones', [MilestoneController::class, 'index'])->name('milestones.index');
    Route::get('grants/{grantId}/milestones/create', [MilestoneController::class, 'create'])->name('milestones.create');
    Route::post('grants/{grantId}/milestones', [MilestoneController::class, 'store'])->name('milestones.store');
    Route::get('grants/{grantId}/milestones/{milestoneId}/edit', [MilestoneController::class, 'edit'])->name('milestones.edit');
    Route::put('grants/{grantId}/milestones/{milestoneId}', [MilestoneController::class, 'update'])->name('milestones.update');
});