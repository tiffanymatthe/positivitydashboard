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
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@900&family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&family=Noto+Sans+KR&display=swap" rel="stylesheet">
</head>

<body>
    <h1>The Positivity Dashboard</h1>
    <div id="container">
        <button type="button" class="buttons" id="add_entry_button" onclick="show_adding()">Add a positive entry.</button>
    </div>

    <div id="add_entry" style="display:none;">
        <form method="post" action="send_entry.php">
            <div class="input_selection">
                <input class="expand_input" type="text" name="entryName" id="entryName" placeholder="Title">
            </div>
            <div class="input_selection">
                <textarea class="expand_input" name="entryDescription" id="entryDescription" placeholder="Description" rows="2"></textarea>
            </div>
            <div class="input_selection">
                <input class="expand_input" type="url" name="entryLink" id="entryLink" placeholder="URL">
            </div>
            <div class="input_selection">
                <h2>Category:</h2>
                <div class="controls">
                    <label>
                        <input type="radio" id="category0" name="category" value="Achievement">
                        <span>Achievement</span>
                    </label>
                    <label>
                        <input type="radio" id="category1" name="category" value="Motivation">
                        <span>Motivation</span>
                    </label>
                    <label>
                        <input type="radio" id="category2" name="category" value="Gratitude">
                        <span>Gratitude</span>
                    </label>
                </div>
            </div>
            <div class="input_selection">
                <h2 id="tag-header" style="display: none;">Tag:</h2>
                <div class="tag-box" id="achievement-tags" style="display: none;">
                    <label>
                        <input type="radio" id="tag0" name="tag" value="Personal">
                        <span>Personal<span>
                    </label>
                    <label>
                        <input type="radio" id="tag1" name="tag" value="Professional">
                        <span>Professional</span>
                    </label>
                </div>

                <div class="tag-box" id="motivation-tags" style="display: none;">
                    <label>
                        <input type="radio" id="tag2" name="tag" value="School">
                        <span>School</span>
                    </label>
                    <label>
                        <input type="radio" id="tag3" name="tag" value="Dreams">
                        <span>Dreams</span>
                    </label>
                    <label>
                        <input type="radio" id="tag4" name="tag" value="Work">
                        <span>Work</span>
                    </label>
                    <label>
                        <input type="radio" id="tag5" name="tag" value="Mental Health">
                        <span>Mental Health</span>
                    </label>
                    <label>
                        <input type="radio" id="tag6" name="tag" value="Physical Health">
                        <span>Physical Health</span>
                    </label>
                </div>

                <div class="tag-box" id="gratitude-tags" style="display: none;">
                    <label>
                        <input type="radio" id="tag7" name="tag" value="Big">
                        <span>Big</span>
                    </label>
                    <label>
                        <input type="radio" id="tag8" name="tag" value="Small">
                        <span>Small</span>
                    </label>
                </div>
            </div>
            <div class="input_selection submit">
                <input class="buttons" type="submit">
                <button type="button" class="buttons" id="hide_button" onclick="hide_adding()">Hide</button>
            </div>
        </form>
    </div>



    <div id="main_content">

        <li id="page1" onclick="change_tab(this.id); ">Achievement</li>
        <li id="page2" onclick="change_tab(this.id);">Gratitude</li>
        <li id="page3" onclick="change_tab(this.id);">Motivation</li>


        <div class="hidden_desc" id="page1_desc">

            <div class="boxed">
                <?php if (!empty($entry)) : ?>

                    <?php foreach ($entry as $oneEntry) : ?>
                        <?php if ($oneEntry['entry-type'] == 'Achievement') : ?>
                            <div class="echo_text">
                                <p class="entry_name"><?php echo $oneEntry['entry-name'] ?><a href="<?php echo $oneEntry['entry-link'] ?>" target="_blank">LINK</a></p>
                                <p class="entry_tag"><?php echo $oneEntry['entry-tag'] ?></p>
                                <p><?php echo $oneEntry['entry-description'] ?></p>

                            </div>
                        <?php endif ?>
                    <?php endforeach ?>

                <?php else : ?>
                    <p class="empty-subtitle">Nothing yet.</p>
                <?php endif ?>
            </div>

        </div>

        <div class='hidden_desc' id="page2_desc">
            <div class="boxed">
                <?php if (!empty($entry)) : ?>

                    <?php foreach ($entry as $oneEntry) : ?>
                        <?php if ($oneEntry['entry-type'] == 'Gratitude') : ?>
                            <div class="echo_text">
                                <p class="entry_name"><?php echo $oneEntry['entry-name'] ?><a href="<?php echo $oneEntry['entry-link'] ?>" target="_blank">LINK</a></p>
                                <p class="entry_tag"><?php echo $oneEntry['entry-tag'] ?></p>
                                <p><?php echo $oneEntry['entry-description'] ?></p>
                            </div>
                        <?php endif ?>
                    <?php endforeach ?>
                <?php else : ?>
                    <p class="empty-subtitle">Nothing yet.</p>
                <?php endif ?>
            </div>
        </div>


        <div class='hidden_desc' id="page3_desc">
            <div class="boxed">
                <?php if (!empty($entry)) : ?>
                    <?php foreach ($entry as $oneEntry) : ?>
                        <?php if ($oneEntry['entry-type'] == 'Motivation') : ?>
                            <div class="echo_text">
                                <p class="entry_name"><?php echo $oneEntry['entry-name'] ?><a href="<?php echo $oneEntry['entry-link'] ?>" target="_blank">LINK</a></p>
                                <p class="entry_tag"><?php echo $oneEntry['entry-tag'] ?></p>
                                <p><?php echo $oneEntry['entry-description'] ?></p>

                            </div>
                        <?php endif ?>
                    <?php endforeach ?>
                <?php else : ?>
                    <p class="empty-subtitle">Nothing yet.</p>
                <?php endif ?>
            </div>
        </div>
        <div id="page_content">
            <h2>Achievements</h2>
            Achievements:)
        </div>
    </div>
</body>

</html>