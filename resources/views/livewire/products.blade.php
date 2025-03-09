<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Manage Products
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

            @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                    <p class="text-sm">{{ session('message') }}</p>
                </div>
            @endif

            <div class="flex items-center justify-between px-4">
                <button wire:click="create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">
                    Create New Product
                </button>
            </div>

            <div class="flex items-center justify-between p-4">
                <div class="flex items-center space-x-2">
                    <label for="rows-per-page" class="font-medium">Rows per Page: </label>
                    <select wire:model.live="numpage" id="rows-per-page" class="w-20 px-2 py-1 border rounded">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
                <div class="flex items-center space-x-2">
                    <label for="search" class="font-medium">Search:</label>
                    <input wire:model.live="search" id="search" type="text" placeholder="Type to search" class="px-2 py-1 border rounded"/>
                </div>
            </div>

            @if($isOpen)
                @include('livewire.create-product')
            @endif

            <table class="table-fixed w-full border-collapse border border-gray-200">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">No.</th>
                        <th class="px-4 py-2">Image</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Brand</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($products) && $products->count())
                        @foreach($products as $product)
                            <tr>
                                <td class="border px-4 py-2">{{ $product->id }}</td>
                                <td class="border px-4 py-2">
                                    <img src="{{ asset('storage/'.$product->image) }}" class="w-25 h-16 object-cover rounded" alt="{{ $product->name }}">
                                </td>
                                <td class="border px-4 py-2">{{ $product->name }}</td>
                                <td class="border px-4 py-2">{{ $product->brand }}</td>
                                <td class="border px-4 py-2 flex space-x-2">
                                    <button wire:click="edit({{ $product->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                                    <button wire:click="delete({{ $product->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="border px-4 py-2 text-center text-gray-500">No products found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>