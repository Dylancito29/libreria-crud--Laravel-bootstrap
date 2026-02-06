
<!-- Modal -->
<div class="modal fade" id="modalUpdate{{ $book->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Book</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ route('books.update', $book->id) }}">
            @csrf
            @method('PUT')
            
            <div class="d-flex justify-content-center mb-3">
                <div class="card" style="width: 10rem;">
                  <img class="card-img-top" src="{{ $book->cover }}" alt="Cover">
                </div>
            </div>

            <div class="mb-3">
                <label for="title" class="form-label w-100 text-start">Title</label>
                <input type="text" id="title" class="form-control" value="{{ $book->title }}" name="title" required>
            </div>

            <div class="mb-3">
                <label for="category" class="form-label w-100 text-start">Category</label>
                <input type="text" id="category" class="form-control" value="{{ $book->category }}" name="category" required>
            </div>

            <div class="mb-3">
                <label for="author" class="form-label w-100 text-start">Author</label>
                <input type="text" id="author" class="form-control" value="{{ $book->author }}" name="author" required>
            </div>

            <div class="mb-3">
                <label for="stock" class="form-label w-100 text-start">Stock</label>
                <input type="number" id="stock" class="form-control" value="{{ $book->stock }}" name="stock" required>
            </div>

            <div class="mb-3">
                <label for="cover" class="form-label w-100 text-start">Cover URL</label>
                <input type="text" id="cover" class="form-control" value="{{ $book->cover }}" name="cover" required>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
      </div>
</div>
</div>

