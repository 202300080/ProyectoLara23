<h1>Productos</h1>

<a href="/productos/agregar"><button>Agregar</button></a>

<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Descripcion Larga</th>
            <th>Precio</th>
            <th>Categoria ID</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($productos as $producto)
            <tr>
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->name }}</td>
                <td>{{ $producto->description }}</td>
                <td>{{ $producto->descriptionLong }}</td>
                <td>{{ $producto->price }}</td>
                <td>{{ $producto->category_id }}</td>
                <td>
                    <a href="/productos/{{ $producto->id }}/editar"><button>Editar</button></a>
                    <form action="/productos/{{ $producto->id }}/eliminar" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Eliminar este producto?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
