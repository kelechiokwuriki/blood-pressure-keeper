<?php

namespace App\Http\Livewire;

use App\Models\Observation;
use App\Models\User;
use Livewire\Component;

class Singlepatient extends Component
{
    public $addPatientObservationModalOpen = false;
    public $patient, $observations;

    public function render()
    {
        return view('livewire.patients.singlepatient');
    }

    public function mount($userId)
    {
        $this->patient = User::find($userId);
        $this->observations = $this->patient->observations;
    }
}
