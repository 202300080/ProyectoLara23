<h1>Editar Categoría</h1>

<form action="/categorias/{{ $categoria->id }}/actualizar" method="POST">
    @csrf
    @method('PUT')

    <p>
        <label>Nombre:</label><br>
        <input type="text" name="name" value="{{ $categoria->name }}">
    </p>
    <p>
        <label>Descripcion:</label><br>
        <textarea name="description">{{ $categoria->description }}</textarea>
    </p>
    <p>
        <button type="submit">Guardar</button>
        <a href="/categorias"><button type="button">Cancelar</button></a>
    </p>
</form>
