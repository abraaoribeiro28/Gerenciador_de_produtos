@extends('admin.layout.index')

@section('title', 'Gerenciador - Novo produto')

@section('content')

{{-- <section class="section-products create">
    <div class="container" style="padding-top: 100px;">
        <form action="{{route('products.create')}}" method="post" >
            @csrf
            <div class="row">
                <div class="col-12 col-md-4" id="imagem-produto">
                    <h6 class="mb-2">IMAGEM</h6>
                    <img src="/images/products/not-image.png" id="imagemProdutoCreate" alt="imagem">
                    <div class="file mt-1">
                        <button type="button" class="btn btn-success select-img" onclick="modalSelectImage()">Selecionar</button>
                        <button type="button" class="btn btn-danger remove-img" onclick="removeImage('1')" style="display: none;">Remover image</button>
                    </div>
                    <input type="text" name="archive" id="archive-create" style="display: none;">
                    <p class="aviso">
                        Se nenhuma imagem for selecionada, a imagem padrão acima vai ser incluida ao produto!
                    </p>
                </div>
                <div class="col-12 col-md-8" id="formulario">
                    <div class="form-group">
                        <label for="product">Produto <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="product" id="product" placeholder="Nome do produto" required>
                    </div>
                    <div class="form-group">
                        <label for="category_id">Categoria <span style="color: red;">*</span></label>
                        <select class="form-control" name="category_id" id="category_id" required>
                        <option value="">-- Selecionar categoria--</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">
                                {{$category->category}}
                            </option>
                        @endforeach
                        </select>
                    </div>
                    <div class="d-flex" style="justify-content: space-between">
                        <div class="form-group w-50 mr-2">
                            <label for="price">Preço <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" name="price" id="price" data-thousands="." data-decimal="," data-prefix="R$ " placeholder="R$ 0,00" required>
                            <script type="text/javascript">$("#price").maskMoney();</script>
                        </div>
                        <div class="form-group w-50 ml-2">
                            <label for="stock">Estoque <span style="color: red;">*</span></label>
                            <input type="number" class="form-control" name="stock" id="stock" placeholder="Quantidade em estoque" required>
                        </div>
                    </div>
                    <div>
                        <label for="description">Descrição</label>
                        <textarea class="form-control" name="description" id="description" aria-label="With textarea" placeholder="Digite aqui..."></textarea>
                    </div>
                    <div class="buttons">
                        <input type="submit" class="btn btn-primary" value="Cadastrar">
                    </div>
                </div>
            </div>
        </form>
    </div>

    @if (count($categories) == 0)
        <div class="modal" style="display: block;" tabindex="-1">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Alerta</h5>
                </div>
                <div class="modal-body">
                    <p>Nenhuma categoria encontrada, para poder cadastrar seus produtos, primeiro você precisa criar uma categoria!</p>
                </div>
                <div class="modal-footer">
                <a href="{{route('products')}}" class="btn btn-secondary" data-dismiss="modal">Voltar</a>
                <a href="{{route('category.create')}}" class="btn btn-primary">Criar categoria</a>
                </div>
            </div>
            </div>
        </div>
    @endif

    @if (Session('msg'))
        <div class="msg bg-success">
            <h6 class="m-0">{{Session('msg')}}</h6>
            <button class="btn" onclick="fecharMsg()">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <script>
            const msg = document.querySelector('.msg');
            setTimeout(() => {
            msg.style.display = 'none'
            }, 3000)
        </script>
    @endif
</section> --}}
<div class="w-full overflow-hidden">
    <div class="bg-white p-5 border-b flex justify-between items-center">
      <h1 class="text-gray-500 text-2xl">Adicionar Produto</h1>
    </div>

    <div class="w-full flex items-center p-5" style="height: calc(100% - 73px);">
        <form action="{{route('products.create')}}" method="post">
            @csrf
            <div class="grid grid-cols-4 bg-white px-5 py-8">
                <div class="col-span-2 px-5 ">
                    <h6 class="mb-2 uppercase font-bold text-gray-700">Imagens do produto</h6>
                    <div class="grid grid-cols-3 gap-1">
                        <img src="/images/products/not-image.png" alt="imagem">
                        <img src="/images/products/not-image.png" alt="imagem">
                        <img src="/images/products/not-image.png" alt="imagem">
                        <img src="/images/products/not-image.png" alt="imagem">
                        <img src="/images/products/not-image.png" alt="imagem">
                        <img src="/images/products/not-image.png" alt="imagem">
                    </div>
                    <div class="file mt-2">
                        <button type="button" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded select-img" onclick="modalSelectImage()">Adicionar Imagem</button>
                        <button type="button" class="btn btn-danger remove-img" onclick="removeImage('1')" style="display: none;">Remover image</button>
                    </div>
                    <input type="text" name="archive" id="archive-create" style="display: none;">
                </div>
                <div class="col-span-2 px-5" id="formulario">
                    <div class="mb-3">
                        <label for="product" class="form-label inline-block mb-2 text-gray-700">Produto <span style="color: red;">*</span></label>
                        <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" name="product" id="product" placeholder="Nome do produto" required>
                    </div>

                    <div class="mb-3">
                        <label for="category_id" class="text-sm font-medium text-gray-700">Categoria <span style="color: red;">*</span></label>
                        <select class="mt-1 block w-full px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" style="padding-top: 0.55rem; padding-bottom: 0.55rem;" name="category_id" id="category_id" required>
                        <option value="">-- Selecionar categoria--</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">
                                {{$category->category}}
                            </option>
                        @endforeach
                        </select>
                    </div>
                    <div class="mb-3 flex justify-between">
                        <div class="w-1/2 pr-2">
                            <label for="price" class="form-label inline-block mb-2 text-gray-700">Preço <span style="color: red;">*</span></label>
                            <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" name="price" id="price" data-thousands="." data-decimal="," data-prefix="R$ " placeholder="R$ 0,00" required>
                        </div>
                        <div class="w-1/2 pl-2">
                            <label for="stock" class="form-label inline-block mb-2 text-gray-700">Estoque <span style="color: red;">*</span></label>
                            <input type="number" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" name="stock" id="stock" placeholder="Quantidade em estoque" required>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="description" class="form-label inline-block mb-2 text-gray-700">Descrição</label>
                        <textarea class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" name="description" id="description" aria-label="With textarea" placeholder="Digite aqui..." rows="4"></textarea>
                    </div>

                    <div class="buttons">
                        <input type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded cursor-pointer" value="Cadastrar">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>







{{-- <div class="modal" id="modalSelectImage" tabindex="-1" style="align-items: center;">
    <div class="modal-dialog w-100" style="max-width: 612px">
      <div class="modal-content" style="max-height: 450px">
        <div class="modal-header">
          <h5 class="modal-title">Selecione uma imagem</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="fecharModalSelectImage('1')">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="overflow-y: auto; max-height: 500px;">
          @forelse ($archives as $archive)
              <img src="/images/products/{{$archive->archive}}" width="100px" class="m-1" style="cursor: pointer;" onclick="selectImage({{$archive->id}}, '{{$archive->archive}}', {{1}})">
          @empty
              <p>nenhum arquivo encontrado</p>
          @endforelse
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="fecharModalSelectImage('1')">Cancelar</button>
          <button type="button" class="btn btn-primary" onclick="confirmImage()">Confirmar</button>
        </div>
      </div>
    </div>
  </div> --}}
@endsection