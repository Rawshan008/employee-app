<x-admin-layout>
  <h1>Users</h1>

  <x-splade-table :for="$users">
    @cell('action', $user)
    <Link href="{{ route('admin.users.edit', $user) }}" class="px-3 py-2 bg-green-600 hover:bg-green-400 text-white rounded">Edit</Link>
    @endcell
  </x-splade-table>
</x-admin-layout>