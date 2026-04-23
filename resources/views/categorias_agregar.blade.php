<h1>Agregar Categoría</h1>

<form action="/categorias/guardar" method="POST">
    @csrf

    <p>
        <label>Nombre:</label><br>
        <input type="text" name="name">
    </p>
    <p>
        <label>Descripcion:</label><br>
        <textarea name="description"></textarea>
    </p>
    <p>
        <button type="submit">Guardar</button>
        <a href="/categorias"><button type="button">Cancelar</button></a>
    </p>
</form>
