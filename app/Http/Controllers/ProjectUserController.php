<?php

namespace App\Http\Controllers;

use App\Models\ProjectUser;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

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
                    $request->session()->regenerate();
                    Session::flash('success', 'Votre demande a été envoyée, attendez maintenant l\'email de confirmation');
                    return Redirect::to('dashboard')->with('success', 'Votre demande a été envoyée, attendez maintenant l\'email de confirmation');
                }else{
                    $request->session()->regenerate();
                    Session::flash('success', 'Votre demande a été envoyée, attendez maintenant la confirmation');
                    return Redirect::to('dashboard')->with('success', 'Votre demande a été envoyée, attendez maintenant la confirmation');
                }
            }
        }else{
            $request->session()->regenerate();
            Session::flash('message', 'Une erreur est survenue, veuillez réessayer plus tard !');
            return Redirect::to('dashboard')->with('message', 'Une erreur est survenue, veuillez réessayer plus tard !');
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
        // dd($request);
        $user = auth()->user();
        // validate
        $rules = array(

            'information' => 'required|min:20|max:1000',
            'amount' => 'required|numeric',
        );
        $validator = Validator::make($request->all(), $rules);

        // process

        if($validator->fails()) {
            return Redirect()->back()
                ->withErrors($validator);
        } else {
            $project = ProjectUser::firstOrCreate(
                [
                    'project_id' =>  $id,
                    'user_id' => $user->id,
                    'information' => $request->input('information'),
                    'amount' => $request->input('amount'),
                ], [
                    'created_at' => Carbon::now(),
                    'project_id' =>  $id, 'user_id' => $user->id,
                    'information' => $request->input('information'),
                    'amount' => $request->input('amount'),
                ],
            );

            if($project->project->user_id != $user->id){
                $project->proposal = today();
                $result = $project->save();
                if($result){
                    if($user->notification == true){
                        $request->session()->regenerate();
                        Session::flash('success', 'Votre proposition d\'un montant de '.$request->amount.'€ a été envoyée, attendez maintenant l\'email de réponse');
                        return Redirect::to('dashboard')->with('success', 'Votre proposition d\'un montant de '.$request->amount.'€ a été envoyée, attendez maintenant l\'email de réponse');
                    }else{
                        $request->session()->regenerate();
                        Session::flash('success', 'Votre proposition d\'un montant de '.$request->amount.'€ a été envoyée, attendez maintenant la réponse');
                        return Redirect::to('dashboard')->with('success', 'Votre proposition d\'un montant de '.$request->amount.'€ a été envoyée, attendez maintenant la réponse');
                    }
                }
            }else{
                $request->session()->regenerate();
                Session::flash('message', 'Une erreur est survenue, veuillez réessayer plus tard !');
                return Redirect::to('dashboard')->with('message', 'Une erreur est survenue, veuillez réessayer plus tard !');
            }
        }
    }
}
