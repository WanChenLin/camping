</section>

                </main>

            </div>
        </div>
    </div>
<script>
$("#menu").click(function(){
    $(".nav_content").css("display","block");
});
$(".nav_cross").click(function(){
    $(".nav_content").css("display","none");
});

$(window).resize(function(){
    var windowWidth=$(this).width();
    console.log(windowWidth);
    if(windowWidth>=768){
        $(".nav_content").css("display","block");
    }else{
        $(".nav_content").css("display","none");
    }
});

$(.collapse).click(function(){
    $(this).addClass('show');
});

</script>
</body>

</html> 