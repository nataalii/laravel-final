@props(['name'])

@error($name)
<div class="flex content-center">
    <img src="/images/error.svg" alt="error" class="mr-2 mt-3">
    <p class=" text-system-error text-xs mt-3">{{ $message }}</p>  

</div>

@enderror

