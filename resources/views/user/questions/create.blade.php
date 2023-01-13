@extends('admin-layout')
@section('slot')
<x-dashboard>
  <div class="flex items-center justify-center h-full">
    <form method="POST" action="{{ route('question.store') }}" enctype="multipart/form-data" class="space-y-8 divide-y w-3/5 divide-gray-200 bg-white rounded-xl">
        @csrf
        <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5 p-10">
          <div class="space-y-6 sm:space-y-5">
            <div>
              <h3 class="text-lg font-medium leading-6 text-gray-900"> Add Question</h3>
            </div>
      
            <div class="space-y-6 sm:space-y-5">
                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="question" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Question</label>
                    <div class="mt-1 sm:col-span-2 sm:mt ">
                      <input id="question" name="question" value="{{ old('question') }}"   placeholder="Question" class="block bg-gray-100  p-3 w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                      <x-error name="question"/>

                    </div>
                </div>
      
              <div class="sm:grid sm:grid-cols-1 sm:items-start sm:gap-5 sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="cover-photo" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Upload Image</label>
                <div class="flex text-sm text-gray-600 justify-between">
                  <label for="image" class="relative cursor-pointer rounded-md bg-white font-medium  text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                    <input id="image" name="image" type="file" class="">
                  </label>
                </div>
                
                <x-error name="image"/>
              </div>
            </div>
          </div>
      
          <div class="space-y-6 pt-8 sm:space-y-5 sm:pt-10">

              <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:pt-5">
                <label for="quiz_id" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Quiz</label>
                <div class="mt-1 sm:col-span-2 sm:mt-0">
                  <select id="quiz_id" name="quiz_id" class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm p-3">
                    @foreach ($quizes as $quiz )
                    
                        <option 
                        value="{{ $quiz->id }}"
                        {{ old('quiz_id') == $quiz->id ? 'selected' : ''}}
                        > {{ucwords($quiz->title) }}</option>
                    @endforeach
                  </select>
                </div>
               </div>
               <x-error name="quiz"/>

    
            </div>
            <div class="space-y-6 pt-8 sm:space-y-5 sm:pt-10">
                <div class="mt-1 sm:col-span-2 sm:mt ">
                  <input id="position" name="position" value="{{ old('position') }}" type="number"  placeholder="Position" class="block bg-gray-100  p-3 w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                  <x-error name="position"/>
                </div>  
                <div class="mt-1 sm:col-span-2 sm:mt ">
                  <input id="A" name="A" value="{{ old('A') }}"   placeholder="Answer A" class="block bg-gray-100  p-3 w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                  <x-error name="A"/>

                </div>
                <div class="mt-1 sm:col-span-2 sm:mt ">
                  <input id="B" name="B" value="{{ old('B') }}" placeholder="Answer B" class="block bg-gray-100  p-3 w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                  <x-error name="B"/>

                </div>
                <div class="mt-1 sm:col-span-2 sm:mt ">
                  <input id="C" name="C" value="{{ old('C') }}" placeholder="Answer C" class="block bg-gray-100  p-3 w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                  <x-error name="C"/>

                </div>     
                <div class="mt-1 sm:col-span-2 sm:mt ">
                  <input id="D" name="D" value="{{ old('D') }}" type="D"  placeholder="Answer D" class="block bg-gray-100  p-3 w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                  <x-error name="D"/>

                </div>    
                <div class="mt-1 sm:col-span-2 sm:mt">
                    <label for="D" class=" m-2 text-[#9D00FF] text-xl">Correct Answer</label>
                    <select name="correct" id="correct" class=" p-3 rounded-lg">
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                    </select>
                </div>                         
            </div>

        </div>
      
        <div class="pt-5 flex justify-end p-7">
            <button type="submit" class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
        </div>
      </form>
</div>  
</x-dashboard>  


@endsection