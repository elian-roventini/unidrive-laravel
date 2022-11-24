<section id="search-box" class="bg-white border-x-4 border-y-8 border-y-blue-dark rounded-md md:w-96 h-auto md:h-max float-left mb-8">
    <div class="p-4 lg:col-span-2 text-black">
        <form method="POST" action="{{ route('car.index') }}" class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-6">
            @csrf

            <x-form.select x-col="md:col-span-6 lg:col-span-3" class="mt-3" name="marca" placeholder="Marca">
                <option value="">Marca</option>
                <option value="toyota" @if(old('marca') === 'toyota') selected @endif>Toyota</option>
                <option value="volkswagen" @if(old('marca') === 'volkswagen') selected @endif>Volkswagen</option>
                <option value="ford" @if(old('marca') === 'ford') selected @endif>Ford</option>
                <option value="honda" @if(old('marca') === 'honda') selected @endif>Honda</option>
                <option value="hyundai" @if(old('marca') === 'hyundai') selected @endif>Hyundai</option>
                <option value="nissan" @if(old('marca') === 'nissan') selected @endif>Nissan</option>
                <option value="chevrolet" @if(old('marca') === 'chevrolet') selected @endif>Chevrolet</option>
                <option value="kia" @if(old('marca') === 'kia') selected @endif>Kia</option>
                <option value="mercedes-benz" @if(old('marca') === 'mercedes-benz') selected @endif>Mercedes-Benz</option>
                <option value="bmw" @if(old('marca') === 'bmw') selected @endif>BMW</option>
            </x-form.select>
            <x-form.select x-col="md:col-span-6 lg:col-span-3" class="mt-3" name="modelo" placeholder="Modelo">
                <option value="">Modelo</option>
                <option value="gol" @if(old('modelo') === 'gol') selected @endif>Gol</option>
                <option value="uno" @if(old('modelo') === 'uno') selected @endif>Uno</option>
                <option value="palio" @if(old('modelo') === 'palio') selected @endif>Palio</option>
                <option value="fox" @if(old('modelo') === 'fox') selected @endif>Fox</option>
                <option value="crossfox" @if(old('modelo') === 'crossfox') selected @endif>CrossFox</option>
                <option value="siena" @if(old('modelo') === 'siena') selected @endif>Siena</option>
                <option value="voyage" @if(old('modelo') === 'voyage') selected @endif>Voyage</option>
            </x-form.select>

            <div class="md:col-span-5 inline-flex justify-end mt-3">
                <x-button type="button">Filtrar</x-button>
            </div>
        </form>
    </div>
</section>
