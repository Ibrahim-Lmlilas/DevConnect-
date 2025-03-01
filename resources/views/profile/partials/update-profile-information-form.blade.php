<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div>
            <x-input-label for="skills" :value="__('Skills')" />
            <x-text-input id="skills" name="skills" type="text" class="mt-1 block w-full" :value="old('skills', $user->skills)" autocomplete="skills" />
            <x-input-error class="mt-2" :messages="$errors->get('skills')" />
        </div>

        <div>
            <x-input-label for="programming_languages" :value="__('Programming Languages')" />
            <x-text-input id="programming_languages" name="programming_languages" type="text" class="mt-1 block w-full" :value="old('programming_languages', $user->programming_languages)" autocomplete="programming_languages" />
            <x-input-error class="mt-2" :messages="$errors->get('programming_languages')" />
        </div>

        <div>
            <x-input-label for="projects" :value="__('Projects')" />
            <x-text-input id="projects" name="projects" type="text" class="mt-1 block w-full" :value="old('projects', $user->projects)" autocomplete="projects" />
            <x-input-error class="mt-2" :messages="$errors->get('projects')" />
        </div>

        <div>
            <x-input-label for="certifications" :value="__('Certifications')" />
            <x-text-input id="certifications" name="certifications" type="text" class="mt-1 block w-full" :value="old('certifications', $user->certifications)" autocomplete="certifications" />
            <x-input-error class="mt-2" :messages="$errors->get('certifications')" />
        </div>

        <div>
            <x-input-label for="github_url" :value="__('GitHub URL')" />
            <x-text-input id="github_url" name="github_url" type="text" class="mt-1 block w-full" :value="old('github_url', $user->github_url)" autocomplete="github_url" />
            <x-input-error class="mt-2" :messages="$errors->get('github_url')" />
        </div>

        <div>
            <x-input-label for="image" :value="__('Profile Image')" />
            <input id="image" name="image" type="file" class="mt-1 block w-full" autocomplete="image" />
            <x-input-error class="mt-2" :messages="$errors->get('image')" />
        </div>

        <div>
            <x-input-label for="industry" :value="__('Industry')" />
            <x-text-input id="industry" name="industry" type="text" class="mt-1 block w-full" :value="old('industry', $user->industry)" autocomplete="industry" />
            <x-input-error class="mt-2" :messages="$errors->get('industry')" />
        </div>

        <div>
            <x-input-label for="banner" :value="__('Banner URL')" />
            <x-text-input id="banner" name="banner" type="text" class="mt-1 block w-full" :value="old('banner', $user->banner)" autocomplete="banner" />
            <x-input-error class="mt-2" :messages="$errors->get('banner')" />
        </div>

        <div>
            <x-input-label for="bio" :value="__('Bio')" />
            <x-text-input id="bio" name="bio" type="text" class="mt-1 block w-full" :value="old('bio', $user->bio)" autocomplete="bio" />
            <x-input-error class="mt-2" :messages="$errors->get('bio')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
