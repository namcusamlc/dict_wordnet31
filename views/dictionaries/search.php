<div id="box1">
    <input type="text" id="searchbox" class="form-control" spellcheck="false" value="<?php echo $viewmodel[0] ?>"/>
    <img id="searchicon" src="<?php echo ROOT_URL ?>assets/svg/search.svg">
</div>
<div id="box2" style="height: 80px;">
    <button id="play" type="button" class="btn play_audio"><img src="<?php echo ROOT_URL ?>assets/svg/si-glyph-sound.svg"></button>
    <audio id="audio" src="http://ssl.gstatic.com/dictionary/static/sounds/20160317/<?php echo $_GET['id']?>--_us_1.mp3"></audio>
</div>


<div id="content-box">

    <div id="search-history-box">
        <p></p>
        <div class="history-container">

        </div>
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
            $synonymset = $value['synonyms'];

            $display = "";
            foreach($synonymset as $synonym) {
                if ($synonym != $lemma) {
                    $display .= "&nbsp<a class='synonym badge badge-light' href='". ROOT_URL.
                        "dictionaries/search/". str_replace(" ", "-", $synonym) ."'>{$synonym}</a>";
                }
            }
            echo "<div class='sense-box' id='sense_" . (string)$index . "'>"
                ."<div class='sense-title' " . (string)$index . "'>"
                ."<span class='word'>" . $lemma . "</span>"
                ."<span class='pos'> (" . $pos . ")</span>"
                . $display
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

