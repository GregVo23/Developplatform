<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Project;

class Search extends Component
{
    public String $search = '';
    public $projects = [];
    public Int $selectedIndex = 0;

    public function incrementIndex()
    {
        if($this->selectedIndex === count($this->projects)-1)
        {
            $this->selectedIndex = 0;
            return;
        }

        $this->selectedIndex++;
    }

    public function decrementIndex()
    {
        if($this->selectedIndex === 0)
        {
            $this->selectedIndex = count($this->projects)-1;
            return;
        }

        $this->selectedIndex--;
    }

    public function updatedSearch()
    {
        $query = '%' . $this->search . '%';

        if(strlen($this->search) > 2)
        {
            $this->projects = Project::where('name', 'like', $query)->get();
            //$this->projects = Project::where('name', 'like', $query)->orWhere('tags', 'like', $query)->get();
        }
    }

    public function resetIndex()
    {
        $this->reset('selectedIndex');
    }

    public function showProject()
    {
        if($this->projects)
        {
            return redirect()->route('project.show', [$this->projects[$this->selectedIndex]['id']]);
        }
    }

    public function render()
    {
        return view('livewire.search');
    }

}
