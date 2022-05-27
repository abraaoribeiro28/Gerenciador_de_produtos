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
    <div class="bg-white p-5 border-b mb-3">
      @forelse ($categories as $category)
        @if ($category->category_father == 0)
          <div class="box">
            <div class="flex justify-between p-2 border">
              <div class="title">
                <div class="circle"></div>
                 <span class="m-0">{{$category->category}}</span>
                  @foreach ($products as $product)
                    @if ($product->category_id == $category->id)
                      <script>{{$quantidade++}}</script>
                    @endif
                  @endforeach
                  <span class="inline-block py-1 px-1 leading-none text-center whitespace-nowrap align-baseline font-bold bg-blue-600 text-white rounded" style="font-size: 12px">{{$quantidade}}</span>
                  <script>{{$quantidade=0}}</script>
              </div>
              <div class="option">
                {{-- <div class="dropdown">
                  <button class="btn" type="button" id="dropdown-category" data-toggle="dropdown">
                    <ion-icon name="more"></ion-icon>
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
                </div> --}}
                <div class="flex justify-center">
                  <div>
                    <div class="dropdown relative">
                      <button class="dropdown-toggle p-1 font-medium text-xs leading-tight rounded focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg active:text-white transition duration-150 ease-in-out flex items-center whitespace-nowrap" type="button" id="dropdownMenuButton1" style="font-size: 18px;" data-bs-toggle="dropdown" aria-expanded="false">
                        <ion-icon name="more"></ion-icon>
                      </button>
                      <ul class="hidden dropdown-menu min-w-max absolute bg-white text-base z-50 float-left py-2 list-none text-left rounded-lg shadow-lg mt-1 m-0 bg-clip-padding border-none" aria-labelledby="dropdownMenuButton1" style="transform: translateX(-76px);">
                        <li>
                          <a href="{{route('category.show', $category->id)}}" class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100">
                            <ion-icon name="eye"></ion-icon>
                            Visualizar
                          </a>
                        </li>
                        <li>
                          <a href="{{route('category.edit', $category->id)}}" class="dropdown-item text-left text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100">
                            <ion-icon name="create"></ion-icon>
                            Editar
                          </a>
                        </li>
                        <li>
                          <button class="dropdown-item text-sm text-left py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100">
                            <ion-icon name="trash"></ion-icon>
                            Excluir
                          </button>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @foreach ($categories as $subcategory)
                @if ($subcategory->category_father == $category->id)
                <div class="ml-3 flex justify-between p-2 border">
                  <div class="title">
                    <div class="circle"></div>
                    <span class="m-0">{{$subcategory->category}}</span>
                    @foreach ($products as $product)
                      @if ($product->category_id == $subcategory->id)
                          <script>{{$quantidade++}}</script>
                      @endif
                    @endforeach
                    <span class="inline-block py-1 px-1 leading-none text-center whitespace-nowrap align-baseline font-bold bg-blue-600 text-white rounded" style="font-size: 12px">{{$quantidade}}</span>
                    <script>{{$quantidade=0}}</script>
                  </div>
                  <div class="option">
                    {{-- <div class="dropdown">
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
                    </div> --}}
                    <div class="flex justify-center">
                      <div>
                        <div class="dropdown relative">
                          <button class="dropdown-toggle p-1 font-medium text-xs leading-tight rounded focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg active:text-white transition duration-150 ease-in-out flex items-center whitespace-nowrap" type="button" id="dropdownMenuButton1" style="font-size: 18px;" data-bs-toggle="dropdown" aria-expanded="false">
                            <ion-icon name="more"></ion-icon>
                          </button>
                          <ul class="hidden dropdown-menu min-w-max absolute bg-white text-base z-50 float-left py-2 list-none text-left rounded-lg shadow-lg mt-1 m-0 bg-clip-padding border-none" aria-labelledby="dropdownMenuButton1" style="transform: translateX(-76px);">
                            <li>
                              <a href="{{route('category.show', $subcategory->id)}}" class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100">
                                <ion-icon name="eye"></ion-icon>
                                Visualizar
                              </a>
                            </li>
                            <li>
                              <a href="{{route('category.edit', $subcategory->id)}}" class="dropdown-item text-left text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100">
                                <ion-icon name="create"></ion-icon>
                                Editar
                              </a>
                            </li>
                            <li>
                              <button class="dropdown-item text-sm text-left py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100">
                                <ion-icon name="trash"></ion-icon>
                                Excluir
                              </button>
                            </li>
                          </ul>
                        </div>
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

<script>
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
</script>
@endsection
