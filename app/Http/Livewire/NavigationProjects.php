<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class NavigationProjects extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.navigation-projects', [
            'projects' => Project::paginate(10),
        ]);
    }
}
