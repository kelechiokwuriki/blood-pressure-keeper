<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Staffs extends Component
{
    public $staffs;

    public function render()
    {
        $this->staffs = User::where('role', 'admin')->orWhere('role', 'doctor')->orWhere('role', 'nurse')->get();

        return view('livewire.staffs.staffs');
    }
}
