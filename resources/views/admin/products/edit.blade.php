@extends('admin.layout.index')

@section('title', 'Gerenciador - Editar produto')

@section('content')
 {{-- <section class="section-products edit">
    <div class="container" style="padding-top: 100px;">
        <form action="{{route('product.edit', $product->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12 col-md-4" id="imagem-produto">
                    <h6 class="mb-2">IMAGEM</h6>
                    @if($archive == "not-image.png")
                        <img src="/images/products/not-image.png" id="imagemProdutoEdit" alt="imagem default">
                        <div class="file mt-1">
                            <button type="button" class="btn btn-success select-img" onclick="modalSelectImage()">Selecionar</button>
                            <button type="button" class="btn btn-danger remove-img" onclick="removeImage('2')" style="display: none;">Remover image</button>
                        </div>
                        <input type="text" name="archive" id="archive-edit" style="display: none;">
                    @else
                        <img src="/images/products/{{$archive->archive}}" id="imagemProdutoEdit" alt="Imagem produto">
                        <div class="file mt-1">
                            <button type="button" class="btn btn-success select-img" onclick="modalSelectImage()" style="display: none;">Selecionar</button>
                            <button type="button" class="btn btn-danger remove-img" onclick="removeImage('2')">Remover image</button>
                        </div>
                        <input type="text" name="archive" id="archive-edit" style="display: none;" value="{{$archive->id}}">
                    @endif
                    <p class="aviso">
                        Se nenhuma imagem for selecionada, a imagem padrão acima vai ser incluida ao produto!
                    </p>
                </div>
                <div class="col-12 col-md-8" id="formulario">
                    <div class="form-group">
                        <label for="product">Produto</label>
                        <input type="text" class="form-control" name="product" id="product" placeholder="Nome do produto" value="{{$product->product}}" required>
                    </div>
                    <div class="form-group">
                        <label for="category_id">Categoria</label>
                        <select class="form-control" name="category_id" id="category_id">
                        <option>-- Selecionar categoria--</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}"
                                @if ($product->category_id == $category->id)
                                    selected
                                @endif>
                                {{$category->category}}
                            </option>
                        @endforeach
                        </select>
                    </div>
                    <div class="d-flex" style="justify-content: space-between">
                        <div class="form-group w-50 mr-2">
                            <label for="price">Preço</label>
                            <input type="text" class="form-control" name="price" id="price" data-thousands="." data-decimal="," data-prefix="R$ " placeholder="R$ 00,00" value="{{$product->price}}" required>
                            <script type="text/javascript">$("#price").maskMoney();</script>
                        </div>
                        <div class="form-group w-50 ml-2">
                            <label for="stock">Estoque</label>
                            <input type="number" class="form-control" name="stock" id="stock" placeholder="Quantidade em estoque" value="{{$product->stock}}" required>
                        </div>
                    </div>
                    <div>
                        <label for="description">Descrição</label>
                        <textarea class="form-control" name="description" id="description" aria-label="With textarea"  placeholder="Digite aqui...">{{$product->description}}</textarea>
                    </div>
                    <div class="buttons">
                        <input type="submit" class="btn btn-primary" value="Confirmar">
                    </div>
                </div>
            </div>
        </form>
    </div>
</section> --}}




<div class="w-full overflow-hidden">
    <div class="bg-white p-5 border-b flex justify-between items-center">
      <h1 class="text-gray-500 text-2xl">Editar Produto</h1>
    </div>

    <div class="w-full flex items-center p-5" style="height: calc(100% - 73px);">
        <form action="{{route('product.edit', $product->id)}}" method="post">
            @csrf
            @method('PUT')
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
                        <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" name="product" id="product" placeholder="Nome do produto" value="{{$product->product}}" required>
                    </div>

                    <div class="mb-3">
                        <label for="category_id" class="text-sm font-medium text-gray-700">Categoria <span style="color: red;">*</span></label>
                        <select class="mt-1 block w-full px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" style="padding-top: 0.55rem; padding-bottom: 0.55rem;" name="category_id" id="category_id" required>
                            <option>-- Selecionar categoria--</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}"
                                    @if ($product->category_id == $category->id)
                                        selected
                                    @endif>
                                    {{$category->category}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 flex justify-between">
                        <div class="w-1/2 pr-2">
                            <label for="price" class="form-label inline-block mb-2 text-gray-700">Preço <span style="color: red;">*</span></label>
                            <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" name="price" id="price" data-thousands="." data-decimal="," data-prefix="R$ " placeholder="R$ 0,00" value="{{$product->price}}" required>
                        </div>
                        <div class="w-1/2 pl-2">
                            <label for="stock" class="form-label inline-block mb-2 text-gray-700">Estoque <span style="color: red;">*</span></label>
                            <input type="number" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" name="stock" id="stock" placeholder="Quantidade em estoque" value="{{$product->stock}}" required>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="description" class="form-label inline-block mb-2 text-gray-700">Descrição</label>
                        <textarea class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" name="description" id="description" aria-label="With textarea" placeholder="Digite aqui..." rows="4">{{$product->description}}</textarea>
                    </div>

                    <div class="buttons">
                        <input type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded cursor-pointer" value="Cadastrar">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>




{{--
<div class="modal" id="modalSelectImage" tabindex="-1" style="align-items: center;">
    <div class="modal-dialog w-100" style="max-width: 612px">
      <div class="modal-content" style="max-height: 450px">
        <div class="modal-header">
          <h5 class="modal-title">Selecione uma imagem</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="fecharModalSelectImage('2')">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="overflow-y: auto; max-height: 500px;">
          @forelse ($archives as $archive)
              <img src="/images/products/{{$archive->archive}}" width="100px" class="m-1" style="cursor: pointer;" onclick="selectImage({{$archive->id}}, '{{$archive->archive}}', {{2}})">
          @empty
              <p>nenhum arquivo encontrado</p>
          @endforelse
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="fecharModalSelectImage('2')">Cancelar</button>
          <button type="button" class="btn btn-primary" onclick="confirmImage()">Confirmar</button>
        </div>
      </div>
    </div>
</div> --}}
@endsection