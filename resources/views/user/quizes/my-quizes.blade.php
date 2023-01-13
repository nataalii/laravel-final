@extends('admin-layout')
@section('slot')

<x-dashboard>
<div class="m-10 flex flex-col ">
    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8 ">
      <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
          <table class="min-w-full divide-y divide-gray-300">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Quizes</th>
                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">Number of Question</th>

                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                  <span class="sr-only">Edit</span>
                </th>
                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                  <span class="sr-only">Delete</span>
                </th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                @foreach ($quizes as $quiz )
                    
                  <tr>
                      <td class="whitespace-nowrap py-4 pl-4 pr-3 text-xl font-medium text-gray-900 sm:pl-6">
                        <a href="{{ route('quiz.start', $quiz->id )}}"> {{ $quiz->title }}</a>
                          <div class="h-48 w-80 mt-5">
                            @if (substr($quiz->image, 0, 1) == '/')
                                  <img src="{{asset($quiz->image )}}"  alt="quiz-image" class="h-48 w-80 rounded-lg object-cover" >
                            @else
                                <img src="{{asset('storage/' . $quiz->image) }}"  alt="quiz-image" class="h-48 w-80 rounded-lg object-cover" >
                            @endif                       
                          </div>                     
                         </td>
                      <td class="relative whitespace-nowrap text-center py-4 pl-3 pr-4 text-sm font-medium sm:pr-6">
                        <h1 class="text-indigo-600 hover:text-indigo-900 text-3xl">{{ count($quiz->question) }}</h1>
                      </td>
                      <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                        <a href="{{ route('quiz.edit', $quiz->id )}}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                      </td>
                      <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                        <form action="{{ route('quiz.delete', $quiz->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 hover:text-indigo-900 pt-3 " onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                      </td>
                  </tr>
                    
                  @endforeach 
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</x-dashboard>

@endsection