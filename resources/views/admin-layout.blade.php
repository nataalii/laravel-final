<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <script defer src="https://unpkg.com/axios/dist/axios.min.js"></script>
   @vite('resources/css/app.css')
   <title>Quizzez</title>
</head>
<body class=" bg-[#CBC3E3]">
   <header class="bg-white border-b border-border h-25 ">
       <div class="flex w-96 lg:w-[1600px] lg:m-auto space-x-6 justify-between p-5">
           <div>
               <img src="{{ asset('images/logo.jpg') }}" alt="logo" class="w-40 rounded-2xl ">
           </div>
           <div class="flex items-center ">
                <a href="/quizes">
                    <button class="bg-[#9D00FF] text-white p-2 mr-4 rounded-lg"> My Quizes</button>
                </a>
                <h4 class="font-bold mr-2"> Hello {{ auth()->user()->username }}!</h4>   
               <form method="POST" action="{{ route('logout') }}" class="pl-5 outline-none bg-transparent font-medium">
                   @csrf
                   <button type="submit">Log out</button>
                </form> 
           </div>
       </div>
   </header>
    <section class="">
       @yield('slot')
    </section>
</body>
</html>