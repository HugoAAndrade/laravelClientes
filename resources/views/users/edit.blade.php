<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edição de usuário') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 mb-4">
                    <p class="mb-4">Editando nível de acesso do usuário <strong>{{ $user->name }}</strong></p>
                    <p>Nível de acesso atual: <strong class="capitalize">{{ $user->level }}</strong></p>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100 mb-4">
                    <form action="{{ route('user.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <label for="level" class="block mb-2 dark:text-gray-100">Selecione o nível</label>
                        <select name="level" required
                            class="py-1 px-8 rounded bg-gray-100 dark:bg-gray-700 dark:text-gray-100">
                            <option value="" selected disabled>Selecione uma opção</option>
                            <option value="user">Usuário comum</option>
                            <option value="admin">Administrador</option>
                        </select>
                        <button type="submit" class="bg-blue-500 text-white rounded py-1.5 px-4 mt-4">
                            <i class="fa-regular fa-floppy-disk mr-2"></i>
                            Salvar alterações
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
