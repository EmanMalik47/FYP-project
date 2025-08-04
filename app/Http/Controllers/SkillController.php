<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\JoinWeb;


class SkillController extends Controller
{

 public function search(Request $request)
    {
        $skill = trim(strtolower($request->input('skills')));
         
        $users = DB::table('join_webs')->whereRaw('LOWER(sellist1) LIKE ?',[$skill])->get();

        return view('searchSkill', compact('users', 'skill'));
    }
    public function searchview($id)
{
    $user = DB::table('join_webs')->where('id', $id)->first();

    return view('profile', compact('user'));
}

}

