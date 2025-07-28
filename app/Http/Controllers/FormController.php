<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;



class FormController extends Controller
{   public function store_data(request $request){

    //   dd($request->all());
$data = new Visitor;
$data->fname=$request->input('fname');
$data->email=$request->input('email');
$data->password =bcrypt($request->input('password'));
$data->save();

    }
// 
}