<aside class="hidden lg:flex w-full lg:w-2/12 mt-2">
    <ul class="mt-2">

        <li class="mb-1" id="dashboard">
            <a class="flex items-center text-lg h-8 overflow-hidden whitespace-nowrap rounded hover:text-orange-500 transition duration-300 ease-in-out cursor-pointer {!! request()->routeIs('admin.dashboard') || request()->routeIs('admin.home')  ? 'text-orange-500' : '' !!}" href="{{ route('admin.dashboard') }}">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" class="w-3 h-3 mr-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="currentColor" d="M216 0h80c13.3 0 24 10.7 24 24v168h87.7c17.8 0 26.7 21.5 14.1 34.1L269.7 378.3c-7.5 7.5-19.8 7.5-27.3 0L90.1 226.1c-12.6-12.6-3.7-34.1 14.1-34.1H192V24c0-13.3 10.7-24 24-24zm296 376v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h146.7l49 49c20.1 20.1 52.5 20.1 72.6 0l49-49H488c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path>
                </svg>
                <span>Painel</span>
            </a>
        </li>

        {{-- <li class="" id="menu_pages">
            <a class="flex items-center text-lg h-8 overflow-hidde whitespace-nowrap rounded hover:text-orange-500 transition duration-300 ease-in-out cursor-pointer" data-mdb-ripple="true" data-mdb-ripple-color="dark" data-bs-toggle="collapse" data-bs-target="#collapseSidenavEx1" aria-expanded="true" aria-controls="collapseSidenavEx1">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" class="w-3 h-3 mr-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="currentColor" d="M216 0h80c13.3 0 24 10.7 24 24v168h87.7c17.8 0 26.7 21.5 14.1 34.1L269.7 378.3c-7.5 7.5-19.8 7.5-27.3 0L90.1 226.1c-12.6-12.6-3.7-34.1 14.1-34.1H192V24c0-13.3 10.7-24 24-24zm296 376v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h146.7l49 49c20.1 20.1 52.5 20.1 72.6 0l49-49H488c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path>
                </svg>
                <span>Páginas</span>
                <svg aria-hidden="true" focusable="false" data-prefix="fas" class="w-3 h-3 ml-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path>
                </svg>
            </a>
            <ul class="accordion-collapse collapse" id="collapseSidenavEx1" aria-labelledby="menu_pages" data-bs-parent="#sidenavExample">
                <li class="relativex">
                    <a href="#!" class="flex items-center text-base py-0 px-2 overflow-hidden text-ellipsis whitespace-nowrap rounded hover:text-orange-500 transition duration-300 ease-in-out" data-mdb-ripple="true" data-mdb-ripple-color="dark">Link 1</a>
                </li>
                <li class="relativex">
                    <a href="#!" class="flex items-center text-base py-0 px-2 overflow-hidden text-ellipsis whitespace-nowrap rounded hover:text-orange-500 transition duration-300 ease-in-out" data-mdb-ripple="true" data-mdb-ripple-color="dark">Link 2</a>
                </li>
            </ul>
        </li> --}}


        <li class="mb-1" id="menu_locais">
            <a class="flex items-center text-lg h-8 overflow-hidde whitespace-nowrap rounded {!! request()->routeIs('admin.places') || request()->routeIs('admin.regions') ? 'text-orange-500 hover:text-white' : 'hover:text-orange-500' !!} transition duration-300 ease-in-out cursor-pointer" data-mdb-ripple="true" data-mdb-ripple-color="dark" data-bs-toggle="collapse" data-bs-target="#collapseSidenavLocais" aria-expanded="true" aria-controls="collapseSidenavLocais">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" class="w-3 h-3 mr-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path fill="currentColor" d="M168.3 499.2C116.1 435 0 279.4 0 192C0 85.96 85.96 0 192 0C298 0 384 85.96 384 192C384 279.4 267 435 215.7 499.2C203.4 514.5 180.6 514.5 168.3 499.2H168.3zM192 256C227.3 256 256 227.3 256 192C256 156.7 227.3 128 192 128C156.7 128 128 156.7 128 192C128 227.3 156.7 256 192 256z"/></svg>
                <span>Locais</span>
                <svg aria-hidden="true" focusable="false" data-prefix="fas" class="w-3 h-3 ml-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path>
                </svg>
            </a>
            <ul class="accordion-collapse collapse {!! request()->routeIs('admin.places') || request()->routeIs('admin.regions') ? 'show' : '' !!}" id="collapseSidenavLocais" aria-labelledby="menu_locais" data-bs-parent="#sidenavExample">
                <li class="mb-2">
                    <a href="{{ route('admin.places') }}" class="flex items-center text-base py-0 px-2 overflow-hidden text-ellipsis whitespace-nowrap rounded {!! request()->routeIs('admin.places') ? 'text-orange-500 hover:text-white' : 'hover:text-orange-500' !!} transition duration-300 ease-in-out" data-mdb-ripple="true" data-mdb-ripple-color="dark">Locais</a>
                </li>
                <li class="mb-2">
                    <a href="{{ route('admin.regions') }}" class="flex items-center text-base py-0 px-2 overflow-hidden text-ellipsis whitespace-nowrap rounded {!! request()->routeIs('admin.regions') ? 'text-orange-500 hover:text-white' : 'hover:text-orange-500' !!} transition duration-300 ease-in-out" data-mdb-ripple="true" data-mdb-ripple-color="dark">Regiões</a>
                </li>
            </ul>
        </li>


        <li class="mb-1" id="menu_adm">
            <a class="flex items-center text-lg h-8 overflow-hidden whitespace-nowrap rounded hover:text-orange-500 transition duration-300 ease-in-out cursor-pointer {!! request()->routeIs('admin.users') ? 'text-orange-500' : '' !!}" href="{{ route('admin.users') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 mr-2" viewBox="0 0 640 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path fill="currentColor" d="M425.1 482.6c-2.303-1.25-4.572-2.559-6.809-3.93l-7.818 4.493c-6.002 3.504-12.83 5.352-19.75 5.352c-10.71 0-21.13-4.492-28.97-12.75c-18.41-20.09-32.29-44.15-40.22-69.9c-5.352-18.06 2.343-36.87 17.83-45.24l8.018-4.669c-.0664-2.621-.0664-5.242 0-7.859l-7.655-4.461c-12.3-6.953-19.4-19.66-19.64-33.38C305.6 306.3 290.4 304 274.7 304H173.3C77.61 304 0 381.7 0 477.4C0 496.5 15.52 512 34.66 512H413.3c5.727 0 10.9-1.727 15.66-4.188c-2.271-4.984-3.86-10.3-3.86-16.06V482.6zM224 256c70.7 0 128-57.31 128-128S294.7 0 224 0C153.3 0 96 57.31 96 128S153.3 256 224 256zM610.5 373.3c2.625-14 2.625-28.5 0-42.5l25.75-15c3-1.625 4.375-5.125 3.375-8.5c-6.75-21.5-18.25-41.13-33.25-57.38c-2.25-2.5-6-3.125-9-1.375l-25.75 14.88c-10.88-9.25-23.38-16.5-36.88-21.25V212.3c0-3.375-2.5-6.375-5.75-7c-22.25-5-45-4.875-66.25 0c-3.25 .625-5.625 3.625-5.625 7v29.88c-13.5 4.75-26 12-36.88 21.25L394.4 248.5c-2.875-1.75-6.625-1.125-9 1.375c-15 16.25-26.5 35.88-33.13 57.38c-1 3.375 .3751 6.875 3.25 8.5l25.75 15c-2.5 14-2.5 28.5 0 42.5l-25.75 15c-3 1.625-4.25 5.125-3.25 8.5c6.625 21.5 18.13 41 33.13 57.38c2.375 2.5 6 3.125 9 1.375l25.88-14.88c10.88 9.25 23.38 16.5 36.88 21.25v29.88c0 3.375 2.375 6.375 5.625 7c22.38 5 45 4.875 66.25 0c3.25-.625 5.75-3.625 5.75-7v-29.88c13.5-4.75 26-12 36.88-21.25l25.75 14.88c2.875 1.75 6.75 1.125 9-1.375c15-16.25 26.5-35.88 33.25-57.38c1-3.375-.3751-6.875-3.375-8.5L610.5 373.3zM496 400.5c-26.75 0-48.5-21.75-48.5-48.5s21.75-48.5 48.5-48.5c26.75 0 48.5 21.75 48.5 48.5S522.8 400.5 496 400.5z"/></svg>
                <span>Administradores</span>
            </a>
        </li>
    </ul>
</aside>