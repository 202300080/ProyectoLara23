<h1>Lista de Datos de la API MIA</h1>

@foreach ($traductorjson as $tj)
    <div style="border:1px solid #FEE; margin:7px; padding:7px;">
        <h3>{{ $tj['nombre'] ?? 'Sin nombre' }}</h3>
        <p><strong>Detalles:</strong></p>
        @foreach ($tj as $key => $value)
            <p><strong>{{ ucfirst($key) }}:</strong> {{ $value }}</p>
        @endforeach
    </div>

@endforeach
////////////////////////////////////////////