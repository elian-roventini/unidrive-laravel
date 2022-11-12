<section id="search-box" class="bg-white border-x-4 border-y-8 border-y-blue-dark rounded-md md:w-96 h-auto md:h-max float-left mb-8">
    <div class="p-4 lg:col-span-2 text-black">
        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-6">
            <x-form.select x-col="md:col-span-6 lg:col-span-3" class="mt-3" name="marca" placeholder="Marca">
                <option value="">Marca</option>
            </x-form.select>
            <x-form.select x-col="md:col-span-6 lg:col-span-3" class="mt-3" name="modelo" placeholder="Modelo">
                <option value="">Modelo</option>
            </x-form.select>
            <x-form.select x-col="md:col-span-6 lg:col-span-3" class="mt-3" name="ano" placeholder="Ano">
                <option value="">Ano</option>
            </x-form.select>
            <x-form.select x-col="md:col-span-6 lg:col-span-3" class="mt-3" name="cor" placeholder="Cor">
                <option value="">Cor</option>
            </x-form.select>
            <x-form.select x-col="md:col-span-6 lg:col-span-3" class="mt-3" name="tipo" placeholder="Tipo">
                <option value="">Tipo</option>
            </x-form.select>
            <x-form.select x-col="md:col-span-6 lg:col-span-3" class="mt-3" name="estado" placeholder="Estado">
                <option value="">Estado</option>
            </x-form.select>
            <x-form.select x-col="md:col-span-6 " class="mt-3" name="cidade" placeholder="Cidade">
                <option value="">Cidade</option>
            </x-form.select>

            <div class="md:col-span-5 inline-flex justify-end mt-3">
                <x-button type="button">Filtrar</x-button>
            </div>
        </div>
    </div>
</section>
