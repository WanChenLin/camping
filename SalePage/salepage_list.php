<?php
require __DIR__.'/__salepage_connect_db.php';
$page_name = 'salepage_list.php';
?>
<?php include __DIR__.'/__html_dbhead.php';?>
<?php include __DIR__.'/__html_dbheader.php';?>
<?php include __DIR__.'/__html_dbnavbar.php';?>

<style>
.table-hidden tbody{
  overflow-y: auto;/*設定卷軸 auto 是有超過我的高度的時候才會出現卷軸*/
	height: 100%;/*自己設定*/
}
.table-hidden tr {
	width: 100%;
	/* display: inline-table; */
}
.fa-edit {
   font-size:16px;
   margin:5px;
}
.fa-info-circle
{
   font-size:16px;
   margin:5px;
}

.table-hidden thead th[data-th="其他"]{ width:400px;}
/*因為 tbody 多了卷軸 尺寸多了 17px*/
.table-hidden tbody td[data-th="其他"]{ width:383px;}


</style>
<main class="col-10 bg-white ">
<!-- 取消原本的改為麵包屑 -->
    <aside class="my-2">
        <nav class="bread" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="salepage_list.php">商品管理</a></li>
            <li class="breadcrumb-item active bread_list">商品清單</li>
        </ol>
        </nav>
    </aside>
    <div id="saleinfo_bar" class="alert alert-success " role="alert" style="display:none; "></div>
        <!--搜尋商品的區塊-->
        <div class="form-group">
            <label for="salepage_salecateid" class="must" >選擇商品分類</label>
            <select id="salecateid" name="salecateid" class="custom-select custom-select-sm col-sm-2 ">
                <option value="" selected>請選擇</option>
                <option value="1">冷凍食品</option>
                <option value="2">冷藏食品</option>
                <option value="3">生鮮食材</option>
                <option value="4">素料理專區</option>
            </select>  
        </div>
        <div class="form-group row">
            <label for="salepage_quility" class="col-form-label ml-3 ">搜尋商品名稱</label>
            <div class="ml-1">
            <input type="text" class="form-control" id="search_name" name="search_name" placeholder="請輸入關鍵字"
                value="" >       
            </div>
        </div>

        <div class="form-group row after_sub text-center mr-2 ml-2">
            <div class="">
            <button id="search_btn" type="submit" class="btn btn-primary btn-sm" >  搜尋  </button>
            </div>
        </div>
        <!-- <button id="search_btn" type="submit" class="btn btn-primary btn-sm" >搜尋</button> -->

<div class="container-fluid table-responsive " >
    <!-- 分頁 -->
    <div class="row text-center">
        <div class="col-lg-12">
            <nav>
                <ul class="pagination pagination-sm justify-content-end"></ul>                 
            </nav>
        </div>
    </div>

    <div class="row table-responsive ">
        <div class="col-lg-12">
            <table class="table table-striped table-bordered table-hove table-hidden ">
                <thead>
                <tr  style=" white-space:nowrap;" >
                <!--  加就不自動換行了style=" white-space:nowrap" -->
                                        
                    <th scope="col" style= "width:20px;">商品頁序號</th>
                    <th scope="col"  style= "width:100px;">商品主圖</th>
                    <th  style="height:100px; width:100px; overflow:hidden; " scope="col">產品名稱</th>
                    <th scope="col">商品數量</th>
                    <th scope="col">建議售價</th>
                    <th scope="col">售價</th>
                    <th scope="col">成本</th>
                    <th scope="col">顯示設定</th>
                    <th scope="col">商品特色</th>
                    <!-- <th scope="col">詳細說明</th> -->
                    <!-- <th scope="col">商品規格</th>
                    <th scope="col">付款方式</th>
                    <th scope="col">配送方式</th> -->
                    <th scope="col">商品分類名稱</th>
                    <th scope="col">操作</th>
                </tr>
                </thead>

                <tbody id="data_body" style="font-size:14px;" >
                </tbody>

            </table>
            
        </div>
        
    </div>

   
</div>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>    
    let page = 1;
    let ori_data;
    const ul_pagi = document.querySelector('.pagination');
    const data_body = document.querySelector('#data_body');    

    const tr_str = `<tr>
                            
                            <td><%= salepage_id %></td>
                            <td><img src="<%= salepage_image %>" width="80px"></td>
                            <td><%= salepage_name %></td>
                            <td><%= salepage_quility %></td>
                            <td><%= salepage_suggestprice %></td>
                            <td><%= salepage_price %></td>
                            <td><%= salepage_cost %></td>
                            <td><%= salepage_state == 1 ? "顯示" : "不顯示" %></td>
                            <td><%= salepage_feature %></td>
                            <td><%= salecate_name %></td>
                            <td>
                            <a href="salepage_edit.php?salepage_id=<%= salepage_id %>"><i class="fas fa-edit"></i></a>
                            
                            <a href="javascript: saledelete(<%= salepage_id %>)">
                            <i class="fas fa-trash-alt"></i></a>
                            <br>
                            <a href="salepage_edit.php?salepage_id=<%= salepage_id %>"><i class="fas fa-info-circle"></i></a>
                            
                            </td>
                        </tr>`;   
    

    

    const tr_func = _.template(tr_str);

    const pagi_str = `<li class="page-item <%= active %>">
                        <a class="page-link" href="#<%= page %>"><%= page %></a>
                    </li>`;
    const pagi_func = _.template(pagi_str);

    //用jQuery search    
    function load_data(query,cate)
    {
        $.ajax({
            url:"salepage_search_api.php?page=" + page,
            method:"POST",
            dataType: "json",
            data:{query:query,cate:cate},
            success:function(data)
            {
                //$("#data_body").html(data);
                ori_data = data;
                console.log(ori_data);

                let str = '';
                for(let v of ori_data.data )
                {
                    str += tr_func(v);
                }
                data_body.innerHTML = str;

                // $(document).on('click', '.pagination_link', function(){  
                // var page = $(this).attr("id");  
                // load_data(page);  
                // });
                // $(document).on('click', '#submitbtn', function(){  
                //     var page = $(this).attr("id");
                //     var search = $('#search').val();
                //     load_data(page,search);  
                // });

                str = '';
                for(let i=1; i<=ori_data.totalPages; i++)
                {
                    let active = ori_data.page === i ? 'active' : '';

                    str += pagi_func({
                            active: active,
                            page: i
                        });                
                }
                ul_pagi.innerHTML = str;  
            }
        });
    }

    // function cate_data(cate)
    // {
    //     $.ajax({
    //         url:"salepage_search_api.php?page=" + page,
    //         method:"POST",
    //         dataType: "json",
    //         data:{cate:cate},
    //         success:function(data)
    //         {
    //             //$("#data_body").html(data);
    //             ori_data = data;
    //             console.log(ori_data);

    //             let str = '';
    //             for(let v of ori_data.data )
    //             {
    //                 str += tr_func(v);
    //             }
    //             data_body.innerHTML = str;

    //             str = '';
    //             for(let i=1; i<=ori_data.totalPages; i++)
    //             {
    //                 let active = ori_data.page === i ? 'active' : '';

    //                 str += pagi_func({
    //                         active: active,
    //                         page: i
    //                     });                
    //             }
    //             ul_pagi.innerHTML = str;  
    //         }
    //     });
    // }

    $("#search_btn").click(function(){
        var search = $("#search_name").val();
        var search_cate =$("#salecateid").val();
        load_data(search,search_cate);
      
        // if (search != '') 
        // {
            
        //     load_data(search,search_cate);
        // }
        // ifelse()
        // {
            
        // } 
        // else 
        // {
        //     load_data();
        // }
        
    });

    // $("#search_name").keyup(function(){
    //     var search = $(this).val();
    //     if (search != '') 
    //     {
    //         load_data(search);
    //     } else 
    //     {
    //         load_data();
    //     }
    // });    

    //list 顯示全部資料
    const myHashChange =() =>
    {
        let h = location.hash.slice(1);
        page = parseInt(h);
        if(isNaN(page)){
            page = 1;
        }

        $.ajax({
            method: "POST",
            url: "salepage_search_api.php?page=" + page,
            dataType: "json"
        })
        .done(function(data) 
        {
            ori_data = data;
            console.log(ori_data);

            let str = '';
            for(let v of ori_data.data )
            {
                str += tr_func(v);
            }
            data_body.innerHTML = str;

            str = '';
            for(let i=1; i<=ori_data.totalPages; i++)
            {
                let active = ori_data.page === i ? 'active' : '';

                str += pagi_func({
                        active: active,
                        page: i
                    });                
            }
            ul_pagi.innerHTML = str;                        
            
        }) .fail(function() {
            alert( "error" );
        });


        // fetch('salepage_list_api.php?page=' + page)
        //     .then(response=>response.json())
        //     .then(json=>{
        //         ori_data = json;
        //         console.log(ori_data);

        //         let str = '';
        //         for(let v of ori_data.data )
        //         {
        //             str += tr_func(v);
        //         }
        //         data_body.innerHTML = str;

        //         str = '';
        //         for(let i=1; i<=ori_data.totalPages; i++)
        //         {
        //             let active = ori_data.page === i ? 'active' : '';

        //             str += pagi_func({
        //                     active: active,
        //                     page: i
        //                 });
        //             // console.log(ori_data.page);
        //             // console.log(i);
        //             // console.log(active);
        //         }
        //         ul_pagi.innerHTML = str;
        //     });
    };
    window.addEventListener("hashchange", myHashChange);
    myHashChange();

    //刪除資料
    function saledelete(salepage_id){
        if(confirm(`確定要刪除編號為 ${salepage_id} 的資料嗎?`)){                
        fetch('salepage_delete.php?salepage_id=' + salepage_id)
        .then(response=>response.json())
        .then(obj=>{
            console.log(obj);

            if(obj.success)
            {
                // saleinfo_bar.className = 'alert alert-success';
                // saleinfo_bar.innerHTML = '資料刪除成功';
                // saleinfo_bar.style.display = 'block';
                alert("刪除成功");
                myHashChange();
            } 
            else
                {
                    saleinfo_bar.className = 'alert alert-danger';
                    saleinfo_bar.style.display = 'block';
                    saleinfo_bar.innerHTML = obj.errorMsg;
                    myHashChange();
                }
        },2000)
                
        
        //按刪除後會顯示是否確定刪除，確定後就fetch delete php，
        //成功執行delete.php後就使用myHashChange重整
        //myHashChange();
        }
    }        
</script>


<?php include __DIR__.'/__html_dbfoot.php';?>