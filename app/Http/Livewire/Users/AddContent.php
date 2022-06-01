<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class AddContent extends Component
{
    use WithFileUploads;
    public $user;

    public $profilePhotoPath;
    public $name;
    public $phoneNumber;
    public $email;
    public $password;
    public $passwordConfirmation;
    public $role = 'USER';
    public $address;
    public $houseNumber;
    public $city;

    protected $rules = [
        'name'                  => 'required|string|max:255',
        'address'               => 'nullable|string',
        'houseNumber'           => 'nullable|string|max:255',
        'phoneNumber'           => 'nullable|string|max:255',
        'city'                  => 'nullable|string|max:255',
        'role'                  => 'required|string|max:255|in:USER,ADMIN',
    ];

    public function mount($user)
    {
        $this->user = null;

        if($user)
        {
            $this->user = $user;

            $this->name          = $this->user->name;
            $this->phoneNumber   = $this->user->phone_num;
            $this->email         = $this->user->email;
            $this->role          = $this->user->role;
            $this->address       = $this->user->address;
            $this->houseNumber   = $this->user->house_num;
            $this->city          = $this->user->city;
        }
    }

    public function save()
    {
        $edit = $this->user ? true : false;

        if($edit) {
            $this->rules['email']                   = 'required|string|max:255|unique:users,email,'.$this->user->id;
            $this->rules['password']                = 'same:passwordConfirmation';
        } else {
            $this->rules['email']                   = 'required|string|email|max:255|unique:users';
            $this->rules['password']                = 'min:6|required_with:passwordConfirmation|same:passwordConfirmation';
            $this->rules['passwordConfirmation']    = 'min:6';
        }

        if($this->profilePhotoPath)
        {
            $this->rules['profilePhotoPath']        = 'image|max:1024';
        }

        $this->validate();

        $data = [
            'name'          => $this->name,
            'phone_num'     => $this->phoneNumber,
            'email'         => $this->email,
            'role'          => $this->role,
            'address'       => $this->address,
            'house_num'     => $this->houseNumber,
            'city'          => $this->city,
        ];

        if($this->profilePhotoPath) {
            $data['profile_photo_path'] = $this->profilePhotoPath->store('assets/user', 'public');
        }
        if($this->password) {
            $data['password']      = Hash::make($this->password);
        }
        if ($edit) {
            $this->handleEventUpload($data);
        } else {
            User::create($data);
        }


        return redirect()->route('users.index');
    }

    private function handleEventUpload($data) {
        if (isset($data['profile_photo_path'])) {
            Storage::disk('public')->delete($this->user->profile_photo_path);
        }

        User::find($this->user->id)
                          ->update($data);
    }

    public function render()
    {
        return view('livewire.users.add-content');
    }
}
