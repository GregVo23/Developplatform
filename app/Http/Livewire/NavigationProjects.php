<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Project;
use Livewire\Component;
use App\Models\ProjectUser;
use App\Models\SubCategory;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;

class NavigationProjects extends Component
{
    use WithPagination;

    protected $listeners = ['favorite' => 'render'];
    public string $rendering;
    public $perPage = 10;
    public $category_id;
    public $sub_category_id;
    public $query;
    public $button;


    //$this->button = $button;


    public function mount($rendering)
    {
        $this->rendering = $rendering;
    }

/*
    public function updatingSearch()
    {
        $this->resetPage();
    }
*/
    public function favorite($id)
    {
        $user = auth()->user();
        $favorite = ProjectUser::firstOrCreate(
            ['project_id' =>  $id, 'user_id' => $user->id],
            ['created_at' => Carbon::now(), 'project_id' =>  $id, 'user_id' => $user->id],
        );

        $favorite->favorite = !$favorite->favorite;
        $favorite->save();


        if($favorite->favorite == false && $favorite->project_id == $id){

            if($this->rendering != "favorite"){
                $this->button = "Ajouter aux favoris";
            }
            $favorite->delete();
            $this->emit('favorite');

        }else{

            $this->button = "Supprimer des favoris";
            $this->emit('favorite');
        }


        //dd($favorite);
        //dd($this);
        //$this->resetPage();
        //return $this->render();
    }

    public function isFavorite($id)
    {
        if (!auth()->check()) {
            return false;
        }
        return auth()->user()->favorites_projects
        ->whereColumn('user_id', $this->id)
        ->whereColumn('project_id', $id);
    }

    public function render()
    {

        $user = auth()->user();

        if($this->rendering === "projects")
        {
            return view('livewire.navigation-projects', [
                'projects' => Project::where('name', 'like', '%'.$this->query.'%')
                ->when($this->category_id, function ($query, $category_id) {
                    return $query->where('category_id', $category_id);
                })
                ->when($this->sub_category_id, function ($query, $sub_category_id) {
                    return $query->where('sub_category_id', $sub_category_id);
                })
                ->latest()
                ->paginate($this->perPage),
                'categories' => Category::all(),
                'subCategories' => SubCategory::all()->when($this->category_id, function ($query, $category_id) {
                    return $query->where('category_id', $category_id);
                })
            ]);

        }elseif($this->rendering === "favorite")
        {
            return view('livewire.navigation-projects', [
                'projects' => Project::join('project_user','projects.id','=','project_user.project_id')
                ->where('project_user.user_id', '=', $user->id)
                ->where('project_user.favorite','=',1)
                ->where('name', 'like', '%'.$this->query.'%')
                ->when($this->category_id, function ($query, $category_id) {
                    return $query->where('category_id', $category_id);
                })
                ->when($this->sub_category_id, function ($query, $sub_category_id) {
                    return $query->where('sub_category_id', $sub_category_id);
                })
                ->orderBy('project_user.created_at')
                ->paginate($this->perPage),
                'categories' => Category::all(),
                'subCategories' => SubCategory::all()->when($this->category_id, function ($query, $category_id) {
                    return $query->where('category_id', $category_id);
                })
            ]);

        }elseif($this->rendering === "mine")
        {
            return view('livewire.navigation-projects', [
                'projects' => project::where('name', 'like', '%'.$this->query.'%')
                ->when($this->category_id, function ($query, $category_id) {
                    return $query->where('category_id', $category_id);
                })
                ->when($this->sub_category_id, function ($query, $sub_category_id) {
                    return $query->where('sub_category_id', $sub_category_id);
                })
                ->where('user_id', '=', $user->id)
                ->latest()
                ->paginate($this->perPage),
                'categories' => Category::all(),
                'subCategories' => SubCategory::all()->when($this->category_id, function ($query, $category_id) {
                    return $query->where('category_id', $category_id);
                })
            ]);

        }elseif($this->rendering === "maked")
        {
            return view('livewire.navigation-projects', [
                'projects' => project::join('project_user','projects.id','=','project_user.project_id')
                ->when($this->category_id, function ($query, $category_id) {
                    return $query->where('category_id', $category_id);
                })
                ->when($this->sub_category_id, function ($query, $sub_category_id) {
                    return $query->where('sub_category_id', $sub_category_id);
                })
                ->where('project_user.proposal','!=',NULL)
                ->where('project_user.user_id', '=', $user->id)
                ->where('name', 'like', '%'.$this->query.'%')
                ->orderBy('project_user.created_at')
                ->paginate($this->perPage),
                'categories' => Category::all(),
                'subCategories' => SubCategory::all()->when($this->category_id, function ($query, $category_id) {
                    return $query->where('category_id', $category_id);
                })
            ]);
        }

    }
}
