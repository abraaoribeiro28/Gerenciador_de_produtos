@extends('admin.layout.index')

@section('title', 'Gerenciador - Imagens')

@section('content')

{{-- <section class="section-products">
  <div class="container px-5" style="padding-top: 50px;">
    <div>
        <button class="btn btn-success" onclick="modalUpload()">
            <i class="fa fa-upload"></i>
            Upload file
        </button>
    </div>
    <div class="images mt-3">
        @foreach ($archives as $archive)
        <div class="card-img mb-4">
          <div class="box-img">
            <img src="/images/products/{{$archive->archive}}">
          </div>
          <span class="name-img pt-3 d-block" style="white-space: nowrap;">{{$archive->archive}}</span>
          <button class="btn btn-danger btn-exlcuir-archive" onclick="exibirModal({{$archive->id}}, '#modalDelete', '/admin/archive/delete/')">Excluir</button>
        </div>
        @endforeach
    </div>
  </div>
</section> --}}



<div class="w-full overflow-hidden">
  <div class="bg-white p-5 border-b flex justify-between items-center">
    <h1 class="text-gray-500 text-2xl">Galeria de imagens</h1>
    <button class="bg-green-600 hover:bg-green-700 text-sm text-white font-bold py-2 px-3 rounded flex items-center" onclick="modalUpload()">
      <ion-icon name="add-circle"></ion-icon>
      <span class="ml-1">Adicionar Imagem</span>
    </button>
  </div>


  <div class="flex flex-col w-full p-5">
    <div class="bg-white p-5 border-b mb-3">
      @foreach ($archives as $archive)
        <div class="card-img mb-4">
          <div class="box-img">
            <img src="/images/products/{{$archive->archive}}">
          </div>
          <span class="name-img pt-3 d-block" style="white-space: nowrap;">{{$archive->archive}}</span>
          <button class="bg-red-500 w-full hover:bg-red-700 text-white font-bold py-2 px-4 rounded cursor-pointer" onclick="exibirModal({{$archive->id}}, '#modalDelete', '/admin/archive/delete/')">Excluir</button>
        </div>
      @endforeach
    </div>
  </div>
</div>







{{-- <div class="modal" id="modalUpload" tabindex="-1" style="align-items: center;">
  <div class="modal-dialog" style="width: 100%">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Upload File</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeModal()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('archives.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
              <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="archive" id="archive" aria-describedby="customFileInput" required>
                    <label class="custom-file-label" for="archive">Selecionar arquivo</label>
                  </div>
                </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeModal()">Cancelar</button>
              <button type="submit" class="btn btn-primary">Salvar arquivo</button>
          </div>
      </form>
    </div>
  </div>
</div> --}}

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
{{-- @include('layouts.modal-delete') --}}
@endsection
