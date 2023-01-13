@extends('admin-layout')
@section('slot')

<x-dashboard>
  <div class="flex flex-col items-center justify-center h-full">
    
    <form method="POST" action="{{ route('quiz.update', $quiz) }}" enctype="multipart/form-data" class="space-y-8 divide-y w-3/5 divide-gray-200 bg-white rounded-xl">
        @method('PATCH')
        @csrf
        <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5 p-10">
          <div class="space-y-6 sm:space-y-5">
            <div>
              <h3 class="text-lg font-medium leading-6 text-gray-900"> Add Quiz</h3>
            </div>
      
            <div class="space-y-6 sm:space-y-5">
                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="author" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2 " >Author</label>
                    <div class="mt-1 sm:col-span-2 sm:mt ">
                      <input id="author" name="author" value="{{ $quiz->author }}" disabled readonly type="author"  placeholder="author" class="  block bg-gray-100  p-3 w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>
                </div>
                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="title" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Title</label>
                    <div class="mt-1 sm:col-span-2 sm:mt ">
                      <input id="title" name="title" value="{{ $quiz->title }}" type="title"  placeholder="title" class="block bg-gray-100  p-3 w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                      <x-error name="title"/>
                    </div>
                </div>
                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="description" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Description</label>
                    <div class="mt-1 sm:col-span-2 sm:mt ">
                      <input id="description" name="description" value="{{ $quiz->description}}" type="description"  placeholder="description" class="block bg-gray-100  p-3 w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                      <x-error name="description"/>
                    </div>
                </div>
      
              <div class="sm:grid sm:grid-cols-1 sm:items-start sm:gap-5 sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="cover-photo" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Image</label>
                <div class="flex text-sm text-gray-600 justify-between">
                  <label for="image" class="relative cursor-pointer rounded-md bg-white font-medium  text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                    <input id="image" name="image" type="file" class="">
                  </label>
                </div>
                
                <x-error name="image"/>
              </div>
            </div>
          </div>

            
      
        </div>
      
        <div class="pt-5 flex justify-end p-7">
            <button type="submit" class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
        </div>
      </form>
        <h1 class=" text-center p-10 text-[#9D00FF] text-3xl"> Questions Of This Quiz</h1>
        <div class="w-[1000px] ">
            <table class="min-w-full divide-y divide-gray-300 ">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Questions</th>
                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                </th>
                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                </th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white ">
                  @foreach ($quiz->question as $question )
                  <tr>
                      <td class="whitespace-nowrap py-4 pl-4 pr-3 text-xl font-medium text-gray-900 sm:pl-6">
                        <a href="{{ route('question.edit', $question->id )}}"> {{ $question->question }}</a>
                          <div class="h-48 w-80 mt-5">
                            @if (substr($question->image, 0, 1) == '/')
                                  <img src="{{asset($question->image )}}"  alt="quiz-image" class="h-48 w-80 rounded-lg object-cover" >
                            @else
                                <img src="{{asset('storage/' . $question->image) }}"  alt="quiz-image" class="h-48 w-80 rounded-lg object-cover" >
                            @endif                       
                          </div>  
                       </td>
                      <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                        <a href="{{ route('question.edit', $question->id )}}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                      </td>
                      <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                        <form action="{{ route('question.delete', $question->id)}}" method="POST">
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
</x-dashboard>  


@endsection