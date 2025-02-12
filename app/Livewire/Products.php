<?php
  
namespace App\Livewire;
  
use Livewire\Component;
use App\Models\Product;
use Livewire\WithFileUploads;

  
class Products extends Component
{
    use WithFileUploads;
    public $products, $name, $brand, $image, $product_id;
    public $isOpen = 0;
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $this->products = Product::all();
        return view('livewire.products');
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function openModal()
    {
        $this->isOpen = true;
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function closeModal()
    {
        $this->isOpen = false;
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->name = '';
        $this->brand = '';
        $this->image = '';
        $this->product_id = '';
    }
     
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'image' => 'required|image|max:2048', // Validasi gambar
        ]);
    
        $imagePath = $this->image->store('products', 'public'); // Simpan gambar ke storage
   
        Product::updateOrCreate(['id' => $this->product_id], [
            'name' => $this->name,
            'brand' => $this->brand,
            'image' => $imagePath,
        ]);
  
        session()->flash('message', 
            $this->product_id ? 'Product Updated Successfully.' : 'Product Created Successfully.');
  
        $this->closeModal();
        $this->resetInputFields();
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $products = Product::findOrFail($id);
        $this->product_id = $id;
        $this->name = $products->name;
        $this->brand = $products->brand;
        $this->image = $products->image;
    
        $this->openModal();
    }
     
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        Product::find($id)->delete();
        session()->flash('message', 'Product Deleted Successfully.');
    }
}
