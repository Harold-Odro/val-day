@props(['src' => asset('images/rose.png'), 'size' => 64])

<img
    src="{{ $src }}"
    alt="Rose"
    width="{{ $size }}"
    height="{{ $size }}"
    style="transition: all 3s ease-out;"
/>
