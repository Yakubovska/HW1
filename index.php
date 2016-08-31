<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script>

        function Copy(){
            var mysel=document.getElementById('copy');
            mysel.style.visibility="visible";
            //alert("!!");
        }
        function Rename(){
            var myselRen=document.getElementById('rename');
            myselRen.style.visibility="visible";
            //alert("!!");
        }
    </script>
</head>
<body>

<form action="" method="post" >
    <?php
    $files=scandir('./');
    $selectOption = $_POST['mySel'];
    var_dump($files[$selectOption]);
    if(isset($_POST['del'])){

    }elseif(isset($_POST['renSub'])){
        if($selectOption>1){
            var_dump($_POST['ren']);
            rename( $files[$selectOption],$_POST['ren']);
        }
    }
    elseif(isset($_POST['copySub'])){
        //var_dump($_POST['copyPath']);
        copy($files[$selectOption],$_POST['copyPath']);
    }
    /*  rename();
      unlink($name);
  mkdir();//make
  rmdir();//remove
  $dir =opendir();
  closedir($dir);
  readdir($dir);
  []<=scandir($path);
  glob('*.txt');
  rename($oldname,$newname)
    copy(from,to)
    */

    $count=0;
   // var_dump($files);
    ?>
<select name="mySel" size="10" style="width: 150px">
    <?php
    foreach($files as $f):
    ?>
        <option value="<?= $count?>"><?=$f; $count++; ?></option>
    <?php
    endforeach

    ?>
</select>
    </br>
    <button name="del"  type="submit">Delete</button>
    </br>
    <button name="rename" onclick="Rename()"  type="button">Rename</button>
    <div id="rename" style="visibility: hidden">
        <input id="ren" >
        <button type="submit" name="renSub" >Save</button>
    </div>
    </br>
    <button name="copy" onclick="Copy()" type="button">Copy</button>
    <div id="copy"style="visibility: hidden">
        <input name="copyPath" >
        <button type="submit" name="copySub" >Save</button>
    </div>

</form>
</body>
</html>