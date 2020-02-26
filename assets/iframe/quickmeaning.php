<html>
<head>

    <link rel="stylesheet" href="<?php echo ROOT_URL; ?>assets/css/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo ROOT_URL; ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo ROOT_URL; ?>assets/css/style.css">
    <script src="<?php echo ROOT_URL; ?>assets/js/jquery-3.3.1.js"></script>
    <script src="<?php echo ROOT_URL; ?>assets/js/jquery-ui.min.js"></script>
    <script src="<?php echo ROOT_URL; ?>assets/js/bootstrap.min.js"></script>
</head>
<body>

<div id="content-box">

    <div id="search-history-box">
        <p> Meaning </p>
    </div>
    <div id="meaning-box">

        <?php

        $show = $viewmodel;
        foreach($show as $index => $value) {
            //$lemma = $value['lemma'];
            if ($index == 0) continue;
            $lemma = $value['lemma'];
            $pos = $value['posname'];
            $def = $value['definition'];
            $sampleset = $value['sampleset'];
            $samples = explode("|", $sampleset);
            $synonymset = $lemma;//$value['synonyms'];
            echo "<div class='sense-box' id='sense_" . (string)$index . "'>"
                ."<div class='sense-title' " . (string)$index . "'>"
                ."<span class='word'>" . $synonymset . "</span>"
                ."<span class='pos'> (" . $pos . ")</span>"
                ."</div>"
                ."<div id='S" . (string)$index . "' class='sense-body'>"
                ."<span class='definition'>" . $def . "<br></span>";
            echo "<div  class='example'>";
            if ($sampleset != NULL) {
                foreach($samples as $ex) {
                    echo "<ul>"
                        ."<li>" . $ex . "</li>"
                        ."</ul>";
                }
            }
            echo "</div>"
                ."</div>"
                ."</div>";
        }

        ?>
    </div>
</div>
</body>
