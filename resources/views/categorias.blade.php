<h1>Categorias</h1>

<a href="/categorias/agregar"><button>Agregar</button></a>

<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categorias as $categoria)
            <tr>
                <td>{{ $categoria->id }}</td>
                <td>{{ $categoria->name }}</td>
                <td>{{ $categoria->description }}</td>
                <td>
                    <a href="/categorias/{{ $categoria->id }}/editar"><button>Editar</button></a>
                    <form action="/categorias/{{ $categoria->id }}/eliminar" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Eliminar esta categoría?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
