
<style type="text/css"> 
.class1{ float:left; margin:10px; background:#09C; width:100px; height:100px; cursor:pointer; } 
.class2{ padding:130px 0 0 0;float:left; margin:10px; background:#0C0; width:100px; height:100px; cursor:pointer; }
 </style> 
 <script> 
 function toggleClass(el){ 
 var kids = document.getElementById('menu1')
 .children; for(var i = 0; i < kids.length; i++)
 { kids[i].className = "class1"; }
 el.className = "class2"; } 
 </script> 

 
 <div id="menu1"> 
	 <div class="class2" onclick="toggleClass(this)"></div> 
	 <div class="class1" onclick="toggleClass(this)"></div> 
	 <div class="class1" onclick="toggleClass(this)"></div> 
	 <div class="class1" onclick="toggleClass(this)"></div> 
 </div> 
