<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista de usuários') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="mb-4">{{ __('Olá ') }}<strong>{{ Auth::user()->name }}</strong></p>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="p-3 bg-gray-100 dark:bg-gray-700 rounded-lg mb-4">
                        {{ $users->links() }}
                    </div>
                    <div class="overflow-x-auto">
                        <table class="table-auto min-w-full">
                            <thead class="text-left bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    <th class="text-center">Nível</th>
                                    <th class="p-4">Nome</th>
                                    <th>E-mail</th>
                                    <th>Data de cadastro</th>
                                    @can('level')
                                        <th class="text-center">Ações</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <td class="text-center">
                                            @if ($user->level === 'admin')
                                                <i class="fa-solid fa-user-tie"></i>
                                            @else
                                                <i class="fa-solid fa-user"></i>
                                            @endif
                                        </td>
                                        <td class="p-2 px-4">{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        @can('level')
                                            <td class="text-center">
                                                <a href="{{ route('user.edit', ['id' => $user->id]) }}"
                                                    class="text-blue-500 dark:text-blue-400">Editar</a>
                                            </td>
                                        @endcan
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
