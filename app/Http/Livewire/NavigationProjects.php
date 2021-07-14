<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Livewire\Component;
use App\Models\ProjectUser;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class NavigationProjects extends Component
{
    use WithPagination;

    public string $rendering;

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
                'projects' => Project::paginate(10),
            ]);

        }elseif($this->rendering === "favorite")
        {
            return view('livewire.navigation-projects', [
                'projects' => DB::table('projects')
                ->join('project_user','projects.id','=','project_user.project_id')
                ->where('project_user.favorite','=',1)
                ->where('project_user.user_id', '=', $user->id)
                ->paginate(10),
            ]);

        }elseif($this->rendering === "mine")
        {
            return view('livewire.navigation-projects', [
                'projects' => project::where('user_id', '=', $user->id)->paginate(10),
            ]);
        }elseif($this->rendering === "maked")
        {
            return view('livewire.navigation-projects', [
                'projects' => DB::table('projects')
                ->join('project_user','projects.id','=','project_user.project_id')
                ->where('project_user.favorite','=',0)
                ->where('project_user.user_id', '=', $user->id)
                ->paginate(10),
            ]);
        }

    }
}
