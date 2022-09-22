<form wire:submit.prevent="store" enctype="multipart/form-data">
    <div class="form-group">
        <label for="exampleFormControlInput0">Image:</label>
        <input type="file" class="form-control" id="exampleFormControlInput0" placeholder="Enter Title" wire:model="image">
        @error('image') <span class="text-danger">{{ $message }}</span>@enderror
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
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
