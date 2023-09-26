<?php 
    require 'functions.php';
?>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
<script type="text/javascript">
    // var doc = new jsPDF('p', 'mm', [high, wide]);
    var doc = new jsPDF('p', 'mm', [300, 300]);

    doc.text[$data['pilihan_poli']];

    doc.setFont("courier", "normal");
    doc.text("This is courier normal.", 20, 30);

    doc.setFont("times", "italic");
    doc.text("This is times italic.", 20, 40);

    doc.setFont("helvetica", "bold");
    doc.text("This is helvetica bold.", 20, 50);

    doc.setFont("courier", "bolditalic");
    doc.text("This is courier bolditalic.", 20, 60);

    doc.setFont("times", "normal");
    doc.text("This is centred text.", 105, 80, null, null, "center");
    doc.text("And a little bit more underneath it.", 105, 90, null, null, "center");
    doc.text("This is right aligned text", 200, 100, null, null, "right");
    doc.text("And some more", 200, 110, null, null, "right");
    doc.text("Back to left", 20, 120);

    doc.text("10 degrees rotated", 20, 140, null, 10);
    doc.text("-10 degrees rotated", 20, 160, null, -10);

    doc.save('hello_world.pdf');
</script>