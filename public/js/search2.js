
$(function() 
{ 
    $('#fav-table').tablesorter({
        headers: {
           6: { sorter: false },
           7: { sorter: false }
        }
});
} 
);
function sort(){
    $('#fav-table').tablesorter({
        headers: {
           6: { sorter: false },
           7: { sorter: false }
        }
});
}

console.log("search2読み込みOK");

$(function(){
   
   
    $('.search').click(function(e){
        e.preventDefault();
        var formData = $('#search-form').serialize();

        alert(formData);

        $.ajax({
            type:'get',
            url:'product_list/',
            dataType:'html',
            data: formData
        })//コントローラーからレスポンスがかえって着た後の処理
        .done(function(response){
            console.log(response);
            let newData = $(response).find('#fav-table');
            $('#fav-table').replaceWith(newData);
            sort();
            deleteProduct();
          
           
        }).fail(function(jqXHR, textStatus, errorThrown){
            alert('通信を失敗しました');
            console.log("jqXHR          : " + jqXHR.status); // HTTPステータスが取得
            console.log("textStatus     : " + textStatus);    // タイムアウト、パースエラー
            console.log("errorThrown    : " + errorThrown.message); // 例外情報
        });


    });


});



















// $(function(){
// $('.search').on("click",function(){
//     alert("検索");
// });

// });


// $(function(){
//     $('.search').submit(funtion(e)){
//         e.preventDefault();//フォームの通常送信をキャンセル
//         $.ajax(
//             {
//                 type:"get",
//                 URL:"/search",
//                 datatype:"json",
//                 data:{
//                       name: $('.keyword').val(),
//                       company: $('.companyKeyword').val()
//                      }
//             })
//             .done((response)=>{
//                 var $result = $('#serch.result');
//                 console.log($result)});
//     }
//            } );
//     //             $result.empty();
//     //             $.earch(response.products,function(index,product){
//     //                 var html =`
//     //                 <tr>
//     //                     <td>${product.nam}</td>
//     //                     <td>${product.price}</td>
//     //                     <td>${product.stock}</td>
//     //                     <td>${product.company_name}</td>
//     //                     <td><img src= "${product.img_path}"></td>
//     //                 </tr>
//     //                 `;
//     //                 $result.append(html);


//     //             });

//     //         })
//     //         .fail((error)=>{
//     //             console.log('失敗');
//     //         });

//     //     }
//     // });


