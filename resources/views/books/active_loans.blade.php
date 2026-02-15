@extends('layaouts.app')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary"><i class="bi bi-clipboard-data me-2"></i>Control de Préstamos</h2>
        <a href="{{ route('books.dashboard') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Volver
        </a>
    </div>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4 py-3">ID</th>
                            <th class="py-3">Usuario</th>
                            <th class="py-3">Libro Prestado</th>
                            <th class="py-3">Fecha Préstamo</th>
                            <th class="py-3">Fecha Devolución</th>
                            <th class="py-3">Estado</th>
                            <th class="pe-4 py-3 text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($loans as $loan)
                            <tr>
                                <td class="ps-4 fw-bold text-muted">#{{ $loan->id }}</td>
                                
                                <!-- Usuario -->
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 32px; height: 32px; font-size: 0.8rem;">
                                            {{ substr($loan->user->name ?? 'U', 0, 1) }}
                                        </div>
                                        <div>
                                            <div class="fw-bold">{{ $loan->user->name ?? 'Usuario Eliminado' }}</div>
                                            <div class="small text-muted">{{ $loan->user->email ?? '' }}</div>
                                        </div>
                                    </div>
                                </td>

                                <!-- Libro -->
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        @if($loan->book)
                                            <img src="{{ $loan->book->cover_url }}" class="rounded shadow-sm" style="width: 30px; height: 45px; object-fit: cover;">
                                            <span class="fw-medium">{{ Str::limit($loan->book->title, 30) }}</span>
                                        @else
                                            <span class="text-danger fst-italic">Libro Eliminado</span>
                                        @endif
                                    </div>
                                </td>

                                <!-- Fechas -->
                                <td>{{ \Carbon\Carbon::parse($loan->loan_date)->format('d M, Y') }}</td>
                                <td>
                                    @php
                                        $returnDate = \Carbon\Carbon::parse($loan->return_date);
                                        $isOverdue = $returnDate->isPast() && $loan->status == 'active';
                                    @endphp
                                    <span class="{{ $isOverdue ? 'text-danger fw-bold' : '' }}">
                                        {{ $returnDate->format('d M, Y') }}
                                        @if($isOverdue)
                                            <i class="bi bi-exclamation-circle-fill ms-1" title="Atrasado"></i>
                                        @endif
                                    </span>
                                </td>

                                <!-- Estado -->
                                <td>
                                    @if($loan->status == 'active')
                                        @if($isOverdue)
                                            <span class="badge bg-danger bg-opacity-10 text-danger border border-danger">Atrasado</span>
                                        @else
                                            <span class="badge bg-success bg-opacity-10 text-success border border-success">Activo</span>
                                        @endif
                                    @elseif($loan->status == 'returned')
                                        <span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary">Devuelto</span>
                                    @else
                                        <span class="badge bg-light text-dark border">{{ $loan->status }}</span>
                                    @endif
                                </td>

                                <!-- Acciones -->
                                <td class="pe-4 text-end">
                                    @if($loan->status == 'active')
                                        <form action="{{ route('loans.return', $loan->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-success" title="Marcar como Devuelto" onclick="return confirm('¿Confirmar que el libro ha sido devuelto?')">
                                                <i class="bi bi-check-lg me-1"></i> Recibir
                                            </button>
                                        </form>
                                    @else
                                        <button class="btn btn-sm btn-outline-secondary" disabled>
                                            <i class="bi bi-archive"></i> Archivado
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-5 text-muted">
                                    <i class="bi bi-inbox fs-1 d-block mb-3 opacity-25"></i>
                                    No hay registros de préstamos activos.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer bg-white border-top-0 py-3">
             {{ $loans->links() }}
        </div>
    </div>
</div>
@endsection
