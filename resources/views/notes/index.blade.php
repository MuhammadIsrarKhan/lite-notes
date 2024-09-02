<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ request()->routeIs('notes.index') ? 'Notes' : 'Trash' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-alert-success>{{ session('success') }}</x-alert-success>
            @if (request()->routeIs('notes.index'))
                <x-link-button href="{{ route('notes.create') }}">+ New Note</x-link-button>
            @endif
            @forelse ($notes as $note)
                <div class="bg-white p-6 overflow-hidden shadow-sm sm:rounded-lg">
                    <div>
                        <h2 class="font-bold text-2xl text-indigo-600"><a class="hover:underline"
                                href="{{ request()->routeIs('notes.index') ? route('notes.show', $note) : route('trashed.show', $note) }}">{{ $note->title }}</a></h2>
                        <p class="mt-2">{{ Str::limit($note->text, 200, '...') }}</p>
                        @if ($note->updated_at)
                            <span class="block mt-4 text-sm opacity-70">{{ $note->updated_at->diffForHumans() }}</span>
                        @endif
                    </div>
                </div>
            @empty
                <p>You have no notes yet!</p>
            @endforelse
            {{ $notes->links() }}
        </div>
    </div>
</x-app-layout>
