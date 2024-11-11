<x-app-layout>
<!--Confirmação-->
@if(session()->has('message'))
    <div class="alert alert-success my-3 mx-4 d-flex justify-content-center align-items-center">
        <ul class="mb-0 ">
            {{ session()->get('message')}}
        </ul>
    </div>
@endif
<div class="container-fluid  vh-100 d-flex justify-content-center align-items-center" style="min-height: 100vh">
    <div class="card bg-light shadow-lg" style="width: 28rem; height: 28rem">
        <div class="card-body text-center">
            <form action="{{ route('produtos.update', ['produto' => $produto->id]) }}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <!--Nome Produto-->
                <div class="mb-4 relative">
                    <input type="text" name="nome" 
                        class="w-full py-3 px-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 @error('nome') border-red-500 @enderror" 
                        value="{{ old('nome', $produto->nome) }}" 
                        placeholder="Nome">
                        @error('nome')
                            <p class="absolute mt-1 text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                </div>
                <!--Quantidade Produto-->
                <div class="mb-4 relative">
                    <input type="number" name="quantidade" 
                        class="w-full py-3 px-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 @error('quantidade') border-red-500 @enderror" 
                        value="{{ old('quantidade', $produto->quantidade) }}" 
                        placeholder="Quantidade">
                        @error('quantidade')
                            <p class="absolute mt-1 text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                </div>
                <!--Valor Produto-->
                <div class="mb-4 relative">
                    <input type="number" name="valor" 
                        class="w-full py-3 px-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 @error('valor') border-red-500 @enderror" 
                        value="{{ old('valor', $produto->valor) }}" 
                        placeholder="Preço">
                        @error('valor')
                            <p class="absolute mt-1 text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                </div>
                <!--Validade Produto-->
                <div class="mb-4">
                    <input type="text" name="validade" 
                        class="w-full py-3 px-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 @error('validade') border-red-500 @enderror" 
                        value="{{ old('validade', $produto->validade) }}" 
                        placeholder="validade">
                        @error('validade')
                            <p class="absolute mt-1 text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                </div>
                <!--Botões-->
                <div class="space-y-2">
                    <button type="submit" class="w-full btn btn-info text-white py-2 px-4 rounded-lg transition duration-300">Atualizar</button>
                    <button class="w-full bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg transition duration-300">
                        <a href="/produtos" class="text-decoration-none text-light">Voltar</a>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</x-app-layout>