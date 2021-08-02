<?php

namespace App\Http\Livewire;

use App\Models\Observation;
use App\Models\User;
use Livewire\Component;

class Patients extends Component
{
    public $addPatientModalOpen = false;
    public $name, $email, $patients, $bloodPresureReading, $notes;

    public function render()
    {
        $this->patients = User::where('role', 'patient')->get();

        return view('livewire.patients.patients');
    }

    public function addNewPatient()
    {
        $this->resetInputFields();
        $this->openAddPatientModal();
    }

    public function openAddPatientModal()
    {
        $this->addPatientModalOpen = true;
    }

    public function closeAddPatientModal()
    {
        $this->addPatientModalOpen = false;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'role' => 'patient'
        ]);

        if ($this->bloodPresureReading !== '' && $this->notes !== '') {
            Observation::create([
                'user_id' => $user->id,
                'reading' => $this->bloodPresureReading,
                'notes' => $this->notes
            ]);
        }

        session()->flash('message',
            $user ? 'Patient added Successfully.' : 'Failed to add patient.');

        $this->closeAddPatientModal();
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->role = '';
        $this->email = '';
        $this->bloodPresureReading = '';
        $this->notes = '';
    }
}
