<div class="modal fade" id="zlecenieUsunModal" tabindex="-1" role="dialog" aria-labelledby="zlecenieModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span>
        </button>
        <h4 class="modal-title" id="zlecenieModalLabel">Usunąć zlecenie <span id="modal-order-id"></span>?</h4>
      </div>
      <div class="modal-body">
        <form action="zlecenie_usun_script.php" method="post">
          <div>
              <label>Captcha:</label>
              <input type="text" name="id_to_remove" id="id_to_remove" value="" />
              <p></p>
            </div>
          <div>
            <input class="w3-button w3-red" type="submit" value="Usuń" />
          </div>
        </form>
      </div>
    </div>
  </div>
</div>