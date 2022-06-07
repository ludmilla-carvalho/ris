<aside class="hidden lg:flex w-full lg:w-2/12 mt-2">
    <ul class="mt-2">
        <li class="" id="dashboard">
            <a class="flex items-center text-lg h-8 overflow-hidden whitespace-nowrap rounded hover:text-orange-500 transition duration-300 ease-in-out cursor-pointer {!! request()->routeIs('admin.dashboard') || request()->routeIs('admin.home')  ? 'text-orange-500' : '' !!}" href="{{ route('admin.dashboard') }}">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" class="w-3 h-3 mr-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="currentColor" d="M216 0h80c13.3 0 24 10.7 24 24v168h87.7c17.8 0 26.7 21.5 14.1 34.1L269.7 378.3c-7.5 7.5-19.8 7.5-27.3 0L90.1 226.1c-12.6-12.6-3.7-34.1 14.1-34.1H192V24c0-13.3 10.7-24 24-24zm296 376v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h146.7l49 49c20.1 20.1 52.5 20.1 72.6 0l49-49H488c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path>
                </svg>
                <span>Painel</span>
            </a>
        </li>

        <li class="" id="sidenavEx1">
            <a class="flex items-center text-lg h-8 overflow-hidde whitespace-nowrap rounded hover:text-orange-500 transition duration-300 ease-in-out cursor-pointer" data-mdb-ripple="true" data-mdb-ripple-color="dark" data-bs-toggle="collapse" data-bs-target="#collapseSidenavEx1" aria-expanded="true" aria-controls="collapseSidenavEx1">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" class="w-3 h-3 mr-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="currentColor" d="M216 0h80c13.3 0 24 10.7 24 24v168h87.7c17.8 0 26.7 21.5 14.1 34.1L269.7 378.3c-7.5 7.5-19.8 7.5-27.3 0L90.1 226.1c-12.6-12.6-3.7-34.1 14.1-34.1H192V24c0-13.3 10.7-24 24-24zm296 376v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h146.7l49 49c20.1 20.1 52.5 20.1 72.6 0l49-49H488c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path>
                </svg>
                <span>Páginas</span>
                <svg aria-hidden="true" focusable="false" data-prefix="fas" class="w-3 h-3 ml-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path>
                </svg>
            </a>
            <ul class="accordion-collapse collapse" id="collapseSidenavEx1" aria-labelledby="sidenavEx1" data-bs-parent="#sidenavExample">
                <li class="relativex">
                    <a href="#!" class="flex items-center text-base py-0 px-2 overflow-hidden text-ellipsis whitespace-nowrap rounded hover:text-orange-500 transition duration-300 ease-in-out" data-mdb-ripple="true" data-mdb-ripple-color="dark">Link 1</a>
                </li>
                <li class="relativex">
                    <a href="#!" class="flex items-center text-base py-0 px-2 overflow-hidden text-ellipsis whitespace-nowrap rounded hover:text-orange-500 transition duration-300 ease-in-out" data-mdb-ripple="true" data-mdb-ripple-color="dark">Link 2</a>
                </li>
            </ul>
        </li>

        <li class="" id="sidenavEx2">
            <a class="flex items-center text-lg h-8 overflow-hidden whitespace-nowrap rounded hover:text-orange-500 transition duration-300 ease-in-out cursor-pointer {!! request()->routeIs('admin.places') ? 'text-orange-500' : '' !!}" href="{{ route('admin.places') }}">
                {{-- <svg aria-hidden="true" focusable="false" data-prefix="fas" class="w-3 h-3 mr-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="currentColor" d="M216 0h80c13.3 0 24 10.7 24 24v168h87.7c17.8 0 26.7 21.5 14.1 34.1L269.7 378.3c-7.5 7.5-19.8 7.5-27.3 0L90.1 226.1c-12.6-12.6-3.7-34.1 14.1-34.1H192V24c0-13.3 10.7-24 24-24zm296 376v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h146.7l49 49c20.1 20.1 52.5 20.1 72.6 0l49-49H488c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path>
                </svg> --}}
                <svg aria-hidden="true" focusable="false" data-prefix="fas" class="w-3 h-3 mr-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path fill="currentColor" d="M168.3 499.2C116.1 435 0 279.4 0 192C0 85.96 85.96 0 192 0C298 0 384 85.96 384 192C384 279.4 267 435 215.7 499.2C203.4 514.5 180.6 514.5 168.3 499.2H168.3zM192 256C227.3 256 256 227.3 256 192C256 156.7 227.3 128 192 128C156.7 128 128 156.7 128 192C128 227.3 156.7 256 192 256z"/></svg>
                <span>Locais</span>
            </a>
        </li>
    </ul>
</aside>