<x-layout>
    <x-slot:pageTitle>Registration</x-slot:pageTitle>
    <x-slot:mainContent>
        <section class="body-padding mx-auto mt-10 mb-44">
            <div class="flex justify-center items-center gap-2">
                <x-util.button-v1 text="Registration" isActive />
                <x-util.button-v1 text="Login" link="/login" />
            </div>
            <form method="POST" action="/register" class="w-[500px] m-auto" x-data="{ nameHasError: true, emailHasError: true, passwordHasError: true }">
                @csrf
                <x-util.input label="Your Name" name="name" placeholder="Enter your name..." autofocus required
                    x-on:input.change="nameHasError = false" />
                @error('name')
                    <p class="text-red-500" x-show="nameHasError">{{ $message }}</p>
                @enderror
                <x-util.input label="Your Email" name="email" placeholder="abc@example.com" type="email" required
                    x-on:input.change="emailHasError = false" />
                @error('email')
                    <p class="text-red-500" x-show="emailHasError">{{ $message }}</p>
                @enderror
                <x-util.input label="Password" name="password" placeholder="*******" type="password" required
                    x-on:input.change="passwordHasError = false" />
                @error('password')
                    <p class="text-red-500" x-show="passwordHasError">{{ $message }}</p>
                @enderror
                <x-util.submit-button text="Sign Up" fullwidth />
            </form>

        </section>
    </x-slot:mainContent>
</x-layout>
