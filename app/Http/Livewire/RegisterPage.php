<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class RegisterPage extends Component
{
    public $form = [
        "name" => "",
        "email" => "",
        "password" => "",
        "password_confirmation" => ""
    ];

    public function submit()
    {
        $this->validate([
            "form.email" => "required|email",
            "form.name" => "required|max:255",
            "form.password" => "required|confirmed"
        ]);

        User::create($this->form);
        return redirect(url("login"));
    }

    public function render()
    {
        return view('livewire.register-page');
    }
}
