@props(['name', 'type', 'placeholder', 'err'])
<div class="mt-1">
    <input id="{{ $name }}" name="{{ $name }}" type="{{ $type }}" value="{{ old($name) }}" placeholder="{{$placeholder }}"
    class="block w-full appearance-none rounded-md border px-3 h-14 placeholder-gray-400 
    shadow-xs focus:border-brand-primary focus:outline-none focus:ring-brand-primary focus:ring-0 sm:text-sm focus:shadow-input
    {{  !$errors->any() ? " border-dark-20" : ($errors->has($err) ? "border-system-error" : "border-system-success") }}">
</div>

