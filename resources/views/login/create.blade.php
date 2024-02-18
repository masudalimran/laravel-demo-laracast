<x-layout>
    <x-slot:pageTitle>Login</x-slot:pageTitle>
    <x-slot:mainContent>
        <section class="body-padding mx-auto mt-10 mb-44">
            <div class="flex justify-center items-center gap-2">
                <x-util.button-v1 text="Registration" link="/register" />
                <x-util.button-v1 text="Login" isActive />
            </div>
            <form method="POST" action="/login" class="w-[500px] m-auto">
                @csrf
                <x-util.input label="Your Email" name="email" placeholder="abc@example.com" type="email" required
                    autofocus />
                <x-util.input-password label="Password" name="password" placeholder="*******" />
                <div class="mt-2 flex gap-2 items-center">
                    <input type="checkbox" name="remember" checked class="h-4 w-4 cursor-pointer">
                    <label for="remember" class="">Remember Me</label>
                </div>
                <x-util.submit-button text="Login" fullwidth />
            </form>

        </section>
    </x-slot:mainContent>
</x-layout>
