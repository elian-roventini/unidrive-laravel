<form class="grid md:w-1/2 bg-blue-dark text-white p-4 rounded-lg gap-x-4" method="POST" action="{{ route('car.store') }}">
    @csrf
    <h2 class="text-md tracking-wider font-bold uppercase mb-6 col-span-6">Cadastrar Carro</h2>

    <x-form.select x-col="col-span-6 sm:col-span-3" class="mt-3" name="marca">
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
    <x-form.select x-col="col-span-6 sm:col-span-3" class="mt-3" name="modelo">
        <option value="">Modelo</option>
        <option value="gol" @if(old('modelo') === 'gol') selected @endif>Gol</option>
        <option value="uno" @if(old('modelo') === 'uno') selected @endif>Uno</option>
        <option value="palio" @if(old('modelo') === 'palio') selected @endif>Palio</option>
        <option value="fox" @if(old('modelo') === 'fox') selected @endif>Fox</option>
        <option value="crossfox" @if(old('modelo') === 'crossfox') selected @endif>CrossFox</option>
        <option value="siena" @if(old('modelo') === 'siena') selected @endif>Siena</option>
        <option value="voyage" @if(old('modelo') === 'voyage') selected @endif>Voyage</option>
    </x-form.select>
    <x-form.select x-col="col-span-6 sm:col-span-3" class="mt-3" name="ano">
        <option value="">Ano</option>
        <option value="2023" @if(old('ano') === '2023') selected @endif>2023</option>
        <option value="2022" @if(old('ano') === '2022') selected @endif>2022</option>
        <option value="2021" @if(old('ano') === '2021') selected @endif>2021</option>
        <option value="2020" @if(old('ano') === '2020') selected @endif>2020</option>
        <option value="2019" @if(old('ano') === '2019') selected @endif>2019</option>
        <option value="2018" @if(old('ano') === '2018') selected @endif>2018</option>
        <option value="2017" @if(old('ano') === '2017') selected @endif>2017</option>
        <option value="2016" @if(old('ano') === '2016') selected @endif>2016</option>
        <option value="2015" @if(old('ano') === '2015') selected @endif>2015</option>
        <option value="2014" @if(old('ano') === '2014') selected @endif>2014</option>
        <option value="2013" @if(old('ano') === '2013') selected @endif>2013</option>
        <option value="2012" @if(old('ano') === '2012') selected @endif>2012</option>
        <option value="2011" @if(old('ano') === '2011') selected @endif>2011</option>
        <option value="2010" @if(old('ano') === '2010') selected @endif>2010</option>
    </x-form.select>
    <x-form.select x-col="col-span-6 sm:col-span-3" class="mt-3" name="cor">
        <option value="">Cor</option>
        <option value="azul" @if(old('cor') === 'azul') selected @endif>Azul</option>
        <option value="vermelho" @if(old('cor') === 'vermelho') selected @endif>Vermelho</option>
        <option value="amarelo" @if(old('cor') === 'amarelo') selected @endif>Amarelo</option>
        <option value="branco" @if(old('cor') === 'branco') selected @endif>Branco</option>
        <option value="preto" @if(old('cor') === 'preto') selected @endif>Preto</option>
        <option value="cinza" @if(old('cor') === 'cinza') selected @endif>Cinza</option>
        <option value="marrom" @if(old('cor') === 'marrom') selected @endif>Marrom</option>
    </x-form.select>

    <x-form.input x-col="col-span-6" name="documentacao" placeholder="Documentação" />
    <x-form.input x-col="col-span-2" name="placa" placeholder="Placa" x-example="AAA0A00" />
    <x-form.input x-col="col-span-2" name="quilometragem" placeholder="Quilometragem" />
    <x-form.input x-col="col-span-2" name="renovam" placeholder="Renavam" x-example="12341234561" />
    <x-form.input x-col="col-span-6" name="valor" placeholder="Valor R$" />

    <div class="col-span-6 inline-flex justify-end mt-3">
        <x-button type="button">Cadastrar</x-button>
    </div>
</form>