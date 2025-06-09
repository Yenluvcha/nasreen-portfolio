<x-layout>
    <x-slot:heading>
        Skills
    </x-slot:heading>

    @auth
    <div class="flex mb-4 justify-end">
        <a href="/skill/add"
            class="inline-flex items-center gap-1 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Add Skill
        </a>
    </div>
    @endauth

    <div class="space-y-4">

        @foreach ($skills as $skill)
        <a href="/skill/{{ $skill['id'] }}"
            class="block px-3 py-3 border bg-white hover:bg-gray-100 border-gray-200 rounded-lg shadow-xs dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <b>{{ $skill['title'] }}</b> - {{ $skill['level'] }}
        </a>
        @endforeach

        <div>
            {{ $skills->links() }}
        </div>

    </div>

</x-layout>