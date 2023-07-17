<x-admin-layout>
  <h1 class="text-xl font-bold mt-3 mb-3">Edit Roles</h1>

  <x-splade-form :default="$role" :action="route('admin.roles.update', $role)" method="PUT" class="p-4 bg-white rounded-md space-y-2">
    <x-splade-input name="name" label="Name" />
    <x-splade-submit class="mt-5" />
  </x-splade-form>
</x-admin-layout>