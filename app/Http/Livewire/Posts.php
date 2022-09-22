<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\Post;

class Posts extends Component
{
    use WithFileUploads;
    public $posts, $image, $title, $body, $post_id;

    public $updateMode = false;
#......................................................#

    public function render()
    {
        $this->posts = Post::all();

        return view('livewire.posts');
    }

    private function resetInputFields(){
        $this->title = '';
        $this->image = '';
        $this->body = '';
    }
#......................................................#
    public function store()
    {
        $validatedDate = $this->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',

        ]);
        $validatedDate['image'] = $this->image->store('images', 'public');

  
        Post::create($validatedDate);
  
        session()->flash('message', 'Post Created Successfully.');
  
        $this->resetInputFields();
    }
    #......................................................#

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $this->post_id = $id;
        $this->image = $post->image;
        $this->title = $post->title;
        $this->body = $post->body;
  
        $this->updateMode = true;
    }
    #......................................................#

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    #......................................................#
    public function update()
    {
        $validatedDate = $this->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
  
        $post = Post::find($this->post_id);
        $post->update([
            'image' => $this->image,
            'title' => $this->title,
            'body' => $this->body,
        ]);
  
        $this->updateMode = false;
  
        session()->flash('message', 'Post Updated Successfully.');
        $this->resetInputFields();
    }
    #......................................................#
    public function delete($id)
    {
        Post::find($id)->delete();
        session()->flash('message', 'Post Deleted Successfully.');
    }
    #......................................................#



}
