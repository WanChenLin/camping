<?php
require __DIR__.'/__salepage_connect_db.php';
$page_name = 'salepage_list.php';
?>
<?php include __DIR__.'/__html_dbhead.php';?>
<?php include __DIR__.'/__html_dbnavbar.php';?>


<div class="row">
    <div class="col-lg-12">
        <nav>
            <ul class="pagination pagination-sm">                    
            </ul>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <!-- <th scope="col"><i class="fas fa-edit"></i></th> -->
                <!-- <th scope="col">商品主圖</th> -->
                <th scope="col">商品頁序號</th>
                <th scope="col">產品名稱</th>
                <th scope="col">商品數量</th>
                <th scope="col">建議售價</th>
                <th scope="col">售價</th>
                <th scope="col">成本</th>
                <th scope="col">顯示設定</th>
                <th scope="col">商品特色</th>
                <th scope="col">詳細說明</th>
                <th scope="col">商品規格</th>
                <th scope="col">付款方式</th>
                <th scope="col">配送方式</th>
                <th scope="col">商品分類流水號</th>
                <!-- <th scope="col"><i class="fas fa-trash-alt"></i></th> -->
            </tr>
            </thead>

            <tbody id="saledata_body">
            </tbody>

        </table>
    </div>
</div>

<script>
    let page = 1;
    let sale_data;
    const saleul_pagi = document.querySelector('.pagination');
    const saledata_body = document.querySelector('#saledata_body');

    const saletr_str = `<tr>
                            <td><%= salepage_id %></td>
                            <td><%= salepage_name %></td>
                            <td><%= salepage_quility %></td>
                            <td><%= salepage_suggestprice %></td>
                            <td><%= salepage_price %></td>
                            <td><%= salepage_cost %></td>
                            <td><%= salepage_state %></td>
                            <td><%= salepage_feature %></td>
                            <td><%= salepage_proddetails %></td>
                            <td><%= salepage_specification %></td>
                            <td><%= salepage_paymenttype %></td>
                            <td><%= salepage_deliverytype %></td>
                            <td><%= salepage_salecateid %></td>
                        </tr>`;
    const saletr_func = _.template(saletr_str);

    const salepagi_str = `<li class="page-item <%= active %>">
                        <a class="page-link" href="#<%= page %>"><%= page %></a>
                    </li>`;
    const pagi_func = _.template(salepagi_str);

    const myHashChange =() =>
    {
        let h = location.hash.slice(1);
        page = parseInt(h);
        if(isNaN(page)){
            page = 1;
        }

        fetch('salepage_list_api.php?page=' + page)
            .then(response=>response.json())
            .then(json=>{
                sale_data = json;
                console.log(sale_data);

                let str = '';
                for(let v of sale_data.data )
                {
                    str += saletr_func(v);
                }
                saledata_body.innerHTML = str;

                str = '';
                for(let i=1; i<=sale_data.totalPages; i++){
                    let active = sale_data.page === i ? 'active' : '';

                    str += pagi_func({
                        active: active,
                        page: i
                    });
                }
                saleul_pagi.innerHTML = str;
            });
    };
    window.addEventListener('hashchange', myHashChange);
    myHashChange();

</script>


<?php include __DIR__.'/__html_dbfoot.php';?>