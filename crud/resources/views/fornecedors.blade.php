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
    <form method="GET" action="{{ route('fornecedors.create') }}">
        <x-primary-button type="submit" class="">
            Adicione aqui!
        </x-primary-button-button>
    </form>
</td>
<table class="min-w-full text-center text-sm font-light text-gray-800 border border-gray-300 rounded-md shadow-lg">
    <thead class="border-b border-gray-300 bg-gray-800 dark:border-gray-700">
        <tr>
            <th class="py-3 px-4 font-medium text-white">ID</th>
            <th class="py-3 px-4 font-medium text-white">Empresa</th>
            <th class="py-3 px-4 font-medium text-white">CNPJ</th>
            <th class="py-3 px-4 font-medium text-white">e-mail</th>
            <th class="py-3 px-4 font-medium text-white"></th>
            <th class="py-3 px-4 font-medium text-white"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($fornecedors as $fornecedor)
            <tr class="border-b border-gray-300 dark:border-gray-700 bg-gray-100 dark:bg-gray-300">
                <td class="whitespace-nowrap px-6 py-4 border-r border-gray-300">{{ $loop->iteration }}</td>
                <td class="whitespace-nowrap px-6 py-4 border-r border-gray-300">{{ $fornecedor->nome_fantasia }}</td>
                <td class="whitespace-nowrap px-6 py-4 border-r border-gray-300">{{ preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "$1.$2.$3/$4-$5", $fornecedor->cnpj) }}</td>
                <td class="whitespace-nowrap px-6 py-4 border-r border-gray-300">{{ $fornecedor->email }}</td>
                

                <!-- Botões -->
                <td class="whitespace-nowrap px-6 py-4 border-r border-gray-300">
                    <a href="{{ route('fornecedors.edit', ['fornecedor' => $fornecedor->id]) }}">
                    <button class="text-green-600 hover:underline">Editar</button>
                    </a>
                </td>
                <td class="whitespace-nowrap px-6 py-4">
                    <form action="{{ route('fornecedors.destroy', $fornecedor->id) }}" method="POST" onsubmit="return confirm('Você tem certeza que deseja excluir este produto?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Excluir
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
</x-app-layout>