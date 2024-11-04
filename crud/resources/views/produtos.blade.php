<x-app-layout>
<div class="container mx-auto mt-3 flex justify-center overflow-hidden">
    <table class="min-w-full text-center text-sm font-light text-gray-800 ">
        <thead class="border-b border-gray-300 bg-blue-600 dark:border-gray-700 dark:bg-blue-800">
            <tr>
                <th class="py-3 px-4 font-medium text-black">ID</th>
                <th class="py-3 px-4 font-medium text-black">Nome</th>
                <th class="py-3 px-4 font-medium text-black">Quantidade</th>
                <th class="py-3 px-4 font-medium text-black">Preço</th>
                <th class="py-3 px-4 font-medium text-black">Validade</th>
                <th class="py-3 px-4 font-medium text-black"></th>
                <th class="py-3 px-4 font-medium text-black"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($produtos as $produto)
            <tr class="border-b border-gray-300 dark:border-gray-700 bg-gray-100 dark:bg-gray-900">
                <td class="whitespace-nowrap px-6 py-4">{{ $loop->iteration }}</td>
                <td class="whitespace-nowrap px-6 py-4">{{ $produto->nome }}</td>
                <td class="whitespace-nowrap px-6 py-4">{{ $produto->quantidade }}</td>
                <td class="whitespace-nowrap px-6 py-4">R$ {{ number_format($produto->valor, 2, ',', '.') }}</td>
                <td class="whitespace-nowrap px-6 py-4">{{ \Carbon\Carbon::parse($produto->validade)->format('d/m/Y') }}</td>
                <td class="whitespace-nowrap px-6 py-4">
                    
                <td>
                    <a href="{{ route('produtos.edit', ['produto' => $produto->id]) }}" class="text-green-600 hover:underline">
                        Editar
                      </a>
                </td>
          
                </td>
                <td class="whitespace-nowrap px-6 py-4">
                    <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" onsubmit="return confirm('Você tem certeza que deseja excluir este produto?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-app-layout>