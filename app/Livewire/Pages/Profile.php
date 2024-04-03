<?php

namespace App\Livewire\Pages;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Title;
use Livewire\Component;

class Profile extends Component
{
    #[Title('Profile')]

    public $user,$cms,$name,$email,$password,$password_confirmation;
    public function mount(){
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;
        $this->user = $user;
        $this->password = null;
        $this->password_confirmation = null;
    }

    public function render()
    {
        return view('livewire.pages.profile');
    }
    public function save(){
        $user = $this->user;
        $user->name = $this->name;
        $user->email =$this->email;
        if ($this->password != null) {
            // Check if the password and password_confirmation match
            if ($this->password !== $this->password_confirmation) {
                // If they don't match, display an error message
                $this->dispatch('sweet-alert', icon: 'error', title:'Passwords do not match');
                return false;
            } else {
                // If they match, hash the password and update the user's password
                $user->password = Hash::make($this->password);
            }
        }
            $user->save();  

            $this->dispatch('sweet-alert',icon:'success',title:'User Updated');
            $this->dispatch('reloadNavbar');
            $this->name = $user->name;
            $this->email = $user->email;
            $this->user = $user;
            $this->password = null;
            $this->password_confirmation = null;
    }

}
