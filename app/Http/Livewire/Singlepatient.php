<?php

namespace App\Http\Livewire;

use App\Models\Observation;
use App\Models\User;
use Livewire\Component;

class Singlepatient extends Component
{
    public $addPatientObservationModalOpen = false;
    public $patient, $observations, $bloodPresureReading, $notes;

    public function render()
    {
        $this->observations = Observation::where('user_id', $this->patient->id)->get();

        return view('livewire.patients.singlepatient');
    }

    public function mount($userId)
    {
        $this->patient = User::find($userId);
    }

    public function addObservation()
    {
        $this->resetInputFields();
        $this->openAddPatientObservationModal();
    }

    public function openAddPatientObservationModal()
    {
        $this->addPatientObservationModalOpen = true;
    }

    public function closeAddPatientObservationModal()
    {
        $this->addPatientObservationModalOpen = false;
    }

    public function store()
    {
        $this->validate([
            'bloodPresureReading' => 'required',
            'notes' => 'required',
        ]);

        $observation = Observation::create([
            'user_id' => $this->patient->id,
            'reading' => $this->bloodPresureReading,
            'notes' => $this->notes
        ]);

        session()->flash('message',
            $observation ? 'Observation added Successfully.' : 'Failed to add observation.');

        $this->closeAddPatientObservationModal();
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->bloodPresureReading = '';
        $this->notes = '';
    }
}
