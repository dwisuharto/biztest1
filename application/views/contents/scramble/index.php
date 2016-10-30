<div class="col-lg-8 col-lg-offset-2">
    <div align="center">
        <div class="col-lg-12">
            <div class="col-lg-4 pull-left"><h3 align="left">Score: <span id="scrambleScore"><?php echo $score; ?></span></h3></div>
            <div class="col-lg-4"><span id="scrambleMsg"></span></div>
            <div class="col-lg-4 pull-right"><h3 align="right">Count: <span id="scrambleCount"><?php echo $count; ?></span></h3></div>
        </div>
        <div>&nbsp;</div>
        <div id="scrambleShuffled"></div>
        <div>&nbsp;</div>
        <input type="text" class="form-control" id="scrambleAnswer" name="answer" style="text-align: center; text-transform: uppercase;"/>
        <div>&nbsp;</div>
        <button id="scrambleBtnAnswer" class="btn btn-default"><i class="fa fa-check"></i> Answer</button>
    </div>
</div>

<script type="text/javascript">
    $('#scrambleAnswer').on('keypress', function(e) {
        $('#scrambleMsg').fadeOut();

        var chr = String.fromCharCode(e.which).toUpperCase();
        $('button[data-value="' + chr + '"]').attr('disabled', true);
        $('button[data-value="' + chr + '"]').css('background-color', '#999999');
    });

    $('#scrambleAnswer').on('keydown', function(e) {
        var value = $(this).val().toUpperCase();
        var key = e.keyCode || e.charCode;

        if (key == 8 || key == 46) {
            var chr = value.substr(value.length - 1);
            $('button[data-value="' + chr + '"]').attr('disabled', false);
            $('button[data-value="' + chr + '"]').css('background-color', '#ffffff');
        } else if (key == 13) {
            checkAnswer(value);
        }
    });

    $('#scrambleBtnAnswer').on('click', function() {
        var value = $('#scrambleAnswer').val().toUpperCase();
        checkAnswer(value);
    });

    var nextWord = function() {
        $('#scrambleShuffled button').remove();

        $.ajax({
            url: "/scramble/nextword",
            type: "post",
            dataType: "json",
            cached: false,
            data: {}
        })
            .done(function(resp) {
                if (resp.success) {
                    $(resp.data).each(function(i, obj) {
                        $('#scrambleShuffled').append($('<button class="btn btn-default" data-value="' + obj + '" style="margin-left: 10px;">' + obj + '</button>'));
                    });

                    var count = parseInt($('#scrambleCount').text());
                    count++;
                    $('#scrambleCount').text(count);
                }
            });
    }

    var checkAnswer = function(answer) {
        $.ajax({
            url: "/scramble/checkanswer",
            type: "post",
            dataType: "json",
            data: {answer: answer}
        })
            .done(function(resp) {
                $('#scrambleAnswer').val('');

                if (resp.success) {
                    $('#scrambleMsg').fadeIn();
                    if (resp.status.correct) {
                        $('#scrambleMsg').text('Correct');
                    } else {
                        $('#scrambleMsg').text('Sorry, try again');
                    }
                    $('#scrambleScore').text(resp.status.score);

                    nextWord();
                }
            });
    }

    nextWord();
</script>
