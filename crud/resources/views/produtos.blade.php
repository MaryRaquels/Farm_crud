<x-app-layout>
<div class="container mx-auto mt-3 flex justify-center items-center">
  <table class="min-w-full bg-gray-800 text-white">
    <thead>
      <tr class="bg-gray-700">
        <th class="py-2 px-4">ID</th>
        <th class="py-2 px-4">Título</th>
        <th class="py-2 px-4">Autor</th>
        <th class="py-2 px-4">N° de Páginas</th>
        <th class="py-2 px-4"></th>
        <th class="py-2 px-4"></th>
      </tr>
    </thead>
    <tbody>

        @foreach($produtos as $produto)
            <tr class="hover:bg-gray-600">
                <td class="py-2 px-4">1</td>
                <td class="py-2 px-4">{{ $produto->nome }}</td>
                <td class="py-2 px-4">Autor Exemplo</td>
                <td class="py-2 px-4">200</td>
                <td class="py-2 px-4"></td>
                <td class="py-2 px-4"></td>
            </tr>
         @endforeach

      <!-- Adicione mais linhas conforme necessário -->
    </tbody>
  </table>
</div>

    
</x-app-layout>