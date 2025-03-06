<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Manage Posts (Laravel 11 Livewire CRUD with Jetstream & Tailwind CSS - ItSolutionStuff.com)
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

            <!-- Notifikasi -->
            @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3">
                    <p class="text-sm">{{ session('message') }}</p>
                </div>
            @endif

            <!-- Tombol Tambah -->
            <button wire:click="create()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">
                Create New Post
            </button>

            <!-- Form Tambah/Edit -->
            @if($isOpen)
                @include('livewire.create-post')
            @endif

            <!-- Tabel Data -->
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">No.</th>
                        <th class="px-4 py-2">Title</th>
                        <th class="px-4 py-2">Body</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $index => $post)
                        <tr>
                            <td class="border px-4 py-2">{{ ($posts->currentPage() - 1) * $posts->perPage() + $loop->iteration }}</td>
                            <td class="border px-4 py-2">{{ $post->title }}</td>
                            <td class="border px-4 py-2">{{ $post->body }}</td>
                            <td class="border px-4 py-2">
                                <button wire:click="edit({{ $post->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                                <button wire:click="delete({{ $post->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>
