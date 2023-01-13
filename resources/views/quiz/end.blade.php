@extends('admin-layout')
@section('slot')

<div class="flex flex-col w-screen h-[700px] gap-2  m-auto my-12 justify-center items-center text-2xl ">
    <h1>Correct: {{ $correct }} </h1>
    <h1>Incorrect: {{ $all-$correct }} </h1>
    <h1>Result: {{ $correct }} / {{ $all }} </h1>
    <a href="{{ route('home') }}">
        <button type="submit" class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">home</button>
    </a>
</div>


@endsection