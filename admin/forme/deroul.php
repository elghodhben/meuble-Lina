<div id="langue">
<p>
<SCRIPT language=JavaScript>

function date()
{

var today=new Date();
var date_heure="";
h = today.getHours();
m = today.getMinutes();
s = today.getSeconds();


        if(h<10)
   { h = '0'+h; }
        if(m<10)
   { m = '0'+m; }
        if(s<10)
   { s = '0'+s; }
date_heure = ''+h+'h'+m+'m'+s+'';

document.getElementById('d').innerHTML = date_heure;
}
setInterval("date()",1000);
</SCRIPT>
</p>
<p>
Il est:<b name="d" id="d"></b>
<br>
</p>
</div>

