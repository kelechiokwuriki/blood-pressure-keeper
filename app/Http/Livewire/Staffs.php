<?php

namespace App\Http\Livewire;

use App\Exports\StaffsExport;
use App\Models\User;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class Staffs extends Component
{
    public $staffs, $staffName, $email, $role;
    public $addStaffModalIsOpen = false;

    public function render()
    {
        $this->staffs = User::where('role', 'admin')->orWhere('role', 'doctor')->orWhere('role', 'nurse')->get();

        return view('livewire.staffs.staffs');
    }


    public function exportStaffsAsCsv()
    {
        return Excel::download(new StaffsExport, 'staffs.csv');
    }

    public function addNewStaff()
    {
        $this->resetInputFields();
        $this->openAddStaffModal();
    }

    public function openAddStaffModal()
    {
        $this->addStaffModalIsOpen = true;
    }

    public function closeAddStaffModal()
    {
        $this->addStaffModalIsOpen = false;
    }

    public function store()
    {
        $this->validate([
            'staffName' => 'required',
            'email' => 'required|unique:users',
            'role' => 'required',
        ]);

        $user = User::create([
            'name' => $this->staffName,
            'email' => $this->email,
            'role' => $this->role
        ]);

        session()->flash('message',
            $user ? 'Staff added Successfully.' : 'Failed to add staff.');

        $this->closeAddStaffModal();
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->staffName = '';
        $this->role = '';
        $this->email = '';
    }


}
