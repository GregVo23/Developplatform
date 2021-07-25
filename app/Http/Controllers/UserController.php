<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Auth;
use App\Models\Project;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();

        return view('dashboard',[
            'user' => $user,
            'personalUserPage' => true,
        ]);
    }

    /**
     * Upload user avatar.
     *
     * @return \Illuminate\Http\Response
     */
    public function saveAvatar(Request $request)
    {
        $request->validate([
           'file' => 'required|mimes:jpg,jpeg,png,csv,txt,xlx,xls,pdf|max:2048'
        ]);

        $fileUpload = Auth()->user;


        if($request->file()) {
            $file_name = time().'_'.$request->file->getClientOriginalName();
            $file_path = $request->file('file')->storeAs('uploads', $file_name, 'public');

            $fileUpload->name = time().'_'.$request->file->getClientOriginalName();
            $fileUpload->avatar = '/storage/' . $file_path;
            $fileUpload->save();

            return response()->json(['success'=>'File uploaded successfully.']);
        }
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth()->user();
        $myProjects = Project::where('user_id', '=', $user->id)->where('done', '=', NULL)->get();
        $myProjectsDone = Project::where('user_id', '=', $user->id)->where('done', '!=', NULL)->get();

        return view("user.show",[
            "user" => $user,
            "myProjects" => $myProjects,
            "myProjectsDone" => $myProjectsDone,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
