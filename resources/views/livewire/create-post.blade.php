<div class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50">
    <div class="bg-white p-6 rounded shadow-lg w-96">
        <h2 class="text-lg font-semibold mb-4">{{ $post_id ? 'Edit Post' : 'Tambah Post' }}</h2>

        <label class="block mb-2">Title</label>
        <input type="text" wire:model="title" class="w-full border rounded p-2 mb-2">
        @error('title') <span class="text-red-500">{{ $message }}</span> @enderror

        <label class="block mb-2">Body</label>
        <textarea wire:model="body" class="w-full border rounded p-2 mb-2"></textarea>
        @error('body') <span class="text-red-500">{{ $message }}</span> @enderror

        <div class="flex justify-end">
            <button wire:click="closeModal" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Batal</button>
            <button wire:click="store" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
        </div>
    </div>
</div>
