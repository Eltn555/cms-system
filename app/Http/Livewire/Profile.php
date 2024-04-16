<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\User;

class Profile extends Component
{
    public $profile;

    public function mount() {
        $this->profile = auth()->user();
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string',
            'lastname' => 'string',
            'city' => 'string',
            'state' => 'string',
            'address' => 'string',
            'home' => 'string',
        ]);
        $user = User::findOrFail(auth()->user()->id);
        $user->update($validatedData);

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    public function render()
    {
        if($this->profile){
            return view('livewire.profile-page')->extends('front.layout')->section('content');
        }else{
            return view('livewire.profile-login-register')->extends('front.layout')->section('content');
        }
    }
}
