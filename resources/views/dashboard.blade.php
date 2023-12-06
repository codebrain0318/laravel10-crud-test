<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>

                <form method="POST" action="{{ route('apikeys.store') }}" class="p-6 text-gray-900">
                    @csrf

                    <div class="flex">
                        <x-input-label for="apikey" :value="__('API Key')" />
                        <x-text-input id="apikey" class="block mt-1 w-full" type="text" name="apikey" :value="old('apikey')" required autocomplete="apikey" />
                        <x-input-error :messages="$errors->get('apikey')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button class="ms-4">
                            {{ __('Create Key') }}
                        </x-primary-button>
                    </div>
                </form>

                <div  class="p-6 text-gray-900">
                    <div class="p-2 border border-gray-300 rounded-md">
                        @foreach ($apikeys as $apikey)
                            <div class="flex justify-between items-center py-1">
                                <div>{{ $apikey->apikey }}</div>
                                <div class="flex gap-2">
                                    <form method="GET" action="{{ route('apikeys.edit', $apikey->id) }}">
                                        @csrf
    
                                        <x-third-button class="ms-4">
                                            {{ __('Edit') }}
                                        </x-third-button>
                                    </form>
                                    <form method="POST" action="{{ route('apikeys.destroy', $apikey->id) }}">
                                        @csrf
                                        @method('delete')
                                            
                                        <x-third-button class="ms-4">
                                            {{ __('Delete') }}
                                        </x-third-button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
