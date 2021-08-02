<?php

namespace App\Exports;

use App\Models\Observation;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PatientObservationsExport implements FromCollection, WithHeadings, WithMapping
{
   /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Observation::all();
    }

    public function headings(): array
    {
        return [
            'Patient name',
            'Patient email address',
            'Blood pressure reading (mmHg)',
            'Notes',
            'Observation date',
        ];
    }

    public function map($observation): array
    {
        return [
            $observation->user->name,
            $observation->user->email,
            $observation->reading,
            $observation->notes,
            Carbon::parse($observation->created_at)->toDateTimeString(),
        ];
    }
}
