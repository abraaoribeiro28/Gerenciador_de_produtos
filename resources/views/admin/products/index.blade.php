@extends('admin.layout.index')

@section('title', 'Produtos- Gerenciador')

@section('content')
<div class="w-full overflow-hidden">

  <div class="bg-white p-5 border-b flex justify-between items-center">
    <h1 class="text-gray-500 text-2xl">Listagem de produtos</h1>
    <a href="{{route('products.create')}}" class="bg-green-600 hover:bg-green-700 text-sm text-white font-bold py-2 px-3 rounded flex items-center">
      <ion-icon name="add-circle"></ion-icon>
      <span class="ml-1">Adicionar produto</span>
    </a>
  </div>
  <div class="flex flex-col w-full p-5">
      <div class="bg-white p-5 border-b mb-3">
        <form action="#">
          <div class="grid grid-cols-4 gap-0">
            <div class="xl:col-span-1 md:col-span-2 col-span-4 px-1">
              <label for="product" class="text-sm font-medium text-gray-700">Produto</label>
              <input type="text" name="product" id="product" class="px-3 py-2 border mt-1 block w-full sm:text-sm border-gray-300 rounded-md text-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="Digite o nome do produto">
            </div>

            <div class="xl:col-span-1 md:col-span-2 col-span-4 px-1 md:mt-0 sm:mt-2">
              <label for="category" class=" text-sm font-medium text-gray-700">Categoria</label>
              <select id="category" name="category" class="mt-1 block w-full px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" style="padding-top: 0.55rem; padding-bottom: 0.55rem;">
                <option value="">Selecione uma categoria</option>
                @foreach ($categories as $category)
                  <option value="{{$category->id}}">{{$category->category}}</option>
                @endforeach
              </select>
            </div>

            <div class="xl:col-span-1 md:col-span-2 col-span-4 px-1 xl:mt-0 sm:mt-2">
              <label for="price-min" class="text-sm font-medium text-gray-700">Preço mínimo</label>
              <input type="text" name="price-min" id="price-min" class="px-3 py-2 border mt-1 block w-full sm:text-sm border-gray-300 rounded-md text-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="Digite o preço mínimo do produto">
            </div>
            <div class="xl:col-span-1 md:col-span-2 col-span-4 px-1 xl:mt-0 sm:mt-2">
              <label for="price-max" class="text-sm font-medium text-gray-700">Preço máximo</label>
              <input type="text" name="price-max" id="price-max" class="px-3 py-2 border mt-1 block w-full sm:text-sm border-gray-300 rounded-md text-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="Digite o preço máximo do produto">
            </div>
          </div>
        </form>
      </div>
      
      <div class="w-full overflow-auto" style="max-height: 665px;">
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
                            <form action="/admin/product/delete/{{$product->id}}" method="post">
                              @csrf
                              @method('delete')
                              <button type="submit" onclick="confirm(event,'delete_'+{{$product->id}})" id="delete_{{$product->id}}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-400" fill="none"
                                      viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                  </svg>
                              </button>
                            </form>
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
      {{ $products->links() }}
  </div>

</div>

@include('admin.components.mensage-success')

<script defer>
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 mx-1 rounded focus:outline-none',
      cancelButton: 'bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 mx-1 rounded focus:outline-none'
    },
    buttonsStyling: false
  });
  function confirm(event, id_button){
    event.preventDefault();

    let btn = document.querySelector(`#${id_button}`);

    swalWithBootstrapButtons.fire({
      title: 'Tem certeza?',
      text: "Você não será capaz de reverter isso!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Sim, excluir!',
      cancelButtonText: 'Não, cancelar!',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        // swalWithBootstrapButtons.fire(
        //   'Excluído!',
        //   'Seu registro foi excluído.',
        //   'success'
        // )
        btn.onclick = () => true;
        btn.click();
      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Cancelado',
          'Seu registro está seguro :)',
          'error'
        )
      }
    })
  }
</script>

@endsection