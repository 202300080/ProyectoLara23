<h1>Datos del Sitio</h1>
@foreach ((array) $traductor as $trad)
    <div>
        <label>{{$trad['nombre']}}</label>
        <a href="/sitio/{{$trad['id']}}"><button>Ver Detalles</button></a>
    </div>
@endforeach
