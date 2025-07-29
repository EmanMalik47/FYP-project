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
     public function showexchange_request(){
        return view('admin\dashboard\exchangeRequest');

    }
     public function showcategories(){
        return view('admin\dashboard\adminCategories');

    }
     public function showreports(){
        return view('admin\dashboard\reports');

    }

}
