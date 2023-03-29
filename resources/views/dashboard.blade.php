<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Artículos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table id="tabla" class="w-full border-collapse bg-white text-left text-sm text-gray-500 text-center">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">ID</th>
                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Nombre</th>
                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Descripcion</th>
                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Estado</th>
                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Stock</th>
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


                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="my-2 mx-2">
                        {{$articulos->links()}}
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
