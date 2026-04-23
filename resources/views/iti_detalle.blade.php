@if ($carro)
    @foreach ($carro as $key => $value)
        <p>{{ ucfirst($key) }}: {{ $value }}</p>
    @endforeach
@else
    <p>No encontrado.</p>
@endif
