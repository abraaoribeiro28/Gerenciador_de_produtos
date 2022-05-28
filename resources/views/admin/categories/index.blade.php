@extends('admin.layout.index')

@section('title', 'Gerenciador -Categorias')

@section('content')

{{-- <section class="section-categories">
  <div class="container px-5" style="padding-top: 50px;">
    <a href="{{route('category.create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Nova categoria</a>

    <div class="table mt-3">
      @forelse ($categories as $category)
        @if ($category->category_father == 0)
          <div class="box">
            <div class="category pai mb-2">
              <div class="title">
                <div class="circle"></div>
                <h6 class="m-0">{{$category->category}}</h6>
                  @foreach ($products as $product)
                    @if ($product->category_id == $category->id)
                      <script>{{$quantidade++}}</script>
                    @endif
                  @endforeach
                  <span class="badge badge-primary">{{$quantidade}}</span>
                  <script>{{$quantidade=0}}</script>
              </div>
              <div class="option">
                <div class="dropdown">
                  <button class="btn" type="button" id="dropdown-category" data-toggle="dropdown">
                    <i class="fa fa-ellipsis-v"></i>
                  </button>
                  <div class="dropdown-menu actions" aria-labelledby="dropdown-category">
                    <a class="dropdown-item" href="{{route('category.show', $category->id)}}">
                      <i class="fa fa-eye" style="color: rgb(40, 167, 69, 0.9);"></i>
                      Visualizar
                    </a>
                    <a class="dropdown-item" href="{{route('category.edit', $category->id)}}">
                      <i class="fa fa-pencil" style="color: rgb(248, 192, 51, 0.9);"></i>
                      Editar
                    </a>
                    <button class="dropdown-item" onclick="exibirModal({{$category->id}})">
                      <i class="fa fa-times" style="color: rgb(221, 61, 49, 0.9);"></i>
                      Excluir
                    </button>
                  </div>
                </div>
              </div>
            </div>
            @foreach ($categories as $subcategory)
                @if ($subcategory->category_father == $category->id)
                <div class="category filho mb-2">
                  <div class="title">
                    <div class="circle"></div>
                    <h6 class="m-0">{{$subcategory->category}}</h6>
                    @foreach ($products as $product)
                        @if ($product->category_id == $subcategory->id)
                            <script>{{$quantidade++}}</script>
                        @endif
                    @endforeach
                    <span class="badge badge-primary">{{$quantidade}}</span>
                    <script>{{$quantidade=0}}</script>
                  </div>
                  <div class="option">
                    <div class="dropdown">
                      <button class="btn" type="button" id="dropdown-category" data-toggle="dropdown">
                        <i class="fa fa-ellipsis-v"></i>
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdown-category">
                        <a class="dropdown-item" href="{{route('category.show', $subcategory->id)}}">
                          <i class="fa fa-eye" style="color: rgb(40, 167, 69, 0.9);"></i>
                          Visualizar
                        </a>
                        <a class="dropdown-item" href="{{route('category.edit', $subcategory->id)}}">
                          <i class="fa fa-pencil" style="color: rgb(248, 192, 51, 0.9);"></i>
                          Editar
                        </a>
                        <button class="dropdown-item" onclick="exibirModal({{$subcategory->id}})">
                          <i class="fa fa-times" style="color: rgb(221, 61, 49, 0.9);"></i>
                          Excluir
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                @endif
            @endforeach
          </div>
        @endif
      @empty
      <div class="box">
        <h5 class="m-0">Nenhuma categoria cadastrada</h5>
      </div>
      @endforelse
    </div>

    @if (Session('erro'))
      <div class="msg bg-danger">
        <h6 class="m-0">{{Session('erro')}}</h6>
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

<div class="w-full overflow-hidden">
  <div class="bg-white p-5 border-b flex justify-between items-center">
    <h1 class="text-gray-500 text-2xl">Listagem de categorias</h1>
    <a href="{{route('category.create')}}" class="bg-green-600 hover:bg-green-700 text-sm text-white font-bold py-2 px-3 rounded flex items-center">
      <ion-icon name="add-circle"></ion-icon>
      <span class="ml-1">Adicionar categoria</span>
    </a>
  </div>
  <div class="flex flex-col w-full p-5">
    <table class="divide-y divide-gray-300 w-full">
      <thead class="bg-gray-50">
          <tr>
            <th class="px-6 py-2 text-xs text-gray-500">
              ID
            </th>
            <th class="px-6 py-2 text-xs text-gray-500">
              Categoria
            </th>
            <th class="px-6 py-2 text-xs text-gray-500">
              Qtd produtos
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
        @forelse ($categories as $category)
          @if ($category->category_father == 0)
            <tr class="whitespace-nowrap">
              <td class="px-6 py-4 text-sm text-gray-500">
                {{$category->id}}
              </td>
              <td class="px-6 py-4 text-sm text-gray-500">
                {{$category->category}}
              </td>
              <td class="px-6 py-4 text-sm text-gray-900">
                <span class="inline-block py-1 px-1 leading-none text-center whitespace-nowrap align-baseline font-bold bg-blue-600 text-white rounded" style="font-size: 12px">
                  {{$products->where('category_id', $category->id)->count()}}
                </span>
              </td>
              <td class="px-6 py-4">
                <a href="{{route('category.edit', $category->id)}}" class="inline-block">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </a>
              </td>
              <td class="px-6 py-4">
                <form action="{{route('category.destroy', $category->id)}}" method="post">
                  @csrf
                  @method('delete')
                  <button type="submit" onclick="confirm(event,'delete_'+{{$category->id}})" id="delete_{{$category->id}}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-400" fill="none"
                          viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                      </svg>
                  </button>
                </form>
              </td>
            </tr>
              @foreach ($categories as $subcategory)
                @if ($subcategory->category_father == $category->id)
                  <tr class="whitespace-nowrap bg-gray-50">
                    <td class="px-6 py-4 text-sm text-gray-500">
                      {{$subcategory->id}}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">
                      {{$subcategory->category}}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-900">
                      <span class="inline-block py-1 px-1 leading-none text-center whitespace-nowrap align-baseline font-bold bg-blue-600 text-white rounded" style="font-size: 12px">
                        {{$products->where('category_id', $subcategory->id)->count()}}
                      </span>
                    </td>
                    <td class="px-6 py-4">
                      <a href="{{route('category.edit', $subcategory->id)}}" class="inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" fill="none"
                              viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                          </svg>
                      </a>
                    </td>
                    <td class="px-6 py-4">
                      <form action="{{route('category.destroy', $subcategory->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" onclick="confirm(event,'delete_'+{{$subcategory->id}})" id="delete_{{$subcategory->id}}">
                          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                      </form>
                    </td>
                  </tr>
                @endif
              @endforeach
            @endif
          @empty
          <tr class="whitespace-nowrap">
            <td colspan="7" class="px-6 py-4 text-sm text-center text-gray-500">Lista de produtos vazia</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>



{{-- <div class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmar exclusão</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="fecharModal()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Tem certeza que deseja excluir esta categoria?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="fecharModal()">Cancelar</button>
        <form method="post" id="form-excluir">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-primary">Confirmar</button>
        </form>
      </div>
    </div>
  </div>
</div> --}}

{{-- <script>
  const modal = document.querySelector('.modal');
  function exibirModal(id){
    modal.style.display = 'block';

    const formExcluir = document.querySelector('#form-excluir');
    formExcluir.setAttribute('action', '/admin/category/delete/'+id);
  }
  function fecharModal(){
    modal.style.display = 'none';
  }

  function fecharMsg(){
    const msg = document.querySelector('.msg').style.display = 'none';
  }
</script> --}}


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
