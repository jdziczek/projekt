<div class="modal fade" id="noweZlecenieModal" tabindex="-1" role="dialog" aria-labelledby="noweZlecenieModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" id="nowe_zlecenie">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span>
        </button>
        <h4 class="modal-title" id="noweZlecenieModalLabel">Dodawanie zlecenia</h4>
      </div>
      <div class="modal-body">
        <form action="zlecenie_dodaj_script.php" method="post" id="zlecenieForm">
          <div id="wrapper1">
            <div>
              <h4> Adres początkowy</h4>
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
              <h4> Adres końcowy</h4>
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
          </div>
          <div id="wrapper2">
            <div>
              <h4> Ładunek</h4>
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
            <h4> Inne dane</h4>
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
              <label>Telefon:</label>
              <input type="text" name="phone" id="phone" required pattern="[0-9]{6-15}" />
            </div>
            <div>
              <label>Dystans:</label>
              <input type="text" name="distance" id="distance" />
            </div>
            <div>
              <label>Wycena:</label>
              <input type="text" name="valuation" id="valuation" />
            </div>
            <div>
              <label>Przydzielona ekipa:</label>
              <select name="id_crew" id="id_crew" >
              <?php
              require_once "connect.php";
              $conn = mysqli_connect($host, $db_user, $db_password, $db_name);
              $sql = "SELECT id_crew FROM crew";
              $result = mysqli_query($conn, $sql);
              while($row = mysqli_fetch_array($result)){
                echo '<option value="';
                echo $row['id_crew'];
                echo '">';
                echo $row['id_crew'];
                echo '</option>';
              }
              mysqli_close($conn);
              ?>
              </select>
            </div>
          </div>
        </form>
        <h4> Komentarz dyspozytora</h4>
        <textarea rows="2" cols="70" name="comment_dispatcher" form="zlecenieForm" ></textarea>
        <h4> Komentarz kierowcy</h4>
        <textarea rows="2" cols="70" name="comment_driver" form="zlecenieForm" ></textarea>
        <div>
          <input class="w3-button w3-blue" type="submit" value="Dodaj" form="zlecenieForm" />
        </div>
      </div>
    </div>
  </div>
</div>