<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
//use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $projects = $user->favorites_projects;

        return view('project.index', [
            'projects' => $projects,
            'user' => $user,
        ]);
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
    public function store(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'favorite' => 'nullable|required|boolean',
        ]);

        $projectId = $id;
        $userId = auth()->user()->id;
        $favorite = DB::table('project_user');
        $project = $favorite->where('project_id', '=', $id)->first();
        if(!empty($project)){
            $status =  ($project->favorite == 0)? true : false;
            $favorite->updateOrInsert(
                ['user_id' => $userId, 'project_id' => $projectId],
                ['favorite' => $status]
            );
            if($status === false){
                Session::flash('message', 'Ce projet est retiré de vos favoris');
            }else{
                Session::flash('message', 'Ce projet est ajouté à vos favoris');
            }
        }else{
            $favorite->updateOrInsert(
                ['user_id' => $userId, 'project_id' => $projectId],
                ['favorite' => true]
            );
            Session::flash('message', 'Ce projet est ajouté à vos favoris');
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
