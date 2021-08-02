<div>
    <x-slot name="header">
        <h2 class="text-center">Laravel 8 Livewire CRUD Demo</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                    role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
                @endif
                <button wire:click="create()"
                    class="bg-red-700 text-white font-bold py-2 px-4 mb-4 rounded my-3">Create patient</button>
                @if($addPatientModalOpen)
                @include('livewire.patients.create')
                @endif
                <table class="table-fixed text-center w-full">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 w-20">No.</th>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Role</th>
                            <th class="px-4 py-2">Created on</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($patients as $patient)
                        <tr>
                            <td class="border px-4 py-2">{{ $patient->id }}</td>
                            <td class="border px-4 py-2">{{ $patient->name }}</td>
                            <td class="border px-4 py-2">{{ $patient->email}}</td>
                            <td class="border px-4 py-2">{{ $patient->role}}</td>
                            <td class="border px-4 py-2">{{ $patient->created_at}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
