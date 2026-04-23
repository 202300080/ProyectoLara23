<h1>Agregar Producto</h1>

<form action="/productos/guardar" method="POST">
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
        <label>Descripcion Larga:</label><br>
        <textarea name="descriptionLong"></textarea>
    </p>
    <p>
        <label>Precio:</label><br>
        <input type="number" step="0.01" name="price">
    </p>
    <p>
        <label>Categoria ID:</label><br>
        <input type="number" name="category_id">
    </p>
    <p>
        <button type="submit">Guardar</button>
        <a href="/productos"><button type="button">Cancelar</button></a>
    </p>
</form>
