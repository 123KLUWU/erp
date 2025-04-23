blade
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Stock') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form method="POST" action="{{ route('stocks.store') }}">
                        @csrf

                        <!-- Producto ID -->
                        <div class="mb-4">
                            <label for="producto_id" class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Producto ID') }}
                            </label>
                            <input id="producto_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="producto_id" value="{{ old('producto_id') }}" required autofocus />
                            @error('producto_id')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Cantidad -->
                        <div class="mb-4">
                            <label for="cantidad" class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Cantidad') }}
                            </label>
                            <input id="cantidad" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" name="cantidad" value="{{ old('cantidad') }}" required />
                            @error('cantidad')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Ubicacion ID -->
                        <div class="mb-4">
                            <label for="ubicacion_id" class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Ubicación ID') }}
                            </label>
                            <input id="ubicacion_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="ubicacion_id" value="{{ old('ubicacion_id') }}" required />
                            @error('ubicacion_id')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Otros campos (añadir según el modelo Stock) -->
                        {{-- Ejemplo de campo adicional: --}}
                        {{--
                        <div class="mb-4">
                            <label for="otro_campo" class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Otro Campo') }}
                            </label>
                            <input id="otro_campo" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="otro_campo" value="{{ old('otro_campo') }}" />
                            @error('otro_campo')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        --}}

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                {{ __('Guardar') }}
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>