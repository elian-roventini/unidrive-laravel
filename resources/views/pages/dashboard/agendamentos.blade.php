<table>
    <thead class="text-orange">
        <tr>
            <th>Nome solicitante</th>
            <th>Telefone</th>
            <th>E-mail</th>
            <th>Data</th>
            <th>Hora Inicial</th>
            <th>Hora Final</th>
            <th>Carro solicitado</th>
            @if($delete ?? false)
                <th></th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach($agendamentos as $agendamento)
            <tr>
                <td>{{ $agendamento->usuario->nome ?? 'Não Cadastrado' }}</td>
                <td>{{ $agendamento->usuario->telefone ?? 'Não Cadastrado' }}</td>
                <td>{{ $agendamento->usuario->email ?? 'Não Cadastrado' }}</td>
                <td>{{ \Carbon\Carbon::create($agendamento->dt_agendamento)->format('d/m/Y') ?? 'Não Cadastrado' }}</td>
                <td>{{ \Carbon\Carbon::create($agendamento->hr_inicial)->format('H:i') ?? 'Não Cadastrado' }}</td>
                <td>{{ \Carbon\Carbon::create($agendamento->hr_final)->format('H:i') ?? 'Não Cadastrado' }}</td>
                <td>{{ ($agendamento->carro->marca . ' ' . $agendamento->carro->modelo) ?? 'Não Cadastrado' }}</td>
                @if($delete ?? false)
                    <td>
                        <form action="{{ route('schedule.delete', $agendamento->id ?? 1) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </form>
                    </td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
