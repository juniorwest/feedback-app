<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class AuthUsers extends Component
{

    public $name = '';
    public $email = '';
    public $password = '';
    public $type_compte = '';


    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string',
            'type_compte' => 'required|string'
        ];
    }

    public function register()
    {
        $validatedData = $this->validate();

        User::create($validatedData);

        $this->reset();

        session()->flash('success', 'Utilisateur créé!');
    }

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|string',
            'type_compte' => 'required|string'
        ]);

        $user = User::whereEmail($this->email)->first();

        if(!$user || !Hash::check($this->password, $user->password) || !$user->type_compte)
        {
            session()->flash('error', 'Email, mot de passe ou type de incorrect !');
        }elseif($user && $user->type_compte == 'enseignant'){
            $this->redirectRoute('welcome');
        }elseif($user && $user->type_compte == 'etudiant'){
            $this->redirectRoute('cours');
        }
 
    }

    public function render()
    {
        return view('livewire.auth-users');
    }
}
