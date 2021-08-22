 

<script>
drawchart(){

      set fso = CreateObject("Scripting.FileSystemObject"); 
      set s = fso.CreateTextFile("<your Path>/decision.txt", True);
 
    var firstName = document.getElementById('FirstName');
    var lastName  = document.getElementById('lastName');
 
    s.writeline(0);

    s.Close();}

      </script>

      