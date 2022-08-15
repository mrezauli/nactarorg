<div>
    {{-- Do your work, then step back. --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Intake') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="mt-8 text-2xl">
                        {{ $intake->code }}
                    </div>

                    <div class="mt-6 text-gray-500">
                        {{ $intake->batch_id }}, {{ $intake->course_id }}
                    </div>
                    
                    <form wire:submit.prevent="enroll">
                        <x-jet-button type="submit" class="mt-3">Enroll</x-jet-button>
                        @if (session()->has('message'))
                            <div class="mb-4 font-medium text-lg text-green-600">
                                {{ session('message') }}
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
