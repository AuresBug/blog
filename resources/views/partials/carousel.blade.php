<div class="row pt-4">
  <div class="col">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="https://picsum.photos/id/{{ rand(1, 1000) }}/1080/300" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block rounded">
            <h2 class="text-bold text-light  text-shadow">First slide label</h2>
            <h5 class="text-light text-shadow">Some representative placeholder content for the first slide.</h5>
          </div>
        </div>
        <div class="carousel-item">
          <img src="https://picsum.photos/id/{{ rand(1, 1000) }}/1080/300" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h2 class="text-bold text-light text-shadow">Second slide label</h2>
            <h5 class="text-light text-shadow">Some representative placeholder content for the second slide.</h5>
          </div>
        </div>
        <div class="carousel-item">
          <img src="https://picsum.photos/id/{{ rand(1, 1000) }}/1080/300" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h2 class="text-bold text-light text-shadow">Third slide label</h2>
            <h5 class="text-light text-shadow">Some representative placeholder content for the third slide.</h5>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </button>
    </div>
  </div>
</div>
