@extends('login-layout')
@section('content')

<div class="mt-40">
    <h2 class=" font-black text-2xl lg:text-3xl tracking-tight text-gray-900">Welcome back!</h2>
    <h3 class=" text-base lg:text-xl text-dark-60 mt-4">Welcome back! Please enter your details</h3>
 </div>
 <div>
 <form  method="POST" action="{{ route('login.store') }}" id="form" class="space-y-6 sm:w-340px lg:w-[400px]">
   @csrf
    <div class="space-y-1">
      <label for="email" class="block text-xs font-bold text-dark-100">Enter you Email</label>
      <input id="email" name="email" type="email" value="{{ old('email') }}" placeholder="email"
      class="block w-full appearance-none rounded-md border px-3 h-14 placeholder-gray-400 
      shadow-xs focus:border-brand-primary focus:outline-none focus:ring-brand-primary focus:ring-0 sm:text-sm focus:shadow-input">    
      <x-success name="email"/>
      <x-error name="email"/> 
      
    </div>
   <div class="space-y-1">
     <label for="password" class="block text-xs font-bold text-dark-100">Enter your password</label>
    <input id="password" name="password" type="password" value="{{ old('password') }}" placeholder="password"
    class="block w-full appearance-none rounded-md border px-3 h-14 placeholder-gray-400 
    shadow-xs focus:border-brand-primary focus:outline-none focus:ring-brand-primary focus:ring-0 sm:text-sm focus:shadow-input">
    <x-error name=password/>
   </div>

   <div>
     <button type="submit" class=" mt-5 h-14 flex w-full justify-center rounded-md bg-[#9D00FF] py-2 px-4 font-bold pt-4 text-white shadow-xs focus:outline-none focus:ring-2 ">
         Log in
     </button>
   </div>
   <p class=" text-center text-dark-60">Don't have account?
     <a href="{{ route('register.create') }}" class="text-dark-100 font-bold">Sign up </a>
   </p>
 </form>
</div>

@endsection