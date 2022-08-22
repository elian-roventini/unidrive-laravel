<div class="mt-6 flex flex-col lg:flex-row lg:justify-between gap-6">
    <div class="space-y-6">
        <h1 class="text-2xl uppercase tracking-wide">Vamos encontrar o carro perfeito para você!</h1>
        <p class="text-xl font-light tracking-wide">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vel sed in mauris, libero magna. Cursus urna sem odio nulla aliquam. Nascetur.</p>
        <x-button>Sobre Nós</x-button>
    </div>
    <div class="min-w-fit max-w-fit h-fit bg-white px-4 shadow sm:rounded-md sm:overflow-hidden">
        <form action="#" method="POST">
            <div class="pt-4 space-y-1">
                <x-form.select>
                    <option selected>Cidade</option>
                    <option value="1">Praia Grande</option>
                    <option value="2">São Vicente</option>
                    <option value="3">Santos</option>
                </x-form.select>                
            </div>
            <div class="grid grid-cols-2 gap-4">
                <x-form.select>
                    <option selected>Marca</option>
                    <option value="1">Chevrolet</option>
                    <option value="2">Fiat</option>
                    <option value="3">Ford</option>
                    <option value="4">Renault</option>
                </x-form.select>
                <x-form.select>
                    <option selected>Modelo</option>
                    <option value="1">Sandero</option>
                    <option value="2">Zafira</option>
                    <option value="3">Golf</option>
                </x-form.select>
            </div>
            <label>Valor</label>
            <div class="grid grid-cols-2 gap-4">
                <x-form.input>De</x-form.input>
                <x-form.input>Até</x-form.input>
            </div>
            <div class="flex gap-4 pb-4">
                <x-button outline class="text-orange border-orange">Pesquisa Avançada</x-button>
                <x-button>Pesquisar</x-button>
            </div>
        </form>
    </div>
</div>
