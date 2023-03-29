<x-app-layout>
    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-4xl py-8 px-6 bg-grey-400 mx-auto overflow-hidden shadow-xl sm:rounded-lg">
                <h5 class="text-center mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-black">Editar
                    Artículo</h5>
                <x-form action="{{ route('articles.update', $article) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @bind($article)
                    <x-form-input name="nombre" label="Introduce el nombre" />
                    <x-form-textarea name="descripcion" placeholder="Introduce la descripcion" />
                    <x-form-input name="stock" label="Introduce el stock" />
                    <x-form-group name="estado" label="Estado del artículo" inline>
                        <x-form-radio name="estado" value="Nuevo" label="Nuevo" />
                        <x-form-radio name="estado" value="Seminuevo" label="Seminuevo" />
                    </x-form-group>
                    <div class="mt-2">
                        <button type="submit"
                            class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"><i
                                class="fas fa-plus"></i>&nbsp;Guardar</button>
                        <a href="{{ route('articles.index') }}"
                            class="text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"><i
                                class="fa-solid fa-arrow-left"></i>&nbsp;Volver</a>
                    </div>
                </x-form>
            </div>
        </div>
    </div>
</x-app-layout>
