<!DOCTYPE html>
<html>
  <title>JBD Logistics</title>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue.css">
    <link href="/css/styles.css" rel="stylesheet" type="text/css">
  </head>
  <body>
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/sidebar.php'; ?>
    <div class="w3-main">
      <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php'; ?>
      <div class="w3-container">
      <!-- content -->
        <h2>Logowanie</h2>
        <div class="content">
            <div class="form">
              <div>
                <label>Nazwa użytkownika:</label>
                <input type="text"/>
              </div>
              <div>
                <label>Hasło:</label>
                <input type="text"/>
              </div>
              <div>
                <label>Funkcja:</label>
                <label class="radio-inline">
                  <input type="radio"> Dyspozytor<br>
                </label>
                <label class="radio-inline">
                  <input type="radio"> Kierowca<br>
                </label>
              </div>
              <div>
                <button>Zaloguj</button>
              </div>
            </div>
        </div>
      <!-- content -->
      </div>
      <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php'; ?>
    </div>
    <script src="/js/main.js"></script>
  </body>
</html>