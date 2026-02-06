

<!-- Modal -->
<div class="modal fade" id="modalShowBook{{ $book->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Book details</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <div class="card mb-3" style="max-width: 640px;">
        <div class="row g-0">
            <div class="col-md-5">
            <img src="{{ $book->cover }}" class="img-fluid rounded-start" alt="..." style="object-fit: cover;">
            </div>
            <div class="col-md-7">
                <div class="card-body p-0 ps-3 pe-3 d-flex flex-column h-100">
                    <h5 class="card-title m-2">{{ $book->title }}</h5>
                    <p class="card-text m-1">{{ $book->author }}</p>
                    <p class="card-text m-1"><small class="text-body-secondary"> {{ $book->category }} </small></p>
                    <p class="card-text m-1"><small class="text-body-secondary"> Stock: {{ $book->stock }} und. </small></p>
                    <div class="d-grid gap-2 mt-auto mb-2">
                        <div class="input-group" >
                            <input type="number" class="form-control" value="1" min="1" max="{{ $book->stock }}" aria-label="Quantity" >
                            <button type="button" class="btn btn-info">Add to the cart</button>

                        </div>
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUpdate{{ $book->id }}">Update book</button>

                        <button type="button" class="btn btn-danger">Delete book</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
        
      </div>
      
    </div>
  </div>
</div>

@include('books.updateModal', ['book' => $book])