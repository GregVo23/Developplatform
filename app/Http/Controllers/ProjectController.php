<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use App\Models\Category;
use App\Models\ProjectUser;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    /**
     * Display 3 project on the homepage.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        // 3 examples of project
        $projects = Project::take(3)->get();   //TODO only project with a picture

        // offers/projects
        $nbProjects = Project::where('done','=',NULL)->get()->count();
        $nbOffer = ProjectUser::where('proposal','!=',NULL)->get()->count();
        if(!empty($nbProjects) && !empty($nbOffer)){
            $pourcentage = $nbOffer/$nbProjects*100;
        }else{
            $pourcentage = 85;
        }

        return view('welcome', [
            'projects' => $projects,
            'pourcentage' => $pourcentage,
        ]);
    }

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
            'rendering' => 'projects',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function choose()
    {
        $user = auth()->user();

        return view('project.choose', [
            //'projects' => $projects,
            'user' => $user,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mine()
    {
        $user = auth()->user();
        //$projects = project::where('user_id', '=', $user->id)->paginate(10);


        return view('project.index', [
            //'projects' => $projects,
            'user' => $user,
            'rendering' => 'mine',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function maked()
    {
        $user = auth()->user();
        //$projects = project::where('user_id', '=', $user->id)->paginate(10);


        return view('project.index', [
            //'projects' => $projects,
            'user' => $user,
            'rendering' => 'maked',
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
        $user_id = auth()->user()->id;
        // validate
        $rules = array(

            'name' => 'required|string|min:3',
            'about' => 'required|min:20|max:2000',
            'price' => 'numeric|nullable',
            'phone' => 'numeric|nullable',
            'email' => 'required|string|email',
            'picture' => 'nullable|image|mimes:jpeg,jpg,png',
            'document' => 'nullable|max:20000',
            'deadline' => 'nullable|date|after:tomorrow',
            'category' => 'required|string',
            'subCategory' => 'nullable|string',
            'country' => 'nullable|string',
            'city' => 'nullable|string',
            'street' => 'nullable|string',
            'number' => 'nullable|numeric',
            'postalCode' => 'nullable|numeric',
            'rules' => 'nullable',
            'notifications' => 'nullable',
        );
        $validator = Validator::make($request->all(), $rules);

        // process
        if($request->has('rules')){
            if($validator->fails()) {
                return Redirect()->route('project.create')
                    ->withErrors($validator);
            } else {
                // store
                $project = new Project;
                $project->user_id = $user_id;
                $project->category_id = $request->input('category');
                $project->sub_category_id = $request->input('subCategory');
                $project->name = ucfirst($request->input('name'));
                $project->about = ucfirst($request->input('about'));
                $project->price = $request->input('price');
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
                $project->notifications = $request->input('notifications') ? true : false;
                $project->rules = $request->input('rules') ? true : false;

                $result = $project->save();
                $project = Project::find($project->id);

                if($request->hasFile('picture')){

                    $file = $request->file('picture');
                    // Get filename with the extension
                    $filenameWithExt = $file->getClientOriginalName();
                    // Get just filename
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    // Get just ext
                    $extension = $file->extension();
                    // Filename to store
                    $fileNameToStore = $filename.'_'.$user_id.'.'.$extension;
                    // Upload Image

                    // Save XL Project image
                    $path = 'public/project/cover/'.$user_id.'/'.$project->id;
                    $file->storeAs($path ,$fileNameToStore);

                    $cover = Image::make($file);
                    // resize image to fixed size
                    $cover->resize(null, 300, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    // Save small project image
                    $cover->save(public_path('/project/cover/'.$fileNameToStore));

                    $project->picture = $fileNameToStore;
                }

                if(!empty($request->file('document'))){
                    $documents = [];
                    foreach ($request->file('document') as $file){
                        if(is_object($file) && $file->isValid()){

                            $filenameWithExt = $file->getClientOriginalName();
                            // Get just filename
                            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                            // Get just ext
                            $extension = $file->extension();
                            // Filename to store
                            $fileNameToStore = $filename.'_'.$user_id.'.'.$extension;
                            // Save link
                            $path = $file->storeAs('public/project/doc/'.$user_id.'/'.$project->id,$fileNameToStore);

                            array_push($documents, $fileNameToStore);
                        }
                    }
                    $project->document = json_encode($documents);
                }
                $result = $project->save();

                //If many to many
                //$project->category()->attach($request->input('category'), ['project_id' => $project->id ,'sub_category_id' => $request->input('subCategory')]);

                // redirect
                if($result){
                    $request->session()->regenerate();
                    Session::flash('success', 'Félicitation ! Votre projet a été enregistré');
                    return Redirect::to('dashboard');
                }else{
                    $request->session()->regenerate();
                    Session::flash('message', 'Désolé ! Un problème est survenu');
                    return Redirect::to('dashboard');
                }
            }
        }
        $request->session()->regenerate();
        Session::flash('message', 'Vous devez accepter le réglement');
        return Redirect::to('dashboard');
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
        $project = Project::find($id);
        $owner = User::find($project->user_id);
        $picture_path = 'storage/project/cover/'.$project->user_id.'/'.$project->id.'/';
        $document_path = 'storage/project/doc/'.$project->user_id.'/'.$project->id.'/';

        //$file = File::get(public_path($picture_path.'/'.$project->picture));
        $documents = Json_decode($project->document);
        //$file = Storage::get('file.jpg');

        if($user->id === $owner->id){
            $name = "Vous même";
        }else{
            $name = $owner->name();
        }

        return view("project.show",[
            "user" => $user,
            "project" => $project,
            "name" => $name,
            "documents" => $documents,
            "document_path" => $document_path,
            "picture_path" => $picture_path,
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
    public function destroy(Request $request, $id)
    {
        if(Auth::check()){
            $project = Project::find($id);
            $name = $project->name;
            $message = "Vous avez supprimer le projet : ".$name." !";
            $picture_path = 'storage/project/cover/'.$project->user_id.'/'.$project->id;
            $document_path = 'storage/project/doc/'.$project->user_id.'/'.$project->id;

            if (File::exists(public_path($picture_path.'/'.$project->picture))) {
                //Delete small project image
                File::delete(public_path($picture_path.'/'.$project->picture));
                //Delete XL project image
                File::delete(public_path('project/cover/'.$project->picture));
                //Delete all directories
                File::deleteDirectory(public_path($picture_path));
                File::deleteDirectory(public_path('storage/project/cover/'.$project->user_id));
            }

            if(!empty($project->document)){
                $documents = json_decode($project->document);
                foreach($documents as $document){
                    if (File::exists(public_path($document_path.'/'.$document))) {
                        File::delete(public_path($document_path.'/'.$document));
                        File::deleteDirectory(public_path($document_path));
                        File::deleteDirectory(public_path('storage/project/doc/'.$project->user_id));
                    }
                }
            }

            $project->delete();

            $request->session()->regenerate();
            Session::flash('success', $message);
            return Redirect::to('dashboard')->with('success', $message);
        }else{
            return back();
        }
    }
}
