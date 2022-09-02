<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List Intakes of User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg"> <!-- bg-white shadow-xl -->
                <div class="bg-gray-200 bg-opacity-25 grid gap-4 grid-cols-1 md:grid-cols-2">
                    @forelse ($intakes as $intake)
                        <div
                            class="p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $intake->code }}</h5>

                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                {{ $intake->course->name }}, {{ $intake->batch->serial }}</p>
                            <x-link href="{{ route('enrolled-intake', $intake->id) }}" class="mt-3">Details</x-link>
                        </div>

                    @empty
                        <div
                            class="p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                            {{ __('Empty') }}
                        </div>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</div>
