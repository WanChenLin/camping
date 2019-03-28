<main class="col-10 bg-white">

    <aside class="my-2">
        <ul class="nav nav-tabs small_nav">
            <li class="nav-item">
                <a class="nav-link" href="#">ITEM 1</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">ITEM 2</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">ITEM 3</a>
            </li>
        </ul>
    </aside>

    <script>
        $(".small_nav li").click(function(){
            $(this).find("a").addClass("active")
            .end().siblings().find("a").removeClass("active");
        })
    </script>