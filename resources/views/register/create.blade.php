@extends('login-layout')
@section('content')

<div class=" mt-24">
  <h2 class=" text-2xl lg:text-3xl font-black tracking-tight text-gray-900">Welcome to Quiz website!</h2>
  <h3 class=" text-base lg:text-xl text-dark-60 mt-4">Please enter required info to sign up</h3>
</div>
<div class="mt-8">
  <form  method="POST" action="{{ route('register.store')}}" class=" sm:w-[340px] lg:w-[400px]">
    @csrf
    <div class=" mt-5">
      <label for="username" class="block text-xs font-bold text-dark-100">Enter your Username</label>
      <x-input name=username type=text placeholder="username" err=username/>
      <div class="relative" id="username-success" style="visibility: hidden">
        <img src="/images/success.svg" alt="success" class=" absolute right-4 -mt-10">
      </div> 
      <x-success name=username/>
      <x-error name=username/> 

      
    </div>
    <div class="mt-5">
      <label for="email" class="block text-xs font-bold text-dark-100 ">Enter your Email</label>
      <x-input name=email type=email placeholder="email" err=email/>
      <x-success name=email/>
      <x-error name=email/>
    </div>

    <div class="mt-5" id="password-div">
      <label for="password" class="block text-xs font-bold text-dark-100">Enter your Password</label>
      <x-input name=password type=password placeholder="password" err=password/>
      <x-success name=password/>
      <x-error name=password/>
    </div>

    <div class="mt-5 mb-5" id="password-confirmation-div">
      <label for="password_confirmation" class="block text-xs font-bold text-dark-100">Repeat your Password</label>
      <x-input name=password_confirmation type=password placeholder="password" err=password />
      <x-success name=password/>
      <x-error name=password/>
    </div>

      <div class="mt-5">
        <button type="submit" class=" h-14 flex w-full justify-center rounded-md bg-[#9D00FF]  py-2 px-4 font-bold pt-4 text-white shadow-xs focus:outline-none focus:ring-2 ">
          Sign up
        </button>
      </div>
      <p class=" text-center mt-5 text-dark-60">Already have an account?
        <a href="{{ route('login')}}" class="text-dark-100 font-black">Log in</a>
      </p>



  </form>
</div>

@endsection
