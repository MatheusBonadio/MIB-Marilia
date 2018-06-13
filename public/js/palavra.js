function printable(titulo) {
  $.ajax({
    url: "/public/css/print.css",
    success: function(styleCss) {
      printScreen(styleCss);
    }
  });

  function printScreen(styleCss) {
    var data = document.getElementsByClassName('word_content')[0].innerHTML;
    var mywindow = window.open();
    if (mywindow == null || typeof(mywindow) == 'undefined') {
      //alert('Please disable your pop-up blocker and click the "Open" link again.');
    }
    mywindow.document.write('<html><head><title>' + titulo + ' | IBAV Marília</title>');
    mywindow.document.write('<style>' + styleCss + '</style>');
    mywindow.document.write('</head><body><h1>' + titulo + '</h1>');
    mywindow.document.write(data);
    mywindow.document.write('</body></html>');
    mywindow.print();
    mywindow.close();
  }
}