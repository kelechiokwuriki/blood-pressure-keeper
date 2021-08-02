<?php

namespace App\Http\Livewire;

use App\Models\User;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class StaffsTable extends LivewireDatatable
{
    public $model = User::class;

    public function builder()
    {
        return User::query()->where('role', 'admin')->orWhere('role', 'doctor')->orWhere('role', 'nurse');
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
            ->label('ID'),

            Column::name('name')
                ->defaultSort('asc')
                ->searchable(),

            Column::name('email')
            ->searchable(),

            Column::name('role')
            ->searchable()
            ->label('role'),

            DateColumn::name('created_at')
                ->label('Created On')
                ->searchable()
        ];
    }
}
