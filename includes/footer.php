<!-- Footer with JQuery and materialize javascript -->
<footer class="page-footer grey darken-4">
  <div class="container">
    <div class="row">
      <div class="col s12 l6">
        <h5>Projekt: </h5>
        <p>Mateo Vuković i Ivana Tomić</p>
      </div>
      <div class="col s12 l4 offset-l2 right">
        <h5>Kontakt: </h5>
        <ul class = "">
          <li class = "col s1 l1"><a href="#" class="tooltipped btn-floating btn-small indigo darken-4" data-tooltip = "Instagram"><i class = "fab fa-instagram"></i></a></li>
          <li class = "col s1 l1"><a href="#" class="tooltipped btn-floating btn-small indigo darken-4" data-tooltip = "YouTube"><i class = "fab fa-youtube"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>
<!-- JQuery -->
<script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<!-- Script for dropdown -->
<script>
    $(".dropdown-trigger").dropdown();
    $(document).ready(function(){
      $('.tooltipped').tooltip();
    })
</script>
