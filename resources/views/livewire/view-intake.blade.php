<div>
    {{-- Do your work, then step back. --}}
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('View Intake') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 sm:px-20">
                    <div class="mt-8 text-2xl">
                        {{ $intake->code }}
                    </div>

                    <div class="mt-6 text-gray-500">
                        {{ $intake->batch->serial }}, {{ $intake->course->name }}
                    </div>


                        {!! html_entity_decode($intake->course->details) !!}
                    

                    <div class="mt-6 text-gray-500">
                        Already Enrolled Trainee: {{ $usersCountOfThisIntake }}
                    </div>

                    <form wire:submit.prevent="enroll">
                        <x-jet-button type="submit" class="mt-3">Enroll</x-jet-button>
                        @if (session()->has('message'))
                            <div class="mb-4 text-lg font-medium text-green-600">
                                {{ session('message') }}
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
