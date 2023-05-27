@php
    use App\Models\Course;
    /** @var Course $course */
@endphp
<a class="course-card__wrapper" href="{{ route('courses.show', ['slug' => $course->slug]) }}">
    <div class="course-card">

    </div>
</a>
