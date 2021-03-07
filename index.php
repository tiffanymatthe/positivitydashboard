<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Positivity Dashboard</title>
    <link href="style.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif&display=swap" rel="stylesheet">

    <script>
        function change_tab(id)
        {
          document.getElementById("page_content").innerHTML=document.getElementById(id+"_desc").innerHTML;
          document.getElementById("page1").className="notselected";
          document.getElementById("page2").className="notselected";
          document.getElementById("page3").className="notselected";
          document.getElementById(id).className="selected";
        }
       </script>
</head>

<body id="grad">
    <h1>The Positivity Dashboard</h1>
    
    <div id="main_content">

        <li class="selected" id="page1" onclick="change_tab(this.id);">Achievement</li>
        <li class="notselected" id="page2" onclick="change_tab(this.id);">Gratitude</li>
        <li class="notselected" id="page3" onclick="change_tab(this.id);">Motivation</li>
        
        <div class='hidden_desc' id="page1_desc">
         <h2>Achievement</h2>
         LOG ALL YOUR ACHIEVEMENTS HERE!!
         <form>
            <label for="achievementName">Achievement</label>
            <input type="text" name="achievementName" id="achievementName" placeholder="Achievement Title">
            <label for="achievementDescription">Description</label>
            <input type="text" name="achievementDescription" id="achievementDescription" placeholder="Description">
            <label for="achievementLink">Link (optional)</label>
            <input type="url" name="achievementLink" id="achievementLink" placeholder="URL">
        </form>
        </div>
       
        <div class='hidden_desc' id="page2_desc">
            <div id="triangle-bottomleft">
         <h2>Gratitude</h2>
        </div>
         GRATITUDE JOURNALING!!
         <form>
            <label for="gratitudeName">Gratitude</label>
            <input type="text" name="gratitudeName" id="gratitudeName" placeholder="Gratitude Title">
            <label for="gratitudeDescription">Description</label>
            <input type="text" name="gratitudeDescription" id="gratitudeDescription" placeholder="Description">
            <label for="gratitudeLink">Link (optional)</label>
            <input type="url" name="gratitudeLink" id="gratitudeLink" placeholder="URL">
        </form>
        </div>
        

        <div class='hidden_desc' id="page3_desc">
         <h2>Motivation</h2>
       ADD YOUR FAV MOTIVATIONAL QUOTES OR VIDEOS HERE:)
       <form>
        <label for="motivationName">Motivation</label>
        <input type="text" name="motivationName" id="motivationName" placeholder="Motivation Title">
        <label for="motivationDescription">Description</label>
        <input type="text" name="motivationDescription" id="motivationDescription" placeholder="Description">
        <label for="motivationLink">Link (optional)</label>
        <input type="url" name="motivationLink" id="motivationLink" placeholder="URL">
    </form>
        </div>
        
        <div id="page_content">
         <h2>Achievements</h2>
         Achievements:)
        </div>
        
       </div>

   
    

</body>
</html>