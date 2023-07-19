<div class="min-h-screen bg-gray-500">
    <div class="p-8">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <table class="table-auto w-full">
                <thead class="bg-blue-500 text-white shadow-lg">
                    <tr>
                        <th class="py-3 px-4 text-left">Nombre</th>
                        <th class="py-3 px-4 text-left">Descripcion</th>
                        <th class="py-3 px-4 text-left">Precio</th>
                        <th class="py-3 px-4 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td class="px-4 py-3">{{ $product->name }}</td>
                        <td class="px-4 py-3">{{ $product->description }}</td>
                        <td class="px-4 py-3">
                            <span class="bg-gray-200 px-4 py-2 rounded-lg text-gray-600">{{ $product->price }}</span>
                        </td>
                        <td class="px-4 py-3 text-center">
                            <button class="hover:bg-gray-300 p-1 px-2 font-bold rounded-lg focus:outline-none" wire:click="editProduct({{ $product->id }})">Editar</button>
                            <button class="hover:bg-gray-300 p-1 px-2 font-bold rounded-lg focus:outline-none" wire:click="deleteProduct({{ $product->id }})">Eliminar</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
            <div class="container mx-auto p-8">
    
    
                @if($selectedProduct)
                <form wire:submit.prevent="updateProduct">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="name" class="block mb-2 font-medium">Name</label>
                            <input type="text" wire:model="name" class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
                        </div>
                        <div>
                            <label for="price" class="block mb-2 font-medium">Precio:</label>
                            <input type="number" wire:model="price" class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
                        </div>
                        <div class="col-span-2">
                            <label class="block mb-2 font-medium">Descripción:</label>
                            <input type="text" wire:model="description" class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
                        </div>
                        <div class="col-span-2">
                            <button type="submit" class="px-6 py-3 bg-blue-500 text-white font-bold rounded-md">
                                Actualizar
                            </button>
                        </div>
                    </div>
                </form>
                @else
                <form wire:submit.prevent="createProduct">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="name" class="block mb-2 font-medium">Name</label>
                            <input type="text" wire:model="name" class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
                        </div>
                        <div>
                            <label for="price" class="block mb-2 font-medium">Precio:</label>
                            <input type="number" wire:model="price" class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
                        </div>
                        <div class="col-span-2">
                            <label class="block mb-2 font-medium">Descripción:</label>
                            <input type="text" wire:model="description" class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
                        </div>
                        <div class="col-span-2">
                            <button type="submit" class="px-6 py-3 bg-blue-500 text-white font-bold rounded-md">
                                Crear
                            </button>
                        </div>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>