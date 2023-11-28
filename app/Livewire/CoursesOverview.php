<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\Programme;
use App\Models\StudentCourse;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class CoursesOverview extends Component
{

    use WithPagination;
    #[Layout('layouts.studentadmin', ['title' => 'Course Overview'])]

    public $loading = 'Please wait...';
    public $perPage = 6;
    public $selectedCourse;
    public $showModal = true;


    public function showCourses(Course $course)
    {
        $this->selectedCourse = $course;
        $this->showModal = true;
//        dump($this->selectedCourse->toArray());
    }


    public function render()
    {
        $courses = Course::orderBy('name')
            ->Paginate($this->perPage);

        $studentCourses = StudentCourse::with('students')->get();

        return view('livewire.courses-overview', compact('courses'), compact('studentCourses'));
    }



}
