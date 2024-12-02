<div>
    <div class="container mt-5">
        <h2 class="text-center">Posts</h2>

        <form wire:submit.prevent="{{ $post_id ? 'update' : 'create' }}" class="mb-4">
            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select id="category_id" wire:model="category_id" class="form-control">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" id="title" wire:model="title" class="form-control">
                @error('title') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label for="text" class="form-label">Text</label>
                <textarea id="text" wire:model="text" class="form-control"></textarea>
                @error('text') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn btn-success">
                {{ $post_id ? 'Update Post' : 'Create Post' }}
            </button>
        </form>

        <table class="table table-striped table-bordered table-hover mt-5">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Category</th>
                    <th scope="col">Title</th>
                    <th scope="col">Text</th>
                    <th scope="col">Delete</th>
                    <th scope="col">Update</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->category->name }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->text }}</td>
                        <td>
                            <button wire:click="delete({{ $post->id }})" class="btn btn-danger btn-sm">Delete</button>
                        </td>
                        <td>
                            <button wire:click="edit({{ $post->id }})" class="btn btn-primary btn-sm">Edit</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
