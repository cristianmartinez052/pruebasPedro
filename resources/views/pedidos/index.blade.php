<x-app-layout>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
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

                    
                </div>
                <table id="articulos"
                    class="w-full border-collapse bg-white text-left text-sm text-gray-500 text-center">
                    <thead class="bg-gray-50">
                        <tr class="text-center">
                            <th scope="col" class="text-center px-6 py-4 font-medium text-gray-900">ID</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Producto</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Cantidad</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Sede</th> 
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Fecha</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 border-t border-gray-100 text-center">
                        @foreach ($pedidos as $item)
                            <tr class="hover:bg-gray-50">
                                <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                                    <div class="relative h-10 w-10">
                                        {{ $item->id }}
                                    </div>

                                </th>
                                <td>
                                    <p class="font-medium text-gray-700">{{ $item->producto }}</p>
                                </td>
                                <td>
                                    {{ $item->cantidad }}
                                </td>
                                <td class="px-6 py-4">
                                   {{$item->sede}}
                                </td>
                            
                                <td class="px-6 py-4">{{$item->created_at}}</td>

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
                    {{ $pedidos->links() }}
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $('#articulos').DataTable();
            });
        </script>
    </div>
    </div>
    </div>
</x-app-layout>