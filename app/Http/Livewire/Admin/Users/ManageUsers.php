<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class ManageUsers extends Component
{

    public $form = [
        'name' => '',
        'email' =>  '',
        'password' => '',
        'password_confirmation' => ''
    ];

    public $showModalEdit = false;

    public $user;

    public $userBeingRemoved;
    
    public function addNewUser(){
        $this->form = [];
        $this->showModalEdit = false;
        $this->dispatchBrowserEvent('show-form');
    }

    public function createUser()
    {
        $validatedData = Validator::make($this->form,[
            'name' => 'required',
            'email'=> 'required|email|unique:users',
            'password' => 'required|confirmed'
        ])->validate();

        $validatedData['password'] = bcrypt($validatedData['password']);
        
        User::create($validatedData);

        $this->dispatchBrowserEvent('hide-form',['message' => 'user added successfully']);

        return redirect()->back();

    }

    public function edit(User $user)
    {
        $this->user = $user;
        $this->form = $user->toArray();
        $this->showModalEdit = true;
        $this->dispatchBrowserEvent('show-form');
    }
    
    public function editUser()
    {
        $validatedData = Validator::make($this->form,[
            'name' => 'required',
            'email'=> 'required|email|unique:users,email,'.$this->user->id,
            'password' => 'sometimes|confirmed'
        ])->validate(); 
        
        if(!empty($validatedData['password']))
        {
            $validatedData['password'] = bcrypt($validatedData['password']);
        }
        
        $this->user->update($validatedData);
        
        $this->dispatchBrowserEvent('hide-form',['message' => 'user updated successfully']);
        
    }
    public function confirmUserRemoval($userId)
    {
        $this->userBeingRemoved = $userId;
        $this->dispatchBrowserEvent('show-delete-form');
    }
    public function deleteUser()
    {
        $userId = $this->userBeingRemoved;
        $user = User::findOrFail($userId);
        if($user)
        {
            $user->delete();
            $this->dispatchBrowserEvent('close-confirmation-modal',['message' => 'user deleted successfully']);
        }
    }
    public function render()
    {
        return view('livewire.admin.users.manage-users',['users' => User::latest()->paginate()]);
    }
}
