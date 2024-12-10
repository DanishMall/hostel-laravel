<div x-data="{ isOn: $wire.entangle('{{ $attributes->wire('model')->value() }}') }">
    <button
        type="button"
        {{ $attributes->merge([
            'class' => 'relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2'
        ]) }}
        :class="isOn ? 'bg-green-500' : 'bg-gray-200'"
        @click="isOn = !isOn"
        role="switch"
        :aria-checked="isOn"
    >
        <span
            aria-hidden="true"
            class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"
            :class="isOn ? 'translate-x-5' : 'translate-x-0'"
        ></span>
    </button>
</div>
