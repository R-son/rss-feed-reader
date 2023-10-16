<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="index.css">
    </head>
    <body>
        <?php
            if(isset($_POST['url']))
                $url = $_POST['url'];
        ?>
        <form method="post" action="index.php">
            <input type="url" name="url" id="url" placeholder="https://example.com" pattern="https://.*" size="30" required />
            <button type="submit" name="submit"><i class="fa-solid fa-magnifying-glass" style="color: #000000;"></i></button>
        </form>
        <?php
            if(isset($url))
            {
                $rss = new DOMDocument();
                $rss->load($url);
                $items = array();
                foreach ($rss->getElementsByTagName('item') as $key) {
                    $item = array(
                        'title' => $key->getElementsByTagName('title')->item(0)->nodeValue,
                        'description' => $key->getElementsByTagName('description')->item(0)->nodeValue,
                        'link' => $key->getElementsByTagName('link')->item(0)->nodeValue,
                        'enclosure' => $key->getElementsByTagName('enclosure')->item(0)->nodeValue,
                    );
                }
                array_push($items, $item);
            }
        ?>
    </body>
</html>