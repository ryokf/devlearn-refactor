{{-- <section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)"
                required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)"
                required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section> --}}
<section>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                <div class="text-gray-600">
                    <p class="font-medium text-lg">Personal Details</p>
                    <p>Please fill out all the fields.</p>
                </div>
                <div class="lg:col-span-2">
                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-6">
                        <div class="md:col-span-6">
                            <label for="name">Full Name</label>
                            <input type="text" name="name" id="name"
                                class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ $user->name }}" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div class="md:col-span-6">
                            <label for="email">Email Address</label>
                            <input type="email" name="email" id="email"
                                class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ $user->email }}"
                                placeholder="email@domain.com" />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                                <div>
                                    <p class="text-sm mt-2 text-gray-800">
                                        {{ __('Your email address is unverified.') }}

                                        <button form="send-verification"
                                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            {{ __('Click here to re-send the verification email.') }}
                                        </button>
                                    </p>

                                    @if (session('status') === 'verification-link-sent')
                                        <p class="mt-2 font-medium text-sm text-green-600">
                                            {{ __('A new verification link has been sent to your email address.') }}
                                        </p>
                                    @endif
                                </div>
                            @endif
                        </div>

                        <div class="md:col-span-3">
                            <label for="occupation">Ocupation</label>
                            <input type="text" name="occupation" id="occupation"
                                class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ $user->occupation }}"
                                placeholder="" />
                        </div>
                        <div class="md:col-span-3">
                            <label for="office">Office / School</label>
                            <input type="text" name="office" id="office"
                                class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ $user->office }}"
                                placeholder="" />
                        </div>


                        <div class="md:col-span-6">
                            <label for="bio">Bio</label>
                            <input type="text" name="bio" id="bio"
                                class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ $user->bio }}" />
                        </div>

                        <div class="md:col-span-6 text-right">
                            <div class="inline-flex items-end">
                                @if (session('status') === 'profile-updated')
                                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600">{{ __('Saved.') }}</p>
                                @endif
                                <button type="submit"
                                    class="bg-slate-800 hover:bg-slate-950 text-white font-bold py-2 px-4 rounded">Submit</button>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    </form>
</section>
