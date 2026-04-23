<h1>Editar Producto</h1>

<form action="/productos/{{ $producto->id }}/actualizar" method="POST">
    @csrf
    @method('PUT')

    <p>
        <label>Nombre:</label><br>
        <input type="text" name="name" value="{{ $producto->name }}">
    </p>
    <p>
        <label>Descripcion:</label><br>
        <textarea name="description">{{ $producto->description }}</textarea>
    </p>
    <p>
        <label>Descripcion Larga:</label><br>
        <textarea name="descriptionLong">{{ $producto->descriptionLong }}</textarea>
    </p>
    <p>
        <label>Precio:</label><br>
        <input type="number" step="0.01" name="price" value="{{ $producto->price }}">
    </p>
    <p>
        <label>Categoria ID:</label><br>
        <input type="number" name="category_id" value="{{ $producto->category_id }}">
    </p>
    <p>
        <button type="submit">Guardar</button>
        <a href="/productos"><button type="button">Cancelar</button></a>
    </p>
</form>
