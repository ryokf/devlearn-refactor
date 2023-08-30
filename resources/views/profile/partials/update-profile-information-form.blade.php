<section>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        <div class="p-4 px-4 mb-6 bg-white rounded shadow-lg md:p-8">
            <div class="grid grid-cols-1 gap-4 text-sm gap-y-2 lg:grid-cols-3">
                <div class="text-gray-600">
                    <p class="text-lg font-medium">Personal Details</p>
                    <p>Please fill out all the fields.</p>
                </div>
                <div class="lg:col-span-2">
                    <div class="grid grid-cols-1 gap-4 text-sm gap-y-2 md:grid-cols-6">
                        <div class="md:col-span-6">
                            <label for="name">Full Name</label>
                            <input type="text" name="name" id="name"
                                class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="{{ $user->name }}" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div class="md:col-span-6">
                            <label for="email">Email Address</label>
                            <input type="email" name="email" id="email"
                                class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="{{ $user->email }}"
                                placeholder="email@domain.com" />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                                <div>
                                    <p class="mt-2 text-sm text-gray-800">
                                        {{ __('Your email address is unverified.') }}

                                        <button form="send-verification"
                                            class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            {{ __('Click here to re-send the verification email.') }}
                                        </button>
                                    </p>

                                    @if (session('status') === 'verification-link-sent')
                                        <p class="mt-2 text-sm font-medium text-green-600">
                                            {{ __('A new verification link has been sent to your email address.') }}
                                        </p>
                                    @endif
                                </div>
                            @endif
                        </div>

                        <div class="md:col-span-3">
                            <label for="occupation">Ocupation</label>
                            <input type="text" name="occupation" id="occupation"
                                class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="{{ $user->occupation }}"
                                placeholder="" />
                        </div>
                        <div class="md:col-span-3">
                            <label for="office">Office / School</label>
                            <input type="text" name="office" id="office"
                                class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="{{ $user->office }}"
                                placeholder="" />
                        </div>


                        <div class="md:col-span-6">
                            <label for="bio">Bio</label>
                            <input type="text" name="bio" id="bio"
                                class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="{{ $user->bio }}" />
                        </div>

                        <div class="text-right md:col-span-6">
                            <div class="inline-flex items-end">
                                @if (session('status') === 'profile-updated')
                                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600">{{ __('Saved.') }}</p>
                                @endif
                                <button type="submit"
                                    class="px-4 py-2 font-bold text-white rounded bg-slate-800 hover:bg-slate-950">Submit</button>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    </form>
</section>
