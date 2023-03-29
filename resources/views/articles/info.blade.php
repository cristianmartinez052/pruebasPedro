<x-app-layout>
    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-4xl py-8 px-6 bg-grey-400 mx-auto overflow-hidden shadow-xl sm:rounded-lg text-center">
                <div class="mx-auto content-center">
                    <img class="w-40 object-center" src="{{Storage::url('logo/logo.png')}}">
                </div>
              
                <div class="px-6 py-4">
                    <div class="font-bold text-4xl mb-2">{{ $article->nombre }}</div>
                    <p class="text-gray-700 text-xl">
                        <b>Descripción:&nbsp;</b>{{ $article->descripcion }}
                    </p>
                    <p class="text-gray-700 text-xl "><b>Stock:&nbsp;</b>{{ $article->stock }}</p>
                    <span
                        class="inline-flex items-center gap-1 rounded-full @if ($article->estado == 'Nuevo') bg-green-50 @else bg-orange-50 @endif px-2 py-1 text-lg font-semibold  @if ($article->estado == 'Nuevo') text-green-600 @else text-orange-600 @endif">
                        <span
                            class="h-1.5 w-1.5 rounded-full @if ($article->estado == 'Nuevo') bg-green-600 @else bg-orange-600 @endif"></span>
                        {{ $article->estado }}
                    </span>
                </div>
                <div class="mt-2">
                    <a href="{{ route('articles.index') }}"
                    class="text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"><i class="fa-solid fa-arrow-left"></i>&nbsp;Volver</a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
