<?php

namespace App\Exports;

use App\Models\User;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;

class StaffsExport implements FromCollection
{
   /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::where('role', 'admin')->orWhere('role', 'doctor')->get();
    }

    public function headings(): array
    {
        return [
            'Name',
            'Email',
            'Role',
            'Created date',
        ];
    }

    public function map($user): array
    {
        return [
            $user->name,
            $user->email,
            $user->role,
            Carbon::parse($user->created_at)->toDateTimeString(),
        ];
    }
}
