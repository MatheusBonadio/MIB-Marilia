function printable(titulo, titulo2, referencia) {
  $.ajax({
    url: "/public/css/print" + referencia + ".css",
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
    mywindow.document.write('<html><head><title>https://ibavmarilia.com/palavras/' + titulo2 + '</title><link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,500" rel="stylesheet">');
    mywindow.document.write('<style>' + styleCss + '</style>');
    mywindow.document.write('</head><body><h1>' + titulo + '</h1>');
    mywindow.document.write(data);
    mywindow.document.write('</body></html>');
    setTimeout(function(){
      mywindow.print();
      mywindow.close();
    }, 0);
  }
}