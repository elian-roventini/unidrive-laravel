@props([
    'carro' => null
])

<div class="flex justify-center text-black">
    <div class="rounded-lg shadow-lg bg-blue-dark max-w-sm">
       <div class="relative">
            @if(request()->routeIs('dashboard.index'))
                <button class="absolute top-0 right-0 bg-red-500 text-white px-2 rounded hover:bg-red-800 m-2" x-data @click="deleteCar({{ $carro->id ?? null }})">x</button>
            @endif
            <a href="{{ route('car.show', $carro->id) ?? '' }}">
                <img class="rounded-t-lg" src="{{ $carro->imagem ?? 'https://www.cnnbrasil.com.br/wp-content/uploads/sites/12/2021/11/VW-Gol.jpg?w=876&h=484&crop=1' }}" alt="Foto do carro"/>
            </a>
       </div>
        <div class="px-4">
            <div class="flex justify-between py-6">
                <a href="{{ route('car.show', $carro->modelo) }}">
                    <h5 class="text-md font-bold uppercase text-white">{{ $carro->marca ?? '' }} {{ $carro->modelo ?? '' }}</h5>
                </a>
                <p class="text-md font-bold text-orange">R$ {{ $carro->valor ?? '' }}</p>
            </div>
            <div class="py-3 border-t border-gray-800">
                <p class="text-sm font-thin text-gray-400">{{ $carro->descricao ?? '' }}</p>
                <div class="flex justify-between mt-2">
                    <p class="text-xs font-thin text-gray-500">{{ $carro->ano ?? '' }}</p>
                    <p class="text-xs font-thin text-gray-500">{{ $carro->concessionaria->nomeFantasia ?? '' }}</p>
                    <p class="text-xs font-thin text-gray-500">{{ $carro->quilometragem ?? '' }} KM</p>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function deleteCar(id) {
            if (id === null) return;

            Swal.fire({
                title: 'Tem certeza que deseja apagar o carro?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                confirmButtonText: 'Apagar',
                cancelButtonColor: '#3085d6',
                cancelButtonText: `Não apagar`,
            })
                .then(async (result) => {
                    if (result.isConfirmed) {
                        let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                        let response = await fetch("/carro/" + id, {
                            headers: {
                                "Content-Type": "application/json",
                                "Accept": "application/json, text-plain, */*",
                                "X-Requested-With": "XMLHttpRequest",
                                "X-CSRF-TOKEN": token
                            },
                            body: JSON.stringify({
                                "_method": "DELETE"
                            }),
                            credentials: "same-origin",
                            method: "POST",
                        })

                        if (response.ok) {
                            Swal.fire(
                                'Deletado!',
                                'Carro deletado.',
                                'success'
                            )
                        } else {
                            Swal.fire(
                                'Erro!',
                                'Carro não pode ser deletado.',
                                'error'
                            )
                        }
                    } else if (result.isDenied) {}
                }
            )
        }
    </script>
@endpush
