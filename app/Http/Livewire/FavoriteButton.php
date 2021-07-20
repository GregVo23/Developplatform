<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ProjectUser;
use Illuminate\Support\Carbon;

class FavoriteButton extends Component
{
    public string $button2 = "mmmm";

    public function addfavorite($id){
        $user = auth()->user();
        $favorite = ProjectUser::firstOrCreate(
            ['project_id' =>  $id, 'user_id' => $user->id],
            ['created_at' => Carbon::now(), 'project_id' =>  $id, 'user_id' => $user->id],
        );

        $favorite->favorite = !$favorite->favorite;
        $favorite->save();

        if($favorite->favorite == false && $favorite->project_id == $id){
            $this->button2 = "Ajouter aux favoris !";
            $favorite->delete();
        }else{
            $this->button2 = "Supprimer des favoris !";
        }
    }

    public function render()
    {
        return view('livewire.favorite-button', [
            'button' => $this->button2,
        ]);
    }

}
