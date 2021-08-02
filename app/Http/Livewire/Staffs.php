<?php

namespace App\Http\Livewire;

use App\Exports\StaffsExport;
use App\Models\User;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class Staffs extends Component
{
    public $staffs;

    public function render()
    {
        $this->staffs = User::where('role', 'admin')->orWhere('role', 'doctor')->orWhere('role', 'nurse')->get();

        return view('livewire.staffs.staffs');
    }

    public function exportStaffsAsCsv()
    {
        return Excel::download(new StaffsExport, 'staffs.csv');
    }
}
