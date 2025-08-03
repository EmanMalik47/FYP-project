<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\JoinWeb;


class SkillController extends Controller
{

public function search(Request $request)
{
    $users = [];

    if ($request->has('skill')) {
        $skill = $request->input('skill');
        $users = DB::table('join_webs')
            ->where('skills', 'LIKE', "%$skill%")
            ->get();
        
        return view('welcome', [
            'users' => $users,
            'searchPerformed' => true
        ]);
    }

    return view('welcome');
    // $skill = $request->input('sellist1');
    // if (!$skill) {
    //     return redirect()->back();
    // }

    // $users = JoinWeb::where('sellist1', 'like', '%' . $skill . '%')->get();

    // return view('welcome', [
    //     'users' => $users,
    //     'searchPerformed' => true,
    // ]);
}
}
