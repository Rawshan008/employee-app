<div class="min-h-screen bg-gray-100">
  @include('layouts.navigation')


  <div class="flex space-x-4">
    @hasrole('admin')
    <Sidebar />
    @endhasrole

    <!-- Page Content -->
    <main class="flex-1">
      <div class="max-w-6xl mx-auto">
        {{ $slot }}
      </div>
    </main>
  </div>


</div>