<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Livewire\Component;

use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;


class UploadFile extends Component
{
    use WithFileUploads;

    public $picture;

    public function updatedPhoto()
    {
        $this->validate([
            'picture' => 'image|max:1024',
        ]);
    }

    public function save()
    {
        //dd($this->picture);
        $this->validate([
            'picture.*' => 'image|max:1024', // 1MB Max
        ]);


            $user_id = auth()->user()->id;
            $file = $this->picture;
            // Get filename with the extension
            $filenameWithExt = $file->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $file->extension();
            // Filename to store
            $fileNameToStore = $filename.'_'.$user_id.'.'.$extension;
            // Upload Image

            $path = 'public/project/cover/'.$user_id;
            $file->storeAs($path ,$fileNameToStore);

            $cover = Image::make($file);
            // resize image to fixed size
            $cover->resize(null, 300, function ($constraint) {
                $constraint->aspectRatio();
            });
            $cover->save(public_path('/project/cover/'.$fileNameToStore));

            //$this->picture->store($path);

    }

    public function render()
    {
        return view('livewire.upload-file');
    }
}
