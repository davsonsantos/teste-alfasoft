<div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
    <div class="sm:col-span-2">
        <div>
            <x-input-label for="name" value="Nome" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                value="{{ $user->name ?? old('name') }}" autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
    </div>
    <div class="w-full">
        <div>
            <x-input-label for="email" value="E-mail" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                value="{{ $user->email ?? old('email') }}" autofocus autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
    </div>
    <div class="w-full">
        <div>
            <x-input-label for="contact" value="Contato" />
            <x-text-input id="contact" class="block mt-1 w-full" type="text" name="contact" maxlength="9"
                value="{{ $user->contact ?? old('contact') }}" autofocus autocomplete="contact" />
            <x-input-error :messages="$errors->get('contact')" class="mt-2" />
        </div>
    </div>
</div>
