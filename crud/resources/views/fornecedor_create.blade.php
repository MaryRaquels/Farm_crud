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
    <div class="card bg-light shadow-lg" style="width: 28rem; height: 24rem">
        <div class="card-body text-center">
            <form action="{{ route('fornecedors.store') }}" method="POST">
                @csrf
                <!--Nome Produto-->
                <div class="mb-3">
                    <input type="text" name="nome_fantasia" 
                        class="w-full py-3 px-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 @error('nome_fantasia') border-red-500 @enderror" 
                        value="{{ old('nome_fantasia') }}" 
                        placeholder="Nome da Empresa">
                        @error('nome_fantasia')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                </div>
                <!--Quantidade Produto-->
                <div class="mb-3">
                    <input type="text" name="email" 
                        class="w-full py-3 px-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 @error('email') border-red-500 @enderror" 
                        value="{{ old('email') }}" 
                        placeholder="e_mail">
                        @error('email')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                </div>
                
                <!--Validade Produto-->
                <div class="mb-3">
                    <input type="text" name="cnpj" 
                        class="w-full py-3 px-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 @error('cnpj') border-red-500 @enderror" 
                        value="{{ old('cnpj') }}" 
                        placeholder="CNPJ" 
                        id="cnpj">
                        @error('cnpj')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                </div>

                <!--Botões-->
                <div class="space-y-2">
                    <button type="submit" class="w-full btn btn-info text-white py-2 px-4 rounded-lg transition duration-300">Adicionar</button>
                    <a href="/fornecedors" class="w-full bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg text-center d-block transition duration-300 text-decoration-none">Voltar</a>
                </div>
            </form>
        </div>
    </div>
</div>
</x-app-layout>