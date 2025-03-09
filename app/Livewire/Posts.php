<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;

class Posts extends Component
{
    use WithPagination;

    public $title, $body, $post_id;
    public $isOpen = false;
    public $numpage = 10;
    
    protected $rules = [
        'title' => 'required',
        'body' => 'required'
    ];

    public $search;

    public function render()
    {
        // Cara pagination dinamis pertama (buat sendiri) = 
        // $posts = Post::latest()->paginate($this->numpage);
        // return view('livewire.posts', compact('posts'));

        // Cara pagination dinamis Pak Ugik (inlcude search) = 
        return view('livewire.posts',
            [
                'posts'=>$this->search === null ?
                Post::latest()->paginate($this->numpage) :
                Post::latest()->where('title','like','%'.$this->search.'%')
                            ->orwhere('body','like','%'.$this->search.'%')
                            ->paginate($this->numpage)
            ]
        );


    }

    public function create()
    {
        $this->resetInputFields();
        $this->isOpen = true;
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $this->post_id = $id;
        $this->title = $post->title;
        $this->body = $post->body;
        $this->isOpen = true;
    }

    public function store()
    {
        $this->validate();

        Post::updateOrCreate(['id' => $this->post_id], [
            'title' => $this->title,
            'body' => $this->body
        ]);

        session()->flash('message', $this->post_id ? 'Post Updated Successfully.' : 'Post Created Successfully.');

        $this->closeModal();
    }

    public function delete($id)
    {
        Post::findOrFail($id)->delete();
        session()->flash('message', 'Post Deleted Successfully.');
    }

    private function resetInputFields()
    {
        $this->title = '';
        $this->body = '';
        $this->post_id = null;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }
}
