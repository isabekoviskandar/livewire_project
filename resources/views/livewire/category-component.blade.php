<div>
    <div class="container mt-5">
        <h2 class="text-center">Categories</h2>
        <form wire:submit.prevent="{{ $category_id ? 'update' : 'create' }}" class="mb-4">
            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" id="name" wire:model="name" class="form-control">
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="btn btn-success">
                {{ $category_id ? 'Update Category' : 'Create Category' }}
            </button>
        </form>

        <table class="table table-striped table-bordered table-hover mt-5">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Delete</th>
                    <th scope="col">Update</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <button wire:click="delete({{ $category->id }})" class="btn btn-danger btn-sm">Delete</button>
                        </td>
                        <td>
                            <button wire:click="edit({{ $category->id }})" class="btn btn-primary btn-sm">Edit</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
