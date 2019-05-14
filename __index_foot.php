<!-- 全站結尾標籤、全站共用的JavaScript -->

</div>
</div>
</div>

</body>


<script>
    $("#menu").click(function() {
        $(".nav_content").css("display", "block");
    });
    $(".nav_cross").click(function() {
        $(".nav_content").css("display", "none");
    });

    $(window).resize(function() {
        var windowWidth = $(this).width();
        if (windowWidth >= 768) {
            $(".nav_content").css("display", "block");
        } else {
            $(".nav_content").css("display", "none");
        }
    });

    $(".collapse").click(function() {
        $(this).addClass('show');
    });
</script>

</html>