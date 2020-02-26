$(function() {
    var dictionary = "http://localhost/dictionaries/search/";
    const ROOT_URL = "http://localhost/";

    var $searchbox = $('#searchbox');
    var $search = $('#search_form');

    // send words?term= ... each time after typing
    $searchbox.autocomplete({
        //minLength: 100,
        autoFocus: true,
        delay: 0,
        source:
            function(req, res) {
                $.ajax({
                    url: ROOT_URL + "api/search.php",
                    dataType: "json",
                    data: {
                        q: req.term,
                    },
                    success: function( data ) {
                        res($.map(data, function(item) {
                            return {
                                label: item.lemma,
                                value: item.wordid
                            };
                        }));
                    }
                });

            },
        select: function(event, ui) {
            var $query = String(ui.item.label);
            $query = $query.replace(/\s/g, "-");
            //$searchbox.val(ui.item.label);
            //window.location.autoFocussign("https://www.google.com/search?dcr=0&source=hp&ei=BlorWv7NG8f98gWN44noCg&q=" + String(ui.item.label))

            location.href = dictionary + $query;

            //location.href = "https://www.google.com.vn/search?q=" + String(ui.item.label) + "&dcr=0&source=lnms&tbm=isch";
            return false;
        },

        focus:function(event, ui) {
            return false;
        },
    });
    $search.on("submit", function(){
        var $query = String($searchbox.val());
        $query = $query.replace(/\s/g, "-");

        location.href = dictionary + $query;
        return false;
    });


    ///Play audio
    var $play = $("#play");
    var $audio = $("#audio")[0];

    $play.click(function() {
        console.log("playing");
        $audio.play();
    });
});