<?php

namespace App\Http\Controllers;

use App\Models\JoinWeb;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;


class JoinController extends Controller
{
  
     //this method will store values in  join_us page db
    public function store(request $request)
    {
    // dd($request->all());
    
         $data = new JoinWeb();
         $data->name = $request->input('name');
         $data->lastname = $request->input('lastname');
         $data->email = $request->input('email');
         $data->phone = $request->input('phone');
         $data->password = $request->input('password');
         $data->sellist1 = $request->sellist1;
    $data->sellist2 = $request->sellist2;
          $data->facilities = $request->facilities;
           $data->about = $request->about;
           if ($request->hasFile('photo')) {
    $photo = $request->file('photo');

    // Generate a unique file name
    $photoName = time() . '_' . $photo->getClientOriginalName();

    // Move the file to public/uploads with the generated name
    $photo->move(public_path('uploads'), $photoName);

    // Save the relative path in the database
    $data->photo = 'uploads/' . $photoName;
}
//name of input-field of joinUs blade
if ($request->hasFile('pdf')){
    $pdf = $request->file('pdf');
    $pdfName = time() . '_' . $pdf->getClientOriginalName();

    // Move the PDF to public/pdfs folder
    $pdf->move(public_path('pdfs'), $pdfName);

    // Save the path to the database
    $data->pdf = 'pdfs/' . $pdfName;
}   
       $data->save();
        }
};



