// Otwieranie i zamykanie panelu bocznego
function showSideBar() {
    document.getElementById("sidebar").style.display = "block";
    document.getElementById("shadow").style.display = "block";
}
function hideSideBar() {
    document.getElementById("sidebar").style.display = "none";
    document.getElementById("shadow").style.display = "none";
}

// Usuwanie zlecenia
$(document).ready(function(){
  $('.delete_zlecenie').click(function(e){
    e.preventDefault();
    var orderid = $(this).attr('data-order-id');
    var parent = $(this).parent("td").parent("tr");
    bootbox.dialog({
      message: "Na pewno chcesz usunąć zlecenie?",
      title: "Usuwanie zlecenia",
      buttons: {
        success: {
          label: "Nie",
          className: "w3-button w3-green",
          callback: function() {
            $('.bootbox').modal('hide');
          }
        },
        danger: {
          label: "Usuń!",
          className: "w3-button w3-red",
          callback: function() {
            $.ajax({
              type: 'POST',
              url: '/components/zlecenie_usun_script.php',
              data: 'orderid='+orderid
            })
            .done(function(response){
              bootbox.alert(response);
              parent.fadeOut('slow');
            })
            .fail(function(){
              bootbox.alert('Error....');
            })
          }
        }
      }
    });
  });
});