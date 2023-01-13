@extends('admin-layout')
@section('slot')

<x-dashboard>
  <div class="flex items-center justify-center h-full">
    <form method="POST" action="{{ route('quiz.store') }}" enctype="multipart/form-data" class="space-y-8 divide-y w-3/5 divide-gray-200 bg-white rounded-xl">
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
                      <input id="author" name="author" value="{{ $user->username }}" disabled readonly type="author"  placeholder="author" class="  block bg-gray-100  p-3 w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>
                </div>
                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="title" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Title</label>
                    <div class="mt-1 sm:col-span-2 sm:mt ">
                      <input id="title" name="title" value="{{ old('title') }}" type="title"  placeholder="title" class="block bg-gray-100  p-3 w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                      <x-error name="title"/>
                    </div>
                </div>
                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="description" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Description</label>
                    <div class="mt-1 sm:col-span-2 sm:mt ">
                      <input id="description" name="description" value="{{ old('description') }}" type="description"  placeholder="description" class="block bg-gray-100  p-3 w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
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
</div>  
</x-dashboard>  


@endsection