<div class="modal fade" id="noweZlecenieModal" tabindex="-1" role="dialog" aria-labelledby="noweZlecenieModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span>
        </button>
        <h4 class="modal-title" id="noweZlecenieModalLabel">Dodawanie zlecenia</h4>
      </div>
      <div class="modal-body">
        <form action="zlecenie_dodaj_script.php" method="post">
          <div>
            <label>Typ auta:</label>
            <input type="text" name="car_type" id="car_type" />
          </div>
          <div>
            <label>Typ ładunku:</label>
            <input type="text"/>
          </div>
          <div>
            <label>Liczba ludzi do załadunku i rozładunku:</label>
            <input type="text"/>
          </div>
          <div>
            <label>Adres początkowy:</label>
            <input type="text"/>
          </div>
          <div>
            <label>Adres docelowy:</label>
            <input type="text"/>
          </div>
          <div>
            <input class="w3-button w3-blue" type="submit" value="Dodaj" />
          </div>
        </form>
      </div>
    </div>
  </div>
</div>