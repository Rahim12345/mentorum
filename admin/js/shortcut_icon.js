function myLogoFunction() {
  var x = document.getElementById("myFile");
  var ext=[];
  var allowExt=["jpeg/jfif","jpeg 2000","exif","tiff","gif","bmp","png","webp","jpeg","jpg","psd"];
  if(x.files.length>1)
  {
    document.getElementById("error").innerHTML="";
    document.getElementById("error").innerHTML += "Yalnız bir şəkil daxil edə bilərsiniz!";
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
      document.getElementById("error").innerHTML="";
      document.getElementById("error").innerHTML += "Maksimum 25Mb -lıq fayl yükləyə bilərsiniz";
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
        document.getElementById("error").innerHTML="";
        document.getElementById("error").innerHTML += "Yalnız şəkil faylları əlavə edə bilərsiniz.";
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