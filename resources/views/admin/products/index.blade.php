@extends('admin.layout.index')

@section('title', 'Produtos- Gerenciador')

@section('content')

{{-- <section class="section-products pb-5" id="section">
  <div class="container">
    <div class="d-flex" style="padding-top: 50px;">
      <a href="{{route('products.create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Novo produto</a>
      <div class="dropdown mx-2">
        <button class="btn btn-secondary" type="button" id="dropdownFilter" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-filter"></i> Filtrar produtos
        </button>
        <div class="dropdown-menu filter" aria-labelledby="dropdownFilter">
          <a class="dropdown-item" href="{{route('products')}}">Todos os produtos</a>
          @foreach ($categories as $category)
            <a class="dropdown-item" href="/products/category/{{$category->id}}">{{$category->category}}</a>
          @endforeach
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped mt-4">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Produto</th>
            <th scope="col">Categoria</th>
            <th scope="col">Descrição</th>
            <th scope="col">Preço</th>
            <th scope="col">Estoque</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($products as $product)
            <tr>
              <th scope="row">{{$product->id}}</th>
                <th>
                  <a href="{{route('product.show', $product->id)}}" style="color: #212529; display: block; width: max-content;">
                  {{$product->product}}
                </a>
              </th>
              <th>
                @foreach ($categories as $category)
                    @if ($category->id == $product->category_id)
                      {{$category->category}}
                    @endif
                @endforeach
              </th>
              <th>
                @if ($product->description == "")
                  Vazio
                @else
                  <span class="d-flex overflow-hidden" style="min-width: 200px; max-height: 46px;">
                    {{$product->description}}
                  </span>
                @endif
              </th>
              <th>
                <span style="display:block; width:max-content;"> {{$product->price}} </span>
              </th>
              <th>
                @if ($product->stock == 0)
                    Esgotado
                @else
                    {{$product->stock}}
                @endif
              </th>
              <th style="display: block; width: max-content;">
                  <a href="{{route('product.edit', $product->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i> Editar</a>
                  <button class="btn btn-danger" onclick="exibirModal({{$product->id}}, '#modalDelete', '/admin/product/delete/')"><i class="fa fa-trash"></i> Excluir</button>
              </th>
            </tr>
          @empty
            <tr>
                <th colspan="7" class="text-center">Lista de produtos vazia</th>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    {{ $products->links('vendor.pagination.bootstrap-4') }}

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
  </div>
</section> --}}

<div class="w-full p-5">
  <div class="flex flex-col w-full">
      <div class="w-full">
          <div class="border-b border-gray-200 shadow">
              <table class="divide-y divide-gray-300 w-full">
                  <thead class="bg-gray-50">
                      <tr>
                          <th class="px-6 py-2 text-xs text-gray-500">
                            ID
                          </th>
                          <th class="px-6 py-2 text-xs text-gray-500">
                            Produto
                          </th>
                          <th class="px-6 py-2 text-xs text-gray-500">
                            Categoria
                          </th>
                          <th class="px-6 py-2 text-xs text-gray-500">
                            Preço
                          </th>
                          <th class="px-6 py-2 text-xs text-gray-500">
                            Estoque
                          </th>
                          <th class="px-6 py-2 text-xs text-gray-500">
                              Editar
                          </th>
                          <th class="px-6 py-2 text-xs text-gray-500">
                              Deletar
                          </th>
                      </tr>
                  </thead>
                  <tbody class="bg-white divide-y divide-gray-300 text-center">
                    @forelse ($products as $product)
                      <tr class="whitespace-nowrap">
                          <td class="px-6 py-4 text-sm text-gray-500">
                            {{$product->id}}
                          </td>
                          <td class="px-6 py-4 text-sm text-gray-900">
                              <a href="{{route('product.show', $product->id)}}" style="color: #212529;">
                                {{$product->product}}
                              </a>
                          </td>
                          <td class="px-6 py-4 text-sm text-gray-500">
                                @foreach ($categories as $category)
                                  @if ($category->id == $product->category_id)
                                    {{$category->category}}
                                  @endif
                                @endforeach
                          </td>
                          <td class="px-6 py-4 text-sm text-gray-500">
                            {{$product->price}}
                          </td>
                          <td class="px-6 py-4">
                            <div class="text-sm text-gray-500">
                              @if ($product->stock == 0)
                                  Esgotado
                              @else
                                  {{$product->stock}}
                              @endif
                            </div>
                          </td>
                          <td class="px-6 py-4">
                            <a href="{{route('product.edit', $product->id)}}" class="inline-block">
                              <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>
                          </td>
                          <td class="px-6 py-4">
                              <button onclick="exibirModal({{$product->id}}, '#modalDelete', '/admin/product/delete/')">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-400" fill="none"
                                      viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                  </svg>
                              </button>
                          </td>
                      </tr>
                    @empty
                      <tr class="whitespace-nowrap">
                        <td colspan="7" class="px-6 py-4 text-sm text-center text-gray-500">Lista de produtos vazia</td>
                      </tr>
                    @endforelse
                  </tbody>
              </table>
          </div>
      </div>
  </div>
</div>

{{-- @include('layouts.modal-delete') --}}

@endsection