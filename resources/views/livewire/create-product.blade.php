<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      
    <div class="fixed inset-0 transition-opacity">
      <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>
  
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
  
    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
      <form>
      <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="">
              <div class="mb-4">
                  <label class="block text-gray-700 text-sm font-bold mb-2">Product Name:</label>
                  <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter Product Name" wire:model="name">
                  @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
              </div>
              <div class="mb-4">
                  <label class="block text-gray-700 text-sm font-bold mb-2">Brand:</label>
                  <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter Brand" wire:model="brand">
                  @error('brand') <span class="text-red-500">{{ $message }}</span>@enderror
              </div>
              <div class="mb-4">
                  <label class="block text-gray-700 text-sm font-bold mb-2">Image:</label>
                  <input type="file" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" wire:model="image">
                  @error('image') <span class="text-red-500">{{ $message }}</span>@enderror
              </div>
        </div>
      </div>
  
      <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
          <button wire:click.prevent="store()" type="button" class="bg-blue-500 text-white px-4 py-2 rounded">
            Save
          </button>
        </span>
        <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
          <button wire:click="closeModal()" type="button" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">
            Cancel
          </button>
        </span>
        </form>
      </div>
    </div>
  </div>
</div>