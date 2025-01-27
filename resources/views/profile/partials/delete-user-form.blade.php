<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Elimina account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Una volta che il tuo account sarà eliminato tutte le sue risorse e i suoi dati saranno cancellati per sempre. Prima di eliminare il tuo account, ti invitiamo a scaricare qualsiasi dato o informazione che desideri mantenere.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Elimina account') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Sei sicuro di voler eliminare il tuo account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Una volta che il tuo account sarà eliminato tutte le sue risorse e i suoi dati saranno cancellati per sempre. Inserisci la tua password per confermare la eliminazione del tuo account.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="Password" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="Password"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancella') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('Elimina account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
