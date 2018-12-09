<!DOCTYPE html>
<html>
  <title>JBD Logistics</title>
  <head>
    <meta charset="utf-8">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue.css">
    <link href="/css/styles.css" rel="stylesheet" type="text/css">
  </head>
  <body>
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/sidebar_dyspozytor.php'; ?>
    <div class="w3-main">
      <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php'; ?>
      <div class="w3-container">
      <!-- content -->
      <h2>Zarządzanie zleceniami</h2>
      <h3>Kalendarz zleceń</h3>
      <h4>Zlecone 7.11.2018</h4>
        <table class="w3-table-all w3-hoverable">
          <thead>
            <tr class="w3-light-grey">
              <th>Numer kierowcy</th>
              <th>Numer zlecenia</th>
              <th>Status</th>
              <th>Szczegóły</th>
              <th>Usuń</th>
            </tr>
          </thead>
          <tr>
            <td>-</td>
            <td>2018/255</td>
            <td><i class="fa fa-truck w3-text-red"></i></td>
            <td><i class="fa fa-search" data-toggle="modal" data-target="#zlecenieModal"></i></td>
            <td><i class="fa fa-close"></i></td>
          </tr>
          <tr>
            <td>K07</td>
            <td>2018/254</td>
            <td><i class="fa fa-truck w3-text-red"></i></td>
            <td><i class="fa fa-search" data-toggle="modal" data-target="#zlecenieModal"></i></td>
            <td><i class="fa fa-close"></i></td>
          </tr>
          <tr>
            <td>K04</td>
            <td>2018/253</td>
            <td><i class="fa fa-truck w3-text-orange"></i></td>
            <td><i class="fa fa-search" data-toggle="modal" data-target="#zlecenieModal"></i></td>
            <td><i class="fa fa-close"></i></td>
          </tr>
        </table>
       <br>
       <h4>Zlecone 6.11.2018</h4>
        <table class="w3-table-all w3-hoverable">
          <thead>
            <tr class="w3-light-grey">
              <th>Numer kierowcy</th>
              <th>Numer zlecenia</th>
              <th>Status</th>
              <th>Szczegóły</th>
              <th>Usuń</th>
            </tr>
          </thead>
          <tr>
            <td>K06</td>
            <td>2018/252</td>
            <td><i class="fa fa-truck w3-text-red"></i></td>
            <td><i class="fa fa-search" data-toggle="modal" data-target="#zlecenieModal"></i></td>
            <td><i class="fa fa-close"></i></td>
          </tr>
          <tr>
            <td>K03</td>
            <td>2018/251</td>
            <td><i class="fa fa-truck w3-text-orange"></i></td>
            <td><i class="fa fa-search" data-toggle="modal" data-target="#zlecenieModal"></i></td>
            <td><i class="fa fa-close"></i></td>
          </tr>
          <tr>
            <td>K05</td>
            <td>2018/250</td>
            <td><i class="fa fa-truck w3-text-orange"></i></td>
            <td><i class="fa fa-search" data-toggle="modal" data-target="#zlecenieModal"></i></td>
            <td><i class="fa fa-close"></i></td>
          </tr>
        </table>
       <br>
      <h4>Zlecone 5.11.2018</h4>
        <table class="w3-table-all w3-hoverable">
          <thead>
            <tr class="w3-light-grey">
              <th>Numer kierowcy</th>
              <th>Numer zlecenia</th>
              <th>Status</th>
              <th>Szczegóły</th>
              <th>Usuń</th>
            </tr>
          </thead>
          <tr>
            <td>K02</td>
            <td>2018/249</td>
            <td><i class="fa fa-truck w3-text-orange"></i></td>
            <td><i class="fa fa-search" data-toggle="modal" data-target="#zlecenieModal"></i></td>
            <td><i class="fa fa-close"></i></td>
          </tr>
          <tr>
            <td>K01</td>
            <td>2018/248</td>
            <td><i class="fa fa-truck w3-text-green"></i></td>
            <td><i class="fa fa-search" data-toggle="modal" data-target="#zlecenieModal"></i></td>
            <td><i class="fa fa-close"></i></td>
          </tr>
          <tr>
            <td>K08</td>
            <td>2018/247</td>
            <td><i class="fa fa-truck w3-text-green"></i></td>
            <td><i class="fa fa-search" data-toggle="modal" data-target="#zlecenieModal"></i></td>
            <td><i class="fa fa-close"></i></td>
          </tr>
        </table>
      <p>
      <a class="w3-button w3-blue" data-toggle="modal" data-target="#noweZlecenieModal">Dodaj zlecenie</a>
      <a class="w3-button w3-blue" data-toggle="modal" data-target="#legendaModal">Legenda statusów</a>
      <a href="/components/dyspozytor_archiwum" class="w3-button w3-blue">Archiwum</a>
      </p>
      <!-- content -->
      </div>
      <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php'; ?>
    </div>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/components/zlecenie_szczegoly.php'; ?>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/components/zlecenie_dodaj.php'; ?>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/components/zlecenie_legenda.php'; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="/js/main.js"></script>
  </body>
</html>