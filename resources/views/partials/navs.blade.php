<div class="row row-cols-md-3 row-cols-lg-6 pt-4">


  @forelse ($categories_top5 as $category)
    <div class="col">


      {{-- Minimal with title, text and icon --}}
      <x-adminlte-info-box title="" text="{{ $category->name }}" icon="far fa-lg fa-star" />


    </div>

  @empty
    <div class="col">
      {{-- Minimal with title, text and icon --}}
      <x-adminlte-info-box title="Create post" text="..." icon="far fa-lg fa-star" class="shadow border" />
    </div>
  @endforelse


  <div class="col">
    {{-- Minimal with title, text and icon --}}
    <x-adminlte-info-box title="" text="More ..." icon="far fa-lg fa-star" class="shadow border" />
  </div>



</div>
