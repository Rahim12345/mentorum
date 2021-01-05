function myFunctionBook() {
    var x = document.getElementById("myFileBook");
    var ext=[];
    var allowExt=["pdf","docx","doc"];
    if(x.files.length>1)
    {
      document.getElementById("errorBook").innerHTML="";
      document.getElementById("errorBook").innerHTML += "Maksimum kitab sayı 1";
    }
    else
    {
      for (var i = 0; i < x.files.length; i++) 
      {
        var size=0;
        size = x.files.item(i).size;
        size+=size;
      }
      if(size>25*1024*1024)
      {
        document.getElementById("errorBook").innerHTML="";
        document.getElementById("errorBook").innerHTML += "Maksimum 25Mb -lıq fayl yükləyə bilərsiniz";
      }
      else
      {
        document.getElementById("errorBook").innerHTML="";
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
          document.getElementById("errorBook").innerHTML="";
          document.getElementById("errorBook").innerHTML += "Yalnız doc,docx,pdf faylları əlavə edə bilərsiniz.";
        }
        else
        {
          document.getElementById("errorBook").innerHTML="";
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
          document.getElementById("errorBook").innerHTML = name;
        }
      }
    }
  }