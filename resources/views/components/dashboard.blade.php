@props(['slot'])
<div class="flex justify-center p-20 h-full">
    <div class="px-4 sm:px-6 lg:px-8 w-[1400px]">
          <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
              <a href="{{ route('home') }}" class="text-3xl font-semibold ">
                All Quizes
              </a>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
              @if ( auth()->user()->id === 1)
                <button type="button" class="inline-flex items-center justify-center rounded-md border border-transparent bg-[#9D00FF] px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto mr-3">
                  <a href="{{ route('quiz.pending') }}">Pending</a>
                </button>              
              @endif
              <button type="button" class="inline-flex items-center justify-center rounded-md border border-transparent bg-[#9D00FF] px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto mr-3">
                  <a href="{{ route('quiz.create') }}">Add Quiz</a>
              </button>
              <button type="button" class="inline-flex items-center justify-center rounded-md border border-transparent bg-[#9D00FF] px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                <a href="{{ route('question.create') }}">Add Question</a>
            </button>
            </div>
          </div>
          {{ $slot }}
  
    </div>  
  
</div>