<?php

namespace App\Http\Livewire;
use Illuminate\Support\Str;

use App\Models\User;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class PatientsTable extends LivewireDatatable
{
    public $model = User::class;


    public function builder()
    {
        return User::query()->where('role', 'patient');
    }

    public function columns()
    {
        return [
            Column::callback('id', function ($value) {
                return view('datatables::link', [
                    'href' => "/patients/" . Str::slug($value),
                    'slot' => ucfirst($value)
                ]);
            })
                ->label('ID'),

            Column::name('name')
                ->defaultSort('asc')
                ->searchable(),

            Column::name('email')
            ->searchable(),

            Column::name('role')
            ->label('role'),

            DateColumn::name('created_at')
                ->label('Created On')
                ->searchable()
        ];
    }
}
