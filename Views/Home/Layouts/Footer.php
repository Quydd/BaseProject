<a href="#" class="scroll_top" title="Scroll to Top" style="display: inline;">Scroll</a>
<script type="text/javascript" src="<?=Config::$urlbase?>vendor/frontend/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="<?=Config::$urlbase?>vendor/frontend/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?=Config::$urlbase?>vendor/frontend/bower_components/bxslider-4/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="<?=Config::$urlbase?>vendor/frontend/js/owl_clone.min.js"></script>
<script type="text/javascript" src="<?=Config::$urlbase?>vendor/frontend/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- COUNTDOWN -->
<script type="text/javascript" src="<?=Config::$urlbase?>vendor/frontend/bower_components/jquery.countdown/jquery.plugin.min.js"></script>
<script type="text/javascript" src="<?=Config::$urlbase?>vendor/frontend/bower_components/jquery.countdown/jquery.countdown.min.js"></script>
<!-- ./COUNTDOWN -->
<script type="text/javascript" src="<?=Config::$urlbase?>vendor/frontend/js/actual.min.js"></script>
<script type="text/javascript" src="<?=Config::$urlbase?>vendor/frontend/js/script.js?<?=date('l jS \of F Y h:i:s A')?>"></script>
<script type="text/javascript" src="https://kute-themes.com/html/edo/html/assets/lib/easyzoom/easyzoom.js"></script>

<script>
    $(document).ready(function($) {
        $(".link_container").hover(function() {
            var x = $(this).parents(".dropdown-menu").height();
            $(this).children('ul').css({
                display: 'inline',
                transform: 'translate(0,0)',
                top: "-" + (parseInt($(this).attr("data-id")) * 100) + "%",
                marginTop: "-" + (parseInt($(this).attr("data-id")) * 2) + "px",
                height: x + "px",
                opacity: "1",
            });
        }, function() {
            $(this).children('ul').css({
                display: 'none',
                opacity: "0",
                transform: 'translate(0,40)'
            });
        });
    });
</script>
<script>
    $(document).ready(function($) {
        $(".btn-minus").click(function(event) {
            var quantity_product = $(".quantity_product").val();
            if (quantity_product > 1) {
                quantity_product--;
            }
            $(".quantity_product").val(quantity_product);
        });
        $(".btn-plus").click(function(event) {
            var quantity_product = $(".quantity_product").val();
            quantity_product++;
            $(".quantity_product").val(quantity_product);
        });
        $("#add-cart").click(function(event) {
            var x = $(".number_item_cart").text();
            if (x == "") {
                x = 0;
            } else {
                x = parseInt(x);
            }
            var quantity = $(".quantity_product").val();
            var data = {
                'quantity': quantity
            };
        });
    });
</script>
</body>

</html>