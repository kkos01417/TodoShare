$(function () {
  $("#button").bind("click", function () {

    var abc;
    abc = $("#person").val();
    re = new RegExp(abc);

    $("#data tr").each(function () {
      var txt = $(this).find("td").text();
      var txt2 = $(this).find('th').val();
      if (txt.match(re) != null || txt2 != null) {


        $(this).show();


      } else {
        $(this).hide();
      }
    });
  });

  $("#button2").bind("click", function () {
    $("#data tr").show();
  });
});
