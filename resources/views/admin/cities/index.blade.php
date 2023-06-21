<x-admin-layout>

    <div class="flex justify-between items-center">
      <h1 class="text-xl font-bold mt-3 mb-3">Cities</h1>
      <div class="p-4">
        <Link href="{{ route('admin.city.create') }}" class="py-2 px-3 bg-green-700 text-white rounded hover:bg-green-600">New City</Link>
      </div>
    </div>
  
    <x-splade-table :for="$cities">
      @cell('action', $city)
      <div class="space-x-2">
        <Link href="{{ route('admin.city.edit', $city) }}" class="px-3 py-2 bg-green-600 hover:bg-green-400 text-white rounded">Edit</Link>
        <Link confirm="Are you sure?" href="{{ route('admin.city.destroy', $city) }}" method="DELETE" class="px-3 py-2 bg-red-600 hover:bg-red-400 text-white rounded">Delete</Link>
      </div>
      @endcell
    </x-splade-table>
  </x-admin-layout>