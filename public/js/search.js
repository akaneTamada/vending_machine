// $(function() 
// { 
//     $('#fav-table').tablesorter({
//         headers: {
//            6: { sorter: false },
//            7: { sorter: false }
//         }
// });
// } 
// );

// console.log("読み込みOK");

// $(function(){
   
   
//     $('.search').click(function(){
//         var keyword =$('.keyword').val();
//         var companyKeyword=$('.companyKeyword').val();
//         var minPrice=$('#minPrice').val();
//         var maxPrice=$('#maxPrice').val();
//         var minStock=$('#minStock').val();
//         var maxStock=$('#maxStock').val();

//         console.log(keyword);

//         $.ajax({
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             },
//             type:"get",
//             // url:"search/"+ keyword +companyKeyword,
//             url:"product_search/",
//             dataType:"json",
//             data:{
//             companyKeyword:companyKeyword,
//             keyword:keyword,
//             minPrice:minPrice,
//             maxPrice:maxPrice,
//             minStock:minStock,
//             maxStock:maxStock,
        
//         }

//         })//コントローラーからレスポンスがかえって着た後の処理
//         .done(function(response){
//             console.log(response);

//             let html;
//             for(let i=0; i<response.products.length;i++ ){
//                 html += `
//                 <tr><td>${response.products[i].id}</td>
//                 <td><img src="${response.products[i].img_path}"></td>
//                 <td>${response.products[i].product_name}</td>
//                 <td>${response.products[i].price}</td>
//                 <td>${response.products[i].stock}</td>
//                 <td>${response.products[i].company_name}</td>
                 
//                 <td><a href="product_detail/${response.products[i].id}" class="btn">詳細</a></td>
//                 <td>
              
//                 <form action="delete" method="POST">
//                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
//                 <input type="hidden" name="_method" value="DELETE">
//                 <button type="submit" class="btn btn-secondary delete-btn">削除</button>
//               </form>
//                 </td>

//                 </tr>
//                 `
//             }
//             $("#fav-table").empty().append(html);
//             //差替えができた後にdelete機能を再度挿入！！！deleteProductはdelete.jsで定義している！
//             deleteProduct();
//         }).fail(function(jqXHR, textStatus, errorThrown){
//             alert('通信を失敗しました');
//             console.log("jqXHR          : " + jqXHR.status); // HTTPステータスが取得
//             console.log("textStatus     : " + textStatus);    // タイムアウト、パースエラー
//             console.log("errorThrown    : " + errorThrown.message); // 例外情報
//         });


//     });


// });



















// // $(function(){
// // $('.search').on("click",function(){
// //     alert("検索");
// // });

// // });


// // $(function(){
// //     $('.search').submit(funtion(e)){
// //         e.preventDefault();//フォームの通常送信をキャンセル
// //         $.ajax(
// //             {
// //                 type:"get",
// //                 URL:"/search",
// //                 datatype:"json",
// //                 data:{
// //                       name: $('.keyword').val(),
// //                       company: $('.companyKeyword').val()
// //                      }
// //             })
// //             .done((response)=>{
// //                 var $result = $('#serch.result');
// //                 console.log($result)});
// //     }
// //            } );
// //     //             $result.empty();
// //     //             $.earch(response.products,function(index,product){
// //     //                 var html =`
// //     //                 <tr>
// //     //                     <td>${product.nam}</td>
// //     //                     <td>${product.price}</td>
// //     //                     <td>${product.stock}</td>
// //     //                     <td>${product.company_name}</td>
// //     //                     <td><img src= "${product.img_path}"></td>
// //     //                 </tr>
// //     //                 `;
// //     //                 $result.append(html);


// //     //             });

// //     //         })
// //     //         .fail((error)=>{
// //     //             console.log('失敗');
// //     //         });

// //     //     }
// //     // });


