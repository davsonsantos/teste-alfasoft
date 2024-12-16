<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $user->name }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">


                    <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Dados do Usuário:</h2>
                    <ul class="max-w-md space-y-1 text-gray-500 list-none list-inside dark:text-gray-400">
                        <li>
                            Nome: <strong>{{ $user->name }}</strong>
                        </li>
                        <li>
                            Email: <strong>{{ $user->email }}</strong>
                        </li>
                        <li>
                            Contato: <strong>{{ $user->contact }}</strong>
                        </li>
                    </ul>


                    <div class="grid grid-cols-5 grid-rows-1 gap-4">
                        <div class="col-span-2 col-start-4 row-start-1 mt-6 text-end">
                            @auth
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                    <input name="_method" type="hidden" value="DELETE">
                                    @csrf
                                    <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?')"
                                        href="{{ route('users.destroy', $user->id) }}"
                                        class="text-red-900 bg-white border border-red-300 focus:outline-none hover:bg-red-100 focus:ring-4 focus:ring-red-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-800 dark:text-white dark:border-red-600 dark:hover:bg-red-700 dark:hover:border-red-600 dark:focus:ring-red-700">Excluir</button>
                                </form>
                            @endauth
                        </div>
                        <div class="col-span-3 col-start-1 row-start-1 mt-5">
                            @auth
                                <a href="{{ route('users.edit', $user->id) }}"
                                    class="focus:outline-none text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">Editar</a>
                            @endauth
                            <a href="{{ route('users.index') }}"
                                class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Voltar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
