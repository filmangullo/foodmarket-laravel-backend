<?php

namespace App\Http\Livewire\Food;

use App\Models\Food;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class AddContent extends Component
{
    use WithFileUploads;
    public $food;

    public $picturePath;
    public $name;
    public $description;
    public $ingredients;
    public $price = 10000;
    public $rate = 5;
    public $types = 'new';

    protected $rules = [
        'name'                  => 'required|string|max:255',
        'description'           => 'required|string',
        'ingredients'           => 'required',
        'price'                 => 'required|integer',
        'rate'                  => 'required',
        'types'                 => 'nullable',
    ];

    public function mount($food)
    {
        $this->food = null;

        if($food)
        {
            $this->food = $food;

            $this->name             = $this->food->name;
            $this->description      = $this->food->description;
            $this->ingredients      = $this->food->ingredients;
            $this->price            = $this->food->price;
            $this->rate             = $this->food->rate;
            $this->types            = $this->food->types;
        }
    }

    public function save()
    {
        $edit = $this->food ? true : false;

        if($this->picturePath)
        {
            $this->rules['picturePath']        = 'image|max:1024';
        }

        $this->validate();

        $data = [
            'name'          => $this->name,
            'description'   => $this->description,
            'ingredients'   => $this->ingredients,
            'price'         => $this->price,
            'rate'          => $this->rate,
            'types'         => $this->types,
        ];

        if($this->picturePath) {
            $data['picture_path'] = $this->picturePath->store('assets/food', 'public');
        }

        if ($edit) {
            $this->handleEventUpload($data);
        } else {
            Food::create($data);
        }


        return redirect()->route('food.index');
    }

    private function handleEventUpload($data) {
        if (isset($data['picture_path'])) {
            Storage::disk('public')->delete($this->food->picture_path);
        }

        Food::find($this->food->id)
                          ->update($data);
    }

    public function render()
    {
        return view('livewire.food.add-content');
    }
}
