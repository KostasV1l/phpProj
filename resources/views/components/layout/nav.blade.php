<nav class="container mx-auto p-4 flex ">
    <div class="space-x-10 ps-10">

        <x-nav-link  href="{{ route('homepage') }}" :active="request()->routeIs('homepage')">
            Home
        </x-nav-link>
        <x-nav-link href="{{ route('course') }}" :active="request()->routeIs('course')">
            Courses
        </x-nav-link>

    </div>

</nav>
