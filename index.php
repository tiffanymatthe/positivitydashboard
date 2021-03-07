<?php
require_once "config.php";

$sql = "SELECT `entry-name`, `entry-description`, `entry-link`, `entry-date`, `entry-tag`, `entry-type`, `id` FROM `positivity-entries` WHERE `user-id` = ?";

if ($stmt = mysqli_prepare($conn, $sql)) {
    mysqli_stmt_bind_param($stmt, "i", $user_id);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_store_result($stmt);
        mysqli_stmt_bind_result($stmt, $name, $description, $link, $date, $tag, $type, $id);

        while (mysqli_stmt_fetch($stmt)) {
            $entry[$id]["entry-name"] = $name;
            $entry[$id]["entry-description"] = $description;
            $entry[$id]["entry-link"] = $link;
            $entry[$id]["entry-date"] = $date;
            $entry[$id]["entry-tag"] = $tag;
            $entry[$id]["entry-type"] = $type;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Positivity Dashboard</title>
    <link href="style.css" rel="stylesheet">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script src="script.js"></script>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif&display=swap" rel="stylesheet">
</head>

<body id="grad">
    <h1>The Positivity Dashboard</h1>

    <div id="add_entry">
        <form method="post" action="send_entry.php">
            <div class="input_selection">
                <label class="expand_label" for="entryName">Title</label>
                <input class="expand_input" type="text" name="entryName" id="entryName" placeholder="Title">
            </div>
            <div class="input_selection">
                <label class="expand_label" for="entryDescription">Description</label>
                <textarea class="expand_input" name="entryDescription" id="entryDescription" placeholder="Description" rows="2"></textarea>
            </div>
            <div class="input_selection">
                <label class="expand_label" for="entryLink">Link(optional)</label>
                <input class="expand_input" type="url" name="entryLink" id="entryLink" placeholder="URL">
            </div>
            <div class="input_selection">
                <h2>Category:</h2>
                <input type="radio" id="category0" name="category" value="Achievement">
                <label for="category0">Achievement</label><br>
                <input type="radio" id="category1" name="category" value="Motivation">
                <label for="category1">Motivation</label><br>
                <input type="radio" id="category2" name="category" value="Gratitude">
                <label for="category2">Gratitude</label><br>
            </div>
            <div class="input_selection">
                <h2>Tag:</h2>
                <div class="tag-box" id="achievement-tags" style="display: none;">
                    <input type="radio" id="tag0" name="tag" value="Personal">
                    <label for="tag0">Personal</label><br>
                    <input type="radio" id="tag1" name="tag" value="Professional">
                    <label for="tag1">Professional</label><br>
                </div>
                <div class="tag-box" id="motivation-tags" style="display: none;">
                    <input type="radio" id="tag2" name="tag" value="School">
                    <label for="tag2">School</label><br>
                    <input type="radio" id="tag3" name="tag" value="Dreams">
                    <label for="tag3">Dreams</label><br>
                    <input type="radio" id="tag4" name="tag" value="Work">
                    <label for="tag4">Work</label><br>
                    <input type="radio" id="tag5" name="tag" value="Mental Health">
                    <label for="tag5">Mental Health</label><br>
                    <input type="radio" id="tag6" name="tag" value="Physical Health">
                    <label for="tag6">Physical Health</label><br>
                </div>
                <div class="tag-box" id="gratitude-tags" style="display: none;">
                    <input type="radio" id="tag7" name="tag" value="Big">
                    <label for="tag7">Big</label><br>
                    <input type="radio" id="tag8" name="tag" value="Small">
                    <label for="tag8">Small</label><br>
                </div>

            </div>
            <div class="input_selection">
                <input type="submit">
            </div>
        </form>
    </div>

    <?php if (!empty($entry)) : ?>

        <?php foreach ($entry as $oneEntry) : ?>
            <div>
                <p><b><?php echo $oneEntry['entry-name'] ?></b></p>
                <p><b><?php echo $oneEntry['entry-description'] ?></b></p>
                <p><b><?php echo $oneEntry['entry-link'] ?></b></p>
                <p><b><?php echo $oneEntry['entry-date'] ?></b></p>
                <p><b><?php echo $oneEntry['entry-tag'] ?></b></p>
            </div>
        <?php endforeach ?>
    <?php else : ?>
        <p class="empty-subtitle">Nothing yet.</p>
    <?php endif ?>

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