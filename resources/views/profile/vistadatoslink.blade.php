<h1>Lista de Datos de la API</h1>

@if (empty($enlace))
    <p>No hay datos disponibles o no se pudo conectar a la API.</p>
@else
    @foreach ((array) $enlace as $tj)
        <div style="border: 1px solid #FFFEEE; margin:7px; padding: 7px;">
            <h3>{{ $tj['title'] ?? $tj->title ?? 'Sin título' }}</h3>
            <p>{{ $tj['body'] ?? $tj->body ?? '' }}</p>
        </div>
    @endforeach
@endif