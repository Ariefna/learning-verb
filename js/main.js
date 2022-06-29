// import config from "config.json";

$(document).ready(function () {
  $("#tidak").click(function () {
    getRandomQuote(false);
  });
  $("#iyah").click(function () {
    getRandomQuote(true);
  });
  function getRandomQuote(sukses) {
    var color = [
      "#F64747",
      "#663399",
      "#4183D7",
      "#22313F",
      "#9A12B3",
      "#03A678",
    ]; /* array of hex color */
    var index =
      color[
        Math.floor(Math.random() * color.length)
      ]; /* random color from color array */
    $.getJSON("js/config.json", function (en) {
      $.getJSON("js/indo.json", function (id) {
        var rand = Math.floor(Math.random() * en.length);
        $(".quote #data").html(en[rand]);
        $(".quote h4").html("-" + id[rand]);
        jQuery.post(
          "http://localhost:8000/server.php",
          {
            newData: "",
            en: en[rand],
            id: rand,
            lengid: id[rand],
            sukses: sukses,
          },
          function (response) {
            // console.log(response);
          }
        );
      });
    });
    $("body").css("background-color", index);
    $(".col").css("background-color", index);
    $(".socialmedia a").css("background-color", index);
    $("#newquote").css("color", "white");
    $(".color").css("color", index);
    // $("#twitter").attr(
    //   "href",
    //   "https://twitter.com/intent/tweet?text=" + quote + "   " + author
    // );
  }
});
