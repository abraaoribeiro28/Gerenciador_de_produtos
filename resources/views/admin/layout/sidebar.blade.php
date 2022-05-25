<!-- Component Start -->
<nav id="sidebar" class="flex flex-col w-48 h-full text-gray-400 bg-gray-900 relative">
    <a class="flex items-center w-full px-3 mt-3" href="{{route('admin')}}">
        <svg class="w-8 h-8 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path d="M11 17a1 1 0 001.447.894l4-2A1 1 0 0017 15V9.236a1 1 0 00-1.447-.894l-4 2a1 1 0 00-.553.894V17zM15.211 6.276a1 1 0 000-1.788l-4.764-2.382a1 1 0 00-.894 0L4.789 4.488a1 1 0 000 1.788l4.764 2.382a1 1 0 00.894 0l4.764-2.382zM4.447 8.342A1 1 0 003 9.236V15a1 1 0 00.553.894l4 2A1 1 0 009 17v-5.764a1 1 0 00-.553-.894l-4-2z" />
        </svg>
        <span class="ml-2 text-sm font-bold">Gerenciador</span>
    </a>
    <div class="w-full px-2">
        <div class="flex flex-col items-center w-full mt-3 border-t border-gray-700">
            <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-700 hover:text-gray-300" href="{{route('dashboard')}}">
                <ion-icon name="home"></ion-icon>
                <span class="ml-2 text-sm font-medium">Dasboard</span>
            </a>
            <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-700 hover:text-gray-300" href="{{route('categories')}}">
                <ion-icon name="list-box"></ion-icon>
                <span class="ml-2 text-sm font-medium">Categorias</span>
            </a>
            <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-700 hover:text-gray-300" href="{{route('products')}}">
                <ion-icon name="cart"></ion-icon>
                <span class="ml-2 text-sm font-medium">Produtos</span>
            </a>
            <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-700 hover:text-gray-300" href="{{route('archives.index')}}">
                <ion-icon name="photos"></ion-icon>
                <span class="ml-2 text-sm font-medium">Imagens</span>
            </a>
        </div>
    </div>
    
</nav>
<!-- Component End  -->