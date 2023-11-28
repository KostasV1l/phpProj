<div>
<div class="my-4">{{ $courses->links() }}</div>

<div class="grid grid-cols-1 lg:grid-cols-2 2xl:grid-cols-3 gap-10 mt-8">


    <div class="fixed top-8 left-1/2 -translate-x-1/2 z-50 animate-pulse"
         wire:loading>
        <x-tmk.preloader class="bg-lime-700/60 text-white border border-lime-700 shadow-2xl">
            {{ $loading }}
        </x-tmk.preloader>
    </div>



@foreach($courses as $course)
<div wire:key="course-{{ $course->id }}" class="max-w-lg rounded-xl overflow-hidden shadow-lg bg-white " >



    <div><p class="text-center border-b-2 p-3">{{$course->programme_name}}</p></div>
    <div class="p-5">
        <div><p class="font-bold text-lg pb-10">{{ $course->name }}</p></div>
        <div class="pb-10"><p>{{$course->description}}</p></div>
    </div>

    <div class="border-t-2 p-5 text-center">
        <button class="bg-blue-500 hover:bg-blue-700 text-white py-2 w-full rounded " wire:click="showCourses({{$course}})">Manage students</button>

{{--        wire:click="showCourses({{$course}})"--}}
    </div>



</div>
@endforeach


{{--    @isset($selectedCourse)--}}
{{--        <x-dialog-modal wire:model="showModal">--}}
{{--            <x-slot name="title">{{ $selectedCourse->name }}</x-slot>--}}
{{--            <x-slot name="content">{{ $selectedCourse->description }}</x-slot>--}}
{{--            <x-slot name="footer">--}}
{{--                @if($selectedCourse->semester)--}}
{{--                    @foreach($selectedCourse->semester as $semester)--}}
{{--                        <p>Semester: {{ $semester }}</p>--}}
{{--                    @endforeach--}}
{{--                @endif--}}
{{--                @if($selectedCourse->firstName)--}}
{{--                    @foreach($selectedCourse->firstName as $firstName)--}}
{{--                        <p>{{ $firstName }}</p>--}}
{{--                    @endforeach--}}
{{--                @endif--}}
{{--                    @if($selectedCourse->lastName)--}}
{{--                        @foreach($selectedCourse->lastName as $lastName)--}}
{{--                            <p>{{ $lastName }}</p>--}}
{{--                        @endforeach--}}
{{--                    @endif--}}
{{--            </x-slot>--}}
{{--        </x-dialog-modal>--}}
{{--    @endisset--}}




    @isset($selectedCourse)
        <x-dialog-modal wire:model="showModal">
            <x-slot name="title">{{ $selectedCourse->name }}</x-slot>
            <x-slot name="content">{{ $selectedCourse->description }}</x-slot>
            <x-slot name="footer">
                @foreach($selectedCourse->semester as $index => $semester)
                    <p>

                        {{ $selectedCourse->firstName[$index] }} {{ $selectedCourse->lastName[$index] }}

                        (semester {{ $semester }})
                    </p>
                @endforeach
            </x-slot>
        </x-dialog-modal>
    @endisset






    <x-livewire.livewire-log :courses="$courses" :studentCourses="$studentCourses"/>
</div>
</div>
