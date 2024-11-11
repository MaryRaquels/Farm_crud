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
    <div class="card bg-light shadow-lg" style="width: 28rem; height: 33rem">
        <div class="card-body text-center">
            <form action="{{ route('remedios.store') }}" method="POST">
                @csrf
                <!--Nome Remédios Controlados-->
                <div class="mb-4 relative">
                    <input type="text" name="nome" 
                        class="w-full py-3 px-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 @error('nome') border-red-500 @enderror" 
                        value="{{ old('nome') }}" 
                        placeholder="Nome">
                        @error('nome')
                            <p class="text-red-500 text-sm  absolute mt-1">{{ $message }}</p>
                        @enderror
                </div>
                <!-- Categoria Remédios Controlados-->
                <div class="mb-4 relative">
                    <select name="categoria_especial" 
                    class="w-full py-3 px-4 border text-gray-500 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 @error('categoria_especial') border-red-500 @enderror" 
                    value="{{ old('categoria_especial') }}">
                        <option value="" disabled selected>Categoria</option>
                        <option value="A1">Entorpecentes (A1 e A2)
                        </option>
                        <option value="A3'">Psicotrópicos (A3, B1 e B2)
                        </option>
                        <option value="C1">Sujeitos a controle especial (C1)</option>
                        <option value="C2">Retinóicos (C2)</option>
                        <option value="C3">Imunossupressores (C3)</option>
                        <option value="C5">Anabolizantes de uso controlado (C5)</option>
                    </select>
                    @error('quantidade')
                        <p class="text-red-500 text-sm absolute mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!--Quantidade Remédios Controlados-->
                <div class="mb-4 relative">
                    <input type="text" name="quantidade" 
                        class="w-full py-3 px-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 @error('quantidade') border-red-500 @enderror" 
                        value="{{ old('quantidade') }}" 
                        placeholder="Quantidade">
                        @error('quantidade')
                            <p class="text-red-500 text-sm absolute mt-1">{{ $message }}</p>
                        @enderror
                </div>
                <!--Valor Remédios Controlados-->
                <div class="mb-4 relative">
                    <input type="number" name="valor" 
                        class="w-full py-3 px-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 @error('valor') border-red-500 @enderror" 
                        value="{{ old('valor') }}" 
                        placeholder="Preço">
                        @error('valor')
                            <p class="text-red-500 text-sm absolute mt-1">{{ $message }}</p>
                        @enderror
                </div>
                <!--Validade Remédios Controlados-->
                <div class="mb-4 relative">
                    <input type="text" name="validade" 
                        class="w-full py-3 px-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 @error('validade') border-red-500 @enderror" 
                        value="{{ old('validade') }}" 
                        placeholder="validade">
                        @error('validade')
                            <p class="text-red-500 text-sm absolute mt-1">{{ $message }}</p>
                        @enderror
                </div>
                <!--Botões-->
                <div class="space-y-2">
                    <button type="submit" class="w-full btn btn-info text-white py-2 px-4 rounded-lg transition duration-300">Adicionar</button>
                    <button class="w-full bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg transition duration-300">
                        <a href="/remedios" class="text-decoration-none text-light">Voltar</a>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</x-app-layout>