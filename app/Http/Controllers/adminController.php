<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function showdashboard(){
        return view('admin\dashboard\adminDashboard');

    }
    public function showmanage_user(){
        return view('admin\dashboard\manageuser');

    }
    public function showmanage_skills(){
        return view('admin\dashboard\manageSkills');

    }

}
