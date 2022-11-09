@props([
    'image' => '',
    'name' => '',
    'price' => '',
    'description' => '',
    'date' => '',
    'place' => '',
    'distance' => '',
])

<div class="flex justify-center text-black">
    <div class="rounded-lg shadow-lg bg-blue-dark max-w-sm">
        <img class="rounded-t-lg" src="{{ $image }}" alt=""/>
        <div class="px-4">
            <div class="flex justify-between py-6">
                <h5 class="text-md font-bold uppercase">{{ $name }}</h5>
                <p class="text-md font-bold text-orange">{{ $price }}</p>
            </div>
            <div class="py-3 border-t border-gray-800">
                <p class="text-sm font-thin text-gray-400">{{ $description }}</p>
                <div class="flex justify-between mt-2">
                    <p class="text-xs font-thin text-gray-700">{{ $date }}</p>
                    <p class="text-xs font-thin text-gray-700">{{ $place }}</p>
                    <p class="text-xs font-thin text-gray-700">{{ $distance }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
