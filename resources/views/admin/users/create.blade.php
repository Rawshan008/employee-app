<x-admin-layout>
  <h1 class="text-xl font-bold mt-3 mb-3">Edit Users</h1>

  <x-splade-form :action="route('admin.users.store')" class="p-4 bg-white rounded-md space-y-2">
    <x-splade-input name="username" label="Username" />
    <x-splade-input name="first_name" label="First Name" class="mt-5" />
    <x-splade-input name="last_name" label="Last Name" class="mt-5" />
    <x-splade-input name="email" type="email" label="Email" class="mt-5" />
    <x-splade-input name="password" type="password" label="Password" class="mt-5" />
    <x-splade-input name="password_confirmation" type="password" label="Password Confarmation" class="mt-5" />
    <x-splade-submit class="mt-5" />
  </x-splade-form>
</x-admin-layout>