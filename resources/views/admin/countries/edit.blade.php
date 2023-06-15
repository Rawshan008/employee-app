<x-admin-layout>
    <h1 class="text-xl font-bold mt-3 mb-3">Edit Country</h1>
  
    <x-splade-form :default="$country" :action="route('admin.country.update', $country)" method="PUT" class="p-4 bg-white rounded-md space-y-2">
      <x-splade-input name="name" label="Country Name" />
      <x-splade-input name="country_code" label="Country Code" class="mt-5" />
      <x-splade-submit class="mt-5" />
    </x-splade-form>
  </x-admin-layout>