@props(['active'])

@php
    $baseStyles = 'display: inline-flex; align-items: center; padding: 0.25rem 0.75rem; font-size: 1rem; font-weight: 500; line-height: 1.25; transition: all 0.15s ease-in-out; border-bottom-width: 2px;';
    $activeStyles = $active ?? false
        ? 'color: #4F46E5; border-color: #4F46E5;' // Indigo color for active
        : 'color: #6B7280; border-color: transparent;'; // Gray color for inactive
    $hoverStyles = 'hover-color: #4F46E5; hover-border-color: #4F46E5;';
@endphp

<a {{ $attributes->merge(['style' => "{$baseStyles} {$activeStyles}"]) }} onmouseover="this.style.color='#4F46E5'; this.style.borderColor='#4F46E5';" onmouseout="this.style.color='{{ $active ? '#4F46E5' : '#6B7280' }}'; this.style.borderColor='{{ $active ? '#4F46E5' : 'transparent' }}';">
    {{ $slot }}
</a>
