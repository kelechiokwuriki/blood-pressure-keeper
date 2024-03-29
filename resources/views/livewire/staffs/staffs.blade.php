<div x-data="{ staffModalOpen: @entangle('addStaffModalIsOpen') }">
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

                <button wire:click="addNewStaff()" @click="staffModalOpen = true"
                class="bg-red-700 text-white font-bold py-2 px-4 mb-3 rounded my-3">
                    Add a new staff
                </button>

                @if (Auth::user()->canExportStaffsCsv() && count($staffs) > 0)
                <button wire:click="exportStaffsAsCsv()"
                    class="bg-red-700 text-white font-bold py-2 px-4 mb-3 rounded my-3">
                    Export csv
                </button>
                @endif

                {{-- @if($addStaffModalIsOpen)
                @include('livewire.staffs.createStaff')
                @endif --}}
                <livewire:staffs-table />
            </div>
        </div>
    </div>

    <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400" x-show="staffModalOpen" @click.away="staffModalOpen = false">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>?
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <form>
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div>
                            <div class="mb-4">
                                <label for="exampleFormControlInput2"
                                    class="block text-gray-700 text-sm font-bold mb-2">Staff Name</label>
                                <input type="text"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="exampleFormControlInput2" wire:model="staffName"
                                    placeholder="Enter staff name"/>
                                @error('staffName') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>

                            <div class="mb-4">
                                <label for="exampleFormControlInput2"
                                    class="block text-gray-700 text-sm font-bold mb-2">Role</label>
                                    <input type="radio" id="html" wire:model="role" name="fav_language" value="admin">
                                    <label for="html">admin</label><br>
                                    <input type="radio" id="css" wire:model="role" name="fav_language" value="doctor">
                                    <label for="css">doctor</label><br>
                                    <input type="radio" id="javascript" wire:model="role" name="fav_language" value="nurse">
                                    <label for="javascript">nurse</label>
                                @error('role') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>

                            <div class="mb-4">
                                <label for="exampleFormControlInput2"
                                    class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                                <input type="text"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="exampleFormControlInput2" wire:model="email"
                                    placeholder="Enter staff email"/>
                                @error('email') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                            <button wire:click.prevent="store()" type="button"
                                class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base leading-6 font-bold text-white shadow-sm hover:bg-red-700 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                Store
                            </button>
                        </span>
                        <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                            <button @click="staffModalOpen = false" type="button"
                                class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-bold text-gray-700 shadow-sm hover:text-gray-700 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                Close
                            </button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
