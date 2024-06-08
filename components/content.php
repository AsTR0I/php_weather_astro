<?php require_once 'config.php'; ?>

<div class="jumbotron">
  <h1 class="display-4 hidden-xs-down">Какая погода?</h1>
  <p class="lead">Введите название города, чтобы узнать погоду.</p>

 <div class="container">
    <div class="row pb-2">
      <div class="col-lg-12 col-md-8">
        <form method="GET">
            <div class="form-group">
                <label for="city"></label>
                <input type="text" class="form-control" name ="city" id="city" placeholder="Пермь, Лондон, Токио" value="<?php echo $city;?>">
            </div>
          <button type="submit" class="btn btn-lg btn-primary">Submit</button>
        </form>
      </div>
    </div>
 </div>

 <section class="container mt-4">
   <div class="row-fluid mt-4">
     <div class="col-sm-12">
       <div class="icon">
        <div class="icon-box">
           <div id="weather-icon" class="col-lg-12 col-md-8 col-sm-12d">
                <?php getContents($city, $urlCity);?>
           </div>
        </div>
      </div>
    </section>
