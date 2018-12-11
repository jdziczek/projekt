// Otwieranie i zamykanie panelu bocznego
function showSideBar() {
    document.getElementById("sidebar").style.display = "block";
    document.getElementById("shadow").style.display = "block";
}
function hideSideBar() {
    document.getElementById("sidebar").style.display = "none";
    document.getElementById("shadow").style.display = "none";
}

// Przekazyawnie numeru zlecenia do modala szczegolow zlecenia
$('[data-toggle="modal"]').on('click', function (e) {
  var $target = $(e.target);
  var modalSelector = $target.data('target');
  var $modalAttribute = $(modalSelector + ' #modal-order-id');
  var dataValue = $target.data("order-id");
  $modalAttribute.text(dataValue || '');
  //$.post("/components/dyspozytor_main.php", {"id_zlecenia": dataValue});

  // $.ajax
  // ({
  //   type: "POST",
  //   url: "/components/zlecenie_szczegoly_script.php",
  //   data: {"id_zlec": dataValue}
  // });
  // $.ajax
  // ({
  //   type: "POST",
  //   url: "/components/zlecenie_szczegoly.php",
  //   data: {"id_zlec": dataValue}
  // });
});


