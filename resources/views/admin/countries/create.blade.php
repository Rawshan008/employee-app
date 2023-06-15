<x-admin-layout>
    <div class="p-5 max-w-2xl mx-auto">
        <x-splade-form :action="route('admin.country.store')">
        <x-splade-input name="name" label="Country Name" class="mt-5" /> 
        <x-splade-input name="country_code" label="Country Code" class="mt-5" /> 
        <x-splade-submit class="mt-5" />
    </x-splade-form>
    </div>
</x-admin-layout>