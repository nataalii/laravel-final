@extends('admin-layout')
@section('slot')

<div class="flex justify-around w-[1500px]  m-auto my-12 ">
    <div class="mt-5 w-[850px] h-[700px]">
        @if (substr($quiz->image, 0, 1) == '/')
            <img src="{{asset($quiz->image )}}"  alt="quiz-image" class=" w-[850px] h-[700px] rounded-3xl object-cover" >
        @else
            <img src="{{asset('storage/' . $quiz->image) }}"  alt="quiz-image" class=" w-[850px] h-[700px]  rounded-3xl object-cover" >
         @endif                       
     </div> 
     <div class=" flex flex-col gap-7 justify-center text-xl w-[500px]  ">
        <h1> Title: {{ $quiz->title }}</h1>
        <h2> Description: {{ $quiz->description }}</h2>
        <h2> Questions: {{ count($quiz->question) }}</h2>
        <h2> Author: {{ $quiz->author }}</h2>
        @if (count($quiz->question) !== 0)
            <a href="{{ route('question', $quiz) }}">
                <button class="bg-[#9D00FF] text-white  p-2 mr-4 rounded-lg">Start</button>
            </a>
            
        @endif

     </div>
</div>


@endsection