<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Catálogo de Productos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

<h2>Categorías</h2>
<table border="1" cellpadding="8" cellspacing="0" style="border-collapse: collapse; width: 100%;">
    <thead>
        <tr style="background-color: #f2f2f2;">
            <th>ID</th>
            <th>Nombre</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categorias as $categoria)
            <tr>
                <td>{{ $categoria->id }}</td>
                <td>{{ $categoria->name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<h2>Productos</h2>
@foreach($categorias as $categoria)
    <h3>{{ $categoria->name }}</h3>
    @foreach($categoria->products as $producto)
        <div style="border:1px solid #FEE; margin:7px; padding:7px;">
            <h4>{{ $producto->name }}</h4>
            <p>{{ $producto->description }}</p>
            <p>Precio: ${{ $producto->price }}</p>
        </div>
    @endforeach
@endforeach

                </div>
            </div>
        </div>
    </div>
</x-app-layout>