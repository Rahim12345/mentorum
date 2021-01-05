function cvFile() {
    var x = document.getElementById("myCv");
    var ext=[];
    var allowExt=["pdf","doc","docx"];
    if(x.files.length>1)
    {
      document.getElementById("error").innerHTML="";
      document.getElementById("error").innerHTML += "Ən çox bir CV göndərə bilərsiniz";
    }
    else
    {
      for (var i = 0; i < x.files.length; i++) 
      {
        var size=0;
        size = x.files.item(i).size;
        size+=size;
      }
      if(size>5*1024*1024)
      {
        document.getElementById("error").innerHTML="";
        document.getElementById("error").innerHTML += "Maksimum 5Mb -lıq fayl yükləyə bilərsiniz";
      }
      else
      {
        document.getElementById("error").innerHTML="";
        for (var j = 0; j < x.files.length; j++)
        {
          if(allowExt.indexOf(x.files.item(j).name.split('.').pop())!=-1)
          {
            ext[j]=x.files.item(j).name.split('.').pop();
            ext=ext.filter(function(){return true;})
          }
        }
        if(ext.length!=x.files.length)
        {
            // var fileName = document.querySelector('#myFile').value; 
            // var extension = fileName.split('.').pop(); 
          document.getElementById("error").innerHTML="";
          document.getElementById("error").innerHTML += "Yalnız doc,docx,pdf faylları əlavə edə bilərsiniz.";
        }
        else
        {
          document.getElementById("error").innerHTML="";
          var name="";
          for (var j = 0; j < x.files.length; j++)
          {
            if(j!=x.files.length-1)
            {
              var name = name + x.files.item(j).name+",";
            }
            else
            {
              var name = name + x.files.item(j).name;
            }
          }
          document.getElementById("error").innerHTML = name;
        }
      }
    }
  }