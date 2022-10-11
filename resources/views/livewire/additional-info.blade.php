<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Additional Information') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Personal Information</h3>
                            <p class="mt-1 text-sm text-gray-600">Use a permanent address where you can receive mail.
                            </p>
                        </div>
                    </div>
                    <div class="mt-5 md:col-span-2 md:mt-0">
                        <form wire:submit.prevent="save">
                            <div class="overflow-hidden shadow sm:rounded-md">
                                <div class="bg-white px-4 py-5 sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">

                                        {{-- <div class="col-span-6 sm:col-span-3">
                                            <label for="country"
                                                class="block text-sm font-medium text-gray-700">Country</label>
                                            <select id="country" name="country" autocomplete="country-name"
                                                class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                                <option>United States</option>
                                                <option>Canada</option>
                                                <option>Mexico</option>
                                            </select>
                                        </div> --}}

                                        <!-- Name in Bangla -->
                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="name_in_bangla"
                                                class="block text-sm font-medium text-gray-700">Name in Bangla</label>
                                            <input type="text" name="name_in_bangla" id="name_in_bangla"
                                                wire:model="trainee.name_in_bangla" autocomplete="name_in_bangla"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                            @error('trainee.name_in_bangla')
                                                <p for="name_in_bangla" class="mt-2 text-sm text-red-600">
                                                    {{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- Name of Father -->
                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="name_of_father"
                                                class="block text-sm font-medium text-gray-700">Name in Father</label>
                                            <input type="text" name="name_of_father" id="name_of_father"
                                                wire:model="trainee.name_of_father" autocomplete="name_of_father"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                            @error('trainee.name_of_father')
                                                <p for="name_of_father" class="mt-2 text-sm text-red-600">
                                                    {{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- Name of Father in Bangla -->
                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="name_of_father_in_bangla"
                                                class="block text-sm font-medium text-gray-700">Name of Father in
                                                Bangla</label>
                                            <input type="text" name="name_of_father_in_bangla"
                                                id="name_of_father_in_bangla"
                                                wire:model="trainee.name_of_father_in_bangla"
                                                autocomplete="name_of_father_in_bangla"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                            @error('trainee.name_of_father_in_bangla')
                                                <p for="name_of_father_in_bangla" class="mt-2 text-sm text-red-600">
                                                    {{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- Name of Mother -->
                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="name_of_mother"
                                                class="block text-sm font-medium text-gray-700">Name of Mother</label>
                                            <input type="text" name="name_of_mother" id="name_of_mother"
                                                wire:model="trainee.name_of_mother" autocomplete="name_of_mother"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                            @error('trainee.name_of_mother')
                                                <p for="name_of_mother" class="mt-2 text-sm text-red-600">
                                                    {{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- Name of Mother in Bangla -->
                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="name_of_mother_in_bangla"
                                                class="block text-sm font-medium text-gray-700">Name of Mother in
                                                Bangla</label>
                                            <input type="text" name="name_of_mother_in_bangla"
                                                id="name_of_mother_in_bangla"
                                                wire:model="trainee.name_of_mother_in_bangla"
                                                autocomplete="name_of_mother_in_bangla"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                            @error('trainee.name_of_mother_in_bangla')
                                                <p for="name_of_mother_in_bangla" class="mt-2 text-sm text-red-600">
                                                    {{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- Contact -->
                                        <div class="col-span-6 sm:col-span-4">
                                            <div class="col-span-3 sm:col-span-2">
                                                <label for="contact"
                                                    class="block text-sm font-medium text-gray-700">Contact</label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <span
                                                        class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">+8801</span>
                                                    <input wire:model="trainee.contact" type="tel" name="contact"
                                                        id="contact"
                                                        class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                                        placeholder="234567890" pattern="[0-9]{9}">
                                                    @error('trainee.contact')
                                                        <p for="contact" class="mt-2 text-sm text-red-600">
                                                            {{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <!-- National ID -->
                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="national_id"
                                                class="block text-sm font-medium text-gray-700">National ID</label>
                                            <input id="national_id" type="number" placeholder="01234567891011121314151"
                                                name="national_id" wire:model="trainee.national_id"
                                                autocomplete="national_id"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                            @error('trainee.national_id')
                                                <p for="national_id" class="mt-2 text-sm text-red-600">
                                                    {{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- Date of Birth -->
                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="date_of_birth"
                                                class="block text-sm font-medium text-gray-700">Date of Birth</label>
                                            <input id="date_of_birth" type="date" name="date_of_birth"
                                                id="date_of_birth" wire:model="trainee.date_of_birth"
                                                autocomplete="date_of_birth"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                            @error('trainee.date_of_birth')
                                                <p for="date_of_birth" class="mt-2 text-sm text-red-600">
                                                    {{ $message }}</p>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                                    <button type="submit"
                                        class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
