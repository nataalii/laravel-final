@vite('resources/css/app.css')
<!DOCTYPE html>
<title>Quizes</title>

<body>
    <img src="/images/logo.jpg" alt="quiz" class="absolute lg:mx-24  mx-5 w-40 mt-10 rounded-3xl">
    <div class="flex">
        <div class=" mt-3 flex flex-1 flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24 h-full">
          <div class="mx-auto w-full">
            @yield('content')

          </div>
        </div>
        <div class="hidden flex-1 lg:block relative ">
          <img class="object-cover h-screen right-0 absolute" src="/images/quiz2.png" alt="background-image" >
        </div>
      </div>
    
</body>
</html>