<?php

namespace App\Http\Controllers;

use App\Models\ProjectUser;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class ProjectUserController extends Controller
{
    /**
     * Accept a specific project.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function accept(Request $request, $id)
    {
        $user = auth()->user();
        $project = ProjectUser::firstOrCreate(
            ['project_id' =>  $id, 'user_id' => $user->id],
            ['created_at' => Carbon::now(), 'project_id' =>  $id, 'user_id' => $user->id],
        );
        if($project->project->user_id != $user->id){
            $project->proposal = today();
            $result = $project->save();
            if($result){
                if($user->notification == true){
                    Session::flash('success', 'Votre demande a été envoyée, attendez maintenant l\'email de conffirmation');
                    return Redirect::to('dashboard')->with('success', 'Votre demande a été envoyée, attendez maintenant l\'email de conffirmation');
                }else{
                    Session::flash('success', 'Votre demande a été envoyée, attendez maintenant la conffirmation');
                    return Redirect::to('dashboard')->with('success', 'Votre demande a été envoyée, attendez maintenant la conffirmation');
                }
            }
        }else{
            dd($project->project->user_id);
            //erreur
        }
    }

    /**
     * Make an offer for a specific project.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function offer(Request $request, $id)
    {
        dd($request);
    }
}
