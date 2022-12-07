<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('List Intakes of User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg"> <!-- bg-white shadow-xl -->
                <div class="grid grid-cols-1 gap-4 bg-gray-200 bg-opacity-25 md:grid-cols-2">
                    @forelse ($bookings as $booking)
                        <div
                            class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $booking->time_from }}</h5>
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        {{ $booking->time_to }}</h5>

                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                {{ $booking->room->name }}, {{ $booking->room->floor }}</p>
                            {{-- <x-link href="{{ route('enrolled-intake', $intake->id) }}" class="mt-3">Details</x-link> --}}
                        </div>

                    @empty
                        <div
                            class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                            {{ __('Empty') }}
                        </div>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</div>
