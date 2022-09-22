<form wire:submit.prevent="update" enctype="multipart/form-data">
    <input type="hidden" wire:model="post_id">
    <div class="form-group">
        <label for="exampleFormControlInput0">Image:</label>
        <input type="file" class="form-control" id="exampleFormControlInput0" placeholder="Enter Image" wire:model="image">
        @error('image') <span class="text-danger">{{ $message }}</span>@enderror
        <span><img style="width: 150px" src="{{ asset('storage')}}/{{ $image }}" alt=""></span>
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Title:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Title" wire:model="title">
        @error('title') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Body:</label>
        <textarea type="email" class="form-control" id="exampleFormControlInput2" wire:model="body" placeholder="Enter Body"></textarea>
        @error('body') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <button type="submit" class="btn btn-dark">Update</button>
    <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
</form>
