<div class="modal fade" id="zlecenieModal" tabindex="-1" role="dialog" aria-labelledby="zlecenieModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span>
        </button>
        <h4 class="modal-title" id="zlecenieModalLabel">Szczegóły Zlecenia</h4>
      </div>
      <div class="modal-body">
        <form action="zlecenie_szczegoly_script.php" method="post">
        <div>
            <label>Typ auta:</label>
            <input type="text" name="car_type" id="car_type" disabled/>
          </div>
          <div>
            <label>Ludzie:</label>
            <input type="text" name="people" id="people" />
          </div>
          <div>
            <label>Typ auta:</label>
            <input type="text" name="car_type" id="car_type" disabled/>
          </div>
          <div>
            <label>Typ auta:</label>
            <input type="text" name="car_type" id="car_type" disabled/>
          </div>
          <div>
            <label>Typ auta:</label>
            <input type="text" name="car_type" id="car_type" disabled/>
          </div>
          <div>
          <input class="w3-button w3-blue" type="submit" value="Modyfikuj" />
          </div>
        </form>
      </div>
    </div>
  </div>
</div>