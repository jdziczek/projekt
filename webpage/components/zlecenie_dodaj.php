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
            <select name="car_type" id="car_type" >
              <option value="Bus">Bus</option>
              <option value="Container">Container</option>
              <option value="Truck">Truck</option>
            </select>
          </div>
          <div>
            <label>Ludzie:</label>
            <input type="number" name="people" id="people" min="1" max="20" />
          </div>
          <div>
            <p> Adres początkowy</p>
            <label>Ulica:</label>
            <input type="text" name="f_adress_street" id="f_adress_street" required pattern="[a-zA-Z]{1,}" />
          </div>
          <div>
            <label>Numer domu:</label>
            <input type="number" name="f_adress_b_number" id="f_adress_b_number" min="1" />
          </div>
          <div>
            <label>Numer lokalu:</label>
            <input type="number" name="f_adress_a_number" id="f_adress_a_number" min="1" />
          </div>
          <div>
            <label>Kod pocztowy:</label>
            <input type="text" name="f_adress_zip_code" id="f_adress_zip_code" required pattern="[0-9]{2}-[0-9]{3}" />
          </div>
          <div>
            <label>Miasto:</label>
            <input type="text" name="f_adress_city" id="f_adress_city" required pattern="[a-zA-Z]{1,}" />
          </div>
          <div>
            <label>Piętro:</label>
            <input type="number" name="f_adress_floor" id="f_adress_floor" min="1" />
          </div>
          <div>
            <p> Adres końcowy</p>
            <label>Ulica:</label>
            <input type="text" name="s_adress_street" id="s_adress_street" required pattern="[a-zA-Z]{1,}" />
          </div>
          <div>
            <label>Numer domu:</label>
            <input type="number" name="s_adress_b_number" id="s_adress_b_number" min="1" />
          </div>
          <div>
            <label>Numer lokalu:</label>
            <input type="number" name="s_adress_a_number" id="s_adress_a_number" min="1" />
          </div>
          <div>
            <label>Kod pocztowy:</label>
            <input type="text" name="s_adress_zip_code" id="s_adress_zip_code" required pattern="[0-9]{2}-[0-9]{3}" />
          </div>
          <div>
            <label>Miasto:</label>
            <input type="text" name="s_adress_city" id="s_adress_city" required pattern="[a-zA-Z]{1,}" />
          </div>
          <div>
            <label>Piętro:</label>
            <input type="number" name="s_adress_floor" id="s_adress_floor" min="1" />
          </div>
          <div>
            <p> Ładunek</p>
            <label>Opis:</label>
            <input type="text" name="cargo_dsc" id="cargo_dsc" />
          </div>
          <div>
            <label>Waga:</label>
            <input type="number" name="cargo_weight" id="cargo_weight" min="1" />
          </div>
          <div>
            <label>Długość:</label>
            <input type="text" name="cargo_length" id="cargo_length" />
          </div>
          <div>
            <label>Szerokość:</label>
            <input type="text" name="cargo_width" id="cargo_width" />
          </div>
          <div>
            <label>Wysokość:</label>
            <input type="text" name="cargo_height" id="cargo_height" />
          </div>
          <p> Inne dane</p>
          <div>
            <label>Dystans:</label>
            <input type="text" name="distance" id="distance" />
          </div>
          <div>
            <label>Wycena:</label>
            <input type="text" name="valuation" id="valuation" />
          </div>
          <div>
            <input class="w3-button w3-blue" type="submit" value="Dodaj" />
          </div>
        </form>
      </div>
    </div>
  </div>
</div>