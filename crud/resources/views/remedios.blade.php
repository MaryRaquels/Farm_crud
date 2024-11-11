<x-app-layout>
<!--Table-->
<div class="container mx-auto mt-3">
@if(session()->has('message'))
    <div class="alert alert-danger my-3 mx-4 d-flex justify-content-center align-items-center">
        <ul class="mb-0 ">
            {{ session()->get('message')}}
        </ul>
    </div>
@endif
<td class="flex justify-center mb-4">
    <form method="GET" action="{{ route('remedios.create') }}">
        <x-primary-button type="submit" class="">
            Adicione aqui!
        </x-primary-button-button>
    </form>
</td>
<table class="min-w-full text-center text-sm font-light text-gray-800 border border-gray-300 rounded-md shadow-lg">
    <thead class="border-b border-gray-300 bg-gray-800 dark:border-gray-700">
        <tr>
            <th class="py-3 px-4 font-medium text-white">ID</th>
            <th class="py-3 px-4 font-medium text-white">Nome</th>
            <th class="py-3 px-4 font-medium text-white">Categoria</th>
            <th class="py-3 px-4 font-medium text-white">Quantidade</th>
            <th class="py-3 px-4 font-medium text-white">Preço</th>
            <th class="py-3 px-4 font-medium text-white">Validade</th>
            <th class="py-3 px-4 font-medium text-white"></th>
            <th class="py-3 px-4 font-medium text-white"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($remedios as $remedio)
            <tr class="border-b border-gray-300 dark:border-gray-700 bg-gray-100 dark:bg-gray-300">
                <td class="whitespace-nowrap px-6 py-4 border-r border-gray-300">{{ $loop->iteration }}</td>
                <td class="whitespace-nowrap px-6 py-4 border-r border-gray-300">{{ $remedio->nome }}</td>
                <td class="whitespace-nowrap px-6 py-4 border-r border-gray-300">{{ $remedio->categoria_especial }}</td>
                <td class="whitespace-nowrap px-6 py-4 border-r border-gray-300">{{ $remedio->quantidade }}</td>
                <td class="whitespace-nowrap px-6 py-4 border-r border-gray-300">R$ {{ number_format($remedio->valor, 2, ',', '.') }}</td>
                <td class="whitespace-nowrap px-6 py-4 border-r border-gray-300">{{ \Carbon\Carbon::parse($remedio->validade)->format('d/m/Y') }}</td>

                <!-- Botões -->
                <td class="whitespace-nowrap px-6 py-4 border-r border-gray-300">
                    <a href="{{ route('remedios.edit', ['remedio' => $remedio->id]) }}">
                    <button class="text-green-600 hover:underline">Editar</button>
                    </a>
                </td>
                <td class="whitespace-nowrap px-6 py-4">
                    <form action="{{ route('remedios.destroy', $remedio->id) }}" method="POST" onsubmit="return confirm('Você tem certeza que deseja excluir este produto?');">
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