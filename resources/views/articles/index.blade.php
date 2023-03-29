<x-app-layout>
    <div class="py-12">
        <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-7xl bg-grey-400 mx-auto overflow-hidden shadow-xl sm:rounded-lg">

                <!-- component -->
                <div class="my-4">
                    @if (session('mensaje'))
                        <x-alerta>
                            {{ session('mensaje') }}
                        </x-alerta>
                    @endif
                </div>
                <div class="my-8 ml-3">
                    <a href="{{route('articles.create')}}"
                        class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"><i
                            class="fas fa-plus"></i>&nbsp;Nuevo Artículo</a>
                </div>
                <table class="w-full border-collapse bg-white text-left text-sm text-gray-500 text-center">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">ID</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Nombre</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Descripcion</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Estado</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Stock</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                        @foreach ($articulos as $item)
                            <tr class="hover:bg-gray-50">
                                <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                                    <div class="relative h-10 w-10">
                                        {{ $item->id }}
                                    </div>

                                </th>
                                <td>
                                    <p class="font-medium text-gray-700">{{ $item->nombre }}</p>
                                </td>
                                <td>
                                    {{ $item->descripcion }}
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center gap-1 rounded-full @if ($item->estado == 'Nuevo') bg-green-50 @else bg-orange-50 @endif px-2 py-1 text-xs font-semibold  @if ($item->estado == 'Nuevo') text-green-600 @else text-orange-600 @endif">
                                        <span
                                            class="h-1.5 w-1.5 rounded-full @if ($item->estado == 'Nuevo') bg-green-600 @else bg-orange-600 @endif"></span>
                                        {{ $item->estado }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">{{ $item->stock }}</td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="">
                                        <form method="POST" action="{{ route('articles.destroy', $item) }}">
                                            @csrf
                                            @method('DELETE')
                                            <!----Boton Info----->
                                            <a href="{{ route('articles.show', $item) }}"
                                                class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"><i
                                                    class="fa-solid fa-magnifying-glass"></i></a>
                                            <!----Boton Editar---->
                                            <a href="{{ route('articles.edit', $item) }}"
                                                class="text-gray-900 bg-gradient-to-r from-teal-200 to-lime-200 hover:bg-gradient-to-l hover:from-teal-200 hover:to-lime-200 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-teal-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"><i
                                                    class="fas fa-edit"></i></a>
                                            <!----Botón Borrar---->
                                            <button type="submit"
                                                class="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"><i
                                                    class="fas fa-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $articulos->links() }}
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</x-app-layout>
