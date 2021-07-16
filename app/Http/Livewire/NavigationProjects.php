<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Livewire\Component;
use App\Models\ProjectUser;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;

class NavigationProjects extends Component
{
    use WithPagination;

    public string $rendering;

    public $perPage = 10;
    public $category_id = 1;
    public $subcategory_id;
    public $query;

    public function mount($rendering)
    {
        $this->rendering = $rendering;
    }

    public function favorite($id)
    {

        $user = auth()->user();
        $favorite = ProjectUser::firstOrCreate(
            ['project_id' =>  $id, 'user_id' => $user->id],
            ['created_at' => Carbon::now(), 'project_id' =>  $id, 'user_id' => $user->id],
        );

        $favorite->favorite = !$favorite->favorite;
        $favorite->save();

        if($favorite->favorite == false){
            $favorite->delete();
        }
        return $this->render();
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
                ->where('category_id', '=', $this->category_id)
                ->latest()
                ->paginate($this->perPage),
            ]);

        }elseif($this->rendering === "favorite")
        {
            return view('livewire.navigation-projects', [
                'projects' => Project::join('project_user','projects.id','=','project_user.project_id')
                ->where('project_user.favorite','=',1)
                ->where('project_user.user_id', '=', $user->id)
                ->where('name', 'like', '%'.$this->query.'%')
                ->where('category_id', '=', $this->category_id)
                ->orderBy('project_user.created_at')
                ->paginate($this->perPage),
            ]);

        }elseif($this->rendering === "mine")
        {
            return view('livewire.navigation-projects', [
                'projects' => project::where('name', 'like', '%'.$this->query.'%')
                ->where('category_id', '=', $this->category_id)
                ->where('user_id', '=', $user->id)
                ->latest()
                ->paginate($this->perPage),
            ]);
        }elseif($this->rendering === "maked")
        {
            return view('livewire.navigation-projects', [
                'projects' => project::join('project_user','projects.id','=','project_user.project_id')
                ->where('category_id', '=', $this->category_id)
                ->where('project_user.favorite','=',0)
                ->where('project_user.user_id', '=', $user->id)
                ->where('name', 'like', '%'.$this->query.'%')
                ->orderBy('project_user.created_at')
                ->paginate($this->perPage),
            ]);
        }

    }
}
