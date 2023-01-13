@extends('admin-layout')
@section('slot')
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<form class="flex flex-col justify-around w-[1500px]  m-auto my-12 " id='form' 
      action="{{ route('quiz.end', ['quiz' => $quiz]) }}">
    @csrf

    @foreach ($quiz->question as $question )
    <div class=" flex justify-around mt-9 question "  style=" display: none">
        <div class="mt-5 w-[850px] h-[700px]">
        @if (substr($question->image, 0, 1) == '/')
            <img src="{{asset($question->image )}}"  alt="question-image" class=" w-[850px] h-[700px] rounded-3xl object-cover" >
        @else
            <img src="{{asset('storage/' . $question->image) }}"  alt="question-image" class=" w-[850px] h-[700px]  rounded-3xl object-cover" >
         @endif                       
        </div> 
      <div class=" flex flex-col gap-7 justify-center text-xl w-[500px] ">
        <h1>{{ $question->question }}</h1>
        <h2> Questions: {{ $question->position  }}/ {{ count($quiz->question) }}</h2>
        <div class="flex flex-col">
            <label class="container">

            <input type="radio" name="radio-[{{ $question->id }}]" value='A'  id='A' onchange="result(this, {{ $question->correct }})"/>
            <span class="checkmark">(A) {{ $question->A }}</span>
            </label>
            <label class="container">
            <input type="radio" name="radio-[{{ $question->id }}]" value="B"  id='B' onchange="result(this, {{ $question->correct }})">
            <span class="checkmark">(B) {{ $question->B }}</span>
            </label>
            <label class="container">
            <input type="radio" name="radio-[{{ $question->id }}]" value="C"  id='C' onchange="result(this, {{ $question->correct }})">
            <span class="checkmark">(C) {{ $question->C }}</span>
            </label>
            <label class="container">
            <input type="radio" name="radio-[{{ $question->id }}]" value="D"  id='D' onchange="result(this, {{ $question->correct }})">
            <span class="checkmark">(D) {{ $question->D }}</span>
            </label>

        </div>
     </div>
    </div>

    @endforeach

    <div class=" relative w-48 ml-[970px] -mt-56 flex flex-col ">
        <h1 id="result" class=" text-blue-700 h-1 "></h1>
        <button onclick="showNextQuestion()" type="button" id="next-button" class="bg-[#9D00FF] text-white w-24  p-2 mr-4 rounded-lg absolute top-8">Next</button>
        <button type="submit" id="submit-button" class="bg-[#a557d6] text-white w-24  p-2 mr-4 rounded-lg absolute top-8 hidden">Submit</button>

    </div>

</form>
    <script>
        let questions = document.querySelectorAll('.question');
        let nextButton = document.getElementById('next-button')
        let submitButton = document.getElementById('submit-button')
        let answer = document.getElementById('result')
        const firstQuestion = questions[0].style.display = 'flex';
        let questionIndex = 0
        let isChecked = false;

        const showNextQuestion = () => {
            if(isChecked){
                if (questionIndex < questions.length - 1) {
                    questions[questionIndex].style.display = 'none';
                    questionIndex++;
                    questions[questionIndex].style.display = 'flex';
                }
                if( questionIndex === questions.length - 1) {
                    nextButton.style.display = 'none'
                    submitButton.style.display = 'block'
                }
                answer.innerHTML = ''
  
            } else {
                answer.innerHTML = 'Choose the answer'
            }
            isChecked = false
        }

        const result = (radioButton, correct) => {
            let index = 0
            let radioButtons = document.getElementsByName(radioButton.name)
            isChecked = true
            if(radioButton.id === correct[index].id){
                answer.innerHTML = ' Your Answer is Correct'
                index++
            } else {
                answer.innerHTML = ' Your Answer is Incorrect'
            }
            
            radioButtons.forEach((radio) => {
                if (radio != radioButton) {
                    radio.disabled = true;
                }
            })             
        }
        // const submit = (e) => {
        //     var formData = new FormData(e.target)
        //     console.log(formData)
        //     if(isChecked){
        //         e.preventDefault();
        //         console.log(formData)
        //     }
        // }
    </script>

@endsection

                {{-- // axios.post('http://localhost:8000/api/quiz/2/question', {
                //     correct: 'jnj',
                //     radio_button: 'kjn'
                // })
                // .then(function (response) {
                //     // const newComment = `<p><strong>${response.data.name}</strong></p> <p>${response.data.message}</p>`;
                //     console.log(response);
                // })
                // .catch(function (error) {
                //     console.log(error);
                // }); --}}
