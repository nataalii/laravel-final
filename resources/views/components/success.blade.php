@props(['name'])
@if ($errors->any() && !$errors->has($name))
<div class="relative" id="success">
  <img src="/images/success.svg" alt="success" class=" absolute right-4 -mt-10">
</div> 
@endif