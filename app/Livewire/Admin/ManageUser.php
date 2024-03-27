<?php

namespace App\Livewire\Admin;

use App\Models\CmsApp;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Title;
use Livewire\Component;

class ManageUser extends Component
{
    #[Title('Manage User')]

    public $user,$cms,$name,$email,$password,$admin,$edit;
    public $access = [];
    protected function rules(){
        return [
            'name' => 'required|min:6',
            'access' => 'required',
            'admin' => 'required',
        ];
    }
    public function confirmDelete($id)
    {
        $section = User::find($id);
        if(!$section){
            $this->dispatch('sweet-alert',icon:'error',title:'Delete Failed');
        }
        $section->delete();
        $this->mount();
        $this->render();
        $this->dispatch('sweet-alert',icon:'success',title:'User Deleted');

    }
    public function mount(){
        $this->user = User::all();
        $this->cms  = CmsApp::all();
    }
    public function save(){
        $this->validate();
        foreach ($this->access as $value) {
            $data[] = (int)$value;
        }
        $access = json_encode(['app_id'=>$data]);

        if($this->edit){
            $this->validate(['email' => 'required|email|unique:users,email,'.$this->edit->id]);

            $this->edit->update([
                'name' => $this->name,
                'email' => $this->email,
                'access'    => $access,
                'is_admin'  => $this->admin
            ]);
            if($this->password){
                $this->edit->update([
                    'password' => Hash::make($this->password),
                ]);
            }
        }else{
            $this->validate(['email' => 'required|email|unique:users,email']);
            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'access'    => $access,
                'is_admin'  => $this->admin
            ]);
        }
        $this->dispatch('sweet-alert',icon:'success',title:'Success Add User');
        $this->dispatch('closeModal');
        $this->reset();
        $this->mount();
        $this->render();
    }
    public function setEdit($id){
        $user =  User::find($id);
        $this->edit = $user;
        $this->name = $user->name;
        $this->email = $user->email;
        $access = json_decode($user->access,true);
        $this->access = $access['app_id'];
        $this->admin = $user->is_admin;
    }
    public function render()
    {
        return view('livewire.admin.manage-user');
    }

    public function clear(){
        $this->fill([
            'name'=>null,
            'email'=>null,
            'access'=>[],
            'admin'=>null,
            'password'=>null
        ]);
    }
}
