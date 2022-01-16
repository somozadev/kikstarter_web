<?php include_once('header.php') ?>

<br>

<div class="container px-4 py-5" id="custom-cards">
  <h1 class="pb-2 border-bottom">"La mejor manera de predecir el futuro es creándolo"</h1>

  <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
    <div class="col">
      <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-10 shadow-lg" style="background-repeat:no-repeat;
  background-position: center; background-image: url('images/car.png'); background-size: cover;
	border-width: 10px;	border-radius: 50px; border-color: #7a83c8; border-style: solid;">
        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
          <form action="proyects_view.php" method="post" id="cars">>
            <button type="submit" name="cars" style="width: 100%;padding: 1rem;font-weight: bold;font-size: 1.1rem;color: #ffff;border: 2px;border-radius: 50px;outline: #252c6a;cursor: pointer; background: var(--color-primary);">
              <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold" style="text-align: center;  color:#b5bcec;">
                Próxima generación de coches</h2>
            </button>
          </form>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-10 shadow-lg" style="background-repeat:no-repeat;
  background-position: center;background-image: url('images/motorbike.png');  background-size: cover;
	border-width: 10px;	border-radius: 50px; border-color: #7a83c8; border-style: solid;">
        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
          <form action="proyects_view.php" method="post" id="motorbikes">>
            <button type="submit" name="motorbikes" style="width: 100%;padding: 1rem;font-weight: bold;font-size: 1.1rem;color: #ffff;border: 2px;border-radius: 50px;outline: #252c6a;cursor: pointer; background: var(--color-primary);">
              <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold " style="text-align: center;  color:#b5bcec;">Motos vanguardistas</h2>
            </button>
          </form>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-repeat:no-repeat;
  background-position: center;background-image: url('images/dron.png'); background-size: cover;
	border-width: 10px; 	border-radius: 50px; border-color: #7a83c8; border-style: solid;">
        <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
          <form action="proyects_view.php" method="post" id="motorbikes">>
            <button type="submit" name="drons" style="width: 100%;padding: 1rem;font-weight: bold;font-size: 1.1rem;color: #ffff;border: 2px;border-radius: 50px;outline: #252c6a;cursor: pointer; background: var(--color-primary);">
              <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold" style="text-align: center;  color:#b5bcec;">Drones, transporte ágil y rápido</h2>
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include_once('footer.php') ?>