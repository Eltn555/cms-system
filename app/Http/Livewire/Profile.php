<?php

namespace App\Http\Livewire;

use App\Models\SaleItem;
use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Sale;
use Carbon\Carbon;

class Profile extends Component
{
    public $profile;
    public $isOrders = false;
    public $items;
    public $complated = [];
    public $process = [];

    public function mount(Request $request) {
        $this->profile = auth()->user();
        if ($this->profile){
            $this->items = SaleItem::where('user_id', auth()->user()->id)->with('sale')->orderBy('created_at', 'desc')->get();
            $this->formatCreatedAt();
            foreach ($this->items as $item){
                if ($item->sale->status == 'Получено'){
                    $this->complated[] = $item;
                } else {
                    $this->process[] = $item;
                }
            }
            if ($request->has('orders')) {
                $this->isOrders = true;
            }
        }
    }

    private function formatCreatedAt()
    {
        $this->items->transform(function ($item) {
            $createdAt = Carbon::parse($item->created_at)->locale('ru_RU');
            $formattedCreatedAt = $createdAt->isoFormat('D MMMM YYYY [г. в] HH:mm');
            $item->onUpdate = $formattedCreatedAt;
            return $item;
        });
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
