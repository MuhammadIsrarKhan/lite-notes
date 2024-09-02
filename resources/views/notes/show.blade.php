<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ !$note->trashed() ? 'Notes' : 'Trash' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
          <x-alert-success>{{ session('success') }}</x-alert-success>
          <span class="px-2 py-1 border border-indigo-400 bg-indigo-100 rounded font-semibold text-sm">{{ $note->notebook->name }}</span>
          @if (!$note->trashed())  
          <div class="flex gap-6">
            <p class="opacity-70"><strong>Created:</strong> {{ $note->created_at->diffForHumans() }}</p>
            <p class="opacity-70"><strong>Last changed:</strong> {{ $note->updated_at->diffForHumans() }}</p>
            <x-link-button href="{{ route('notes.edit',$note) }}" class="ml-auto" >Edit Note</x-link-button>
            <form action="{{ route('notes.destroy',$note) }}" method="post">
              @method('delete')
              @csrf
              <x-primary-button onclick="return confirm('Move to trash?')" class="!bg-red-500 hover:bg-red-600 focus:bg-red-600" >Move to Trash</x-primary-button>
            </form>
          </div>
          @else
          <div class="flex gap-6">
            <p class="opacity-70"><strong>Deleted At:</strong> {{ $note->updated_at->diffForHumans() }}</p>
            <form action="{{ route('trashed.update',$note) }}" method="post" class="ml-auto">
              @method('put')
              @csrf
              <x-primary-button>Restore</x-primary-button>
            </form>
            <form action="{{ route('trashed.destroy',$note) }}" method="post">
              @method('delete')
              @csrf
              <x-primary-button onclick="return confirm('Are you sure. you wish to delete this note forever? This action cannot be undone.')" class="!bg-red-500 hover:bg-red-600 focus:bg-red-600">Delete Forever</x-primary-button>
            </form>
          </div>
          @endif
            <div class="bg-white p-6 overflow-hidden shadow-sm sm:rounded-lg">
              <h2 class="font-bold text-4xl text-indigo-600">
                {{ $note->title }}
                </h2>
              <p class="mt-4 whitespace-pre-wrap">{{ $note->text }}</p>
            </div>

        </div>
    </div>
</x-app-layout>
