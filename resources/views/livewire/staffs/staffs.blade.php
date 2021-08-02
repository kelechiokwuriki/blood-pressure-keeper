<div>
    <x-slot name="header">
        <h1 class="text-center">Staffs</h1>
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

                @if (Auth::user()->canExportStaffsCsv())
                <button wire:click="exportStaffs()"
                    class="bg-red-700 text-white font-bold py-2 px-4 mb-3 rounded my-3">Create patient</button>
                @endif

                @if($addPatientModalOpen)
                @include('livewire.patients.create')
                @endif
                <livewire:staffs-table />
            </div>
        </div>
    </div>
</div>
