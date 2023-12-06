<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit API Key') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('apikeys.update', $apikey->id) }}" class="p-6 text-gray-900">
                    @csrf
                    @method('put')

                    <div class="flex">
                        <x-input-label for="apikey" :value="__('API Key')" />
                        <x-text-input id="apikey" :value="$apikey->apikey" class="block mt-1 w-full" type="text" name="apikey" required autocomplete="apikey" />
                        <x-input-error :messages="$errors->get('apikey')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button class="ms-4">
                            {{ __('Update Key') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
