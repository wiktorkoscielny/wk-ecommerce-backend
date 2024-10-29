@props(['percentage', 'color'])

<div class="relative w-1/3 h-12">
    <div class="absolute inset-0 bg-gray-200 rounded-full"></div>
    <div x-data="{ progress: 0 }"
         x-init="progress = {{ $percentage }}"
         :style="'width: ' + progress + '%'"
         class="absolute inset-0 bg-{{ $color }}-500 rounded-full transition-all duration-1000 ease-out"></div>
</div>
