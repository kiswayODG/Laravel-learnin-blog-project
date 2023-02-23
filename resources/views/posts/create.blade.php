<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Gestion des posts
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <h3 class="text-3xl mx-4 my-4">Création d'un post</h3>
            @if(session('success'))
                <div class="text-xl text-green-400">
                    {{ session('success') }}
                </div>
            @endif
                <form action="{{ route('posts.store') }}" method="POST" class="mx-auto">
                    @csrf
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="py-2">
                            <label for="title" class="block text-sm font-medium text-gray-700">Titre</label>
                            <input type="text" name="title" id="title" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('title') }}">
                            @error('title')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="py-2">
                            <label for="content" class="block text-sm font-medium text-gray-700">Contenu</label>
                            <textarea id="content" name="content" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md">{{ old('content') }}</textarea>
                            @error('content')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="py-2">
                            <input type="submit" class="cursor-pointer inline-flex items-center w-1/4 py-4 border border-gray-400 shadow-sm text-base font-medium rounded-md text-gray-700 bg-white justify-center" value="Créer">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
