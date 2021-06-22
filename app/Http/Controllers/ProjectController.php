<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        $user = auth()->user();

        return view('project.index', [
            'projects' => $projects,
            'user' => $user,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myProjects()
    {
        $user = auth()->user();
        $projects = project::where('user_id', $user->id);
        dd($projects);

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
        $user = auth()->user();

        return view('project.create', [
            'user' => $user,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        // validate
        $rules = array(
            'name'       => 'required',
            'about'       => 'required',
            'price' => 'required|numeric',
            'email' => 'required|string|email',
        );
        $validator = Validator::make($request->all(), $rules);

        // process
        if ($validator->fails()) {
            return Redirect::to('dashboard')
                ->withErrors($validator);
        } else {
            // store
            $project = new Project;
            $project->user_id = auth()->user()->id;
            $project->name = $request->input('name');
            $project->about = $request->input('about');
            $project->price_max = $request->input('price');
            $project->document = $request->input('document');
            $project->picture = $request->input('picture');
            $project->phone = $request->input('phone');
            $project->deadline = $request->input('deadline');
            $project->email = $request->input('email');
            $project->country = ucfirst($request->input('country'));
            $project->city = ucfirst($request->input('city'));
            $project->zipcode = $request->input('postalCode');
            $project->number = $request->input('number');
            $project->street = $request->input('street');

            $project->save();

            // redirect
            Session::flash('message', 'Félicitation ! Votre projet a été enregistré');
            return Redirect::to('dashboard');
        }
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
