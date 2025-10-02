<?php

namespace App\Http\Controllers;

use App\Models\UsersStructures;
use Illuminate\Http\Request;

class UsersStructuresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        protected $table = 'users_structures';
        protected $fillable = ['user_id', 'structure_id'];
        public $timestamps = true;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UsersStructures $usersStructures)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UsersStructures $usersStructures)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UsersStructures $usersStructures)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UsersStructures $usersStructures)
    {
        //
    }
}
