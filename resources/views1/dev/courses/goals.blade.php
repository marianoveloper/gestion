<x-dev-layout :course="$course">


    <div class="my-8">
        @livewire('dev.courses-goals',['course'=>$course], key('courses-goals'.$course->id))
    </div>
    <div>
        @livewire('dev.courses-requirements',['course'=>$course], key('courses-requirements'.$course->id))
    </div>
    <div class="my-8">
        @livewire('dev.courses-resolutions',['course'=>$course], key('courses-resolutions'.$course->id))
    </div>
</x-dev-layout>
