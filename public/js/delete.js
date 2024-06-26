$(function() {
  deleteProduct();
});
//delete機能を関数化して呼び出す順序の制御をおこなうため!!重要覚える！こうすることで他でタイミング合わせて呼び出せる！！！
function deleteProduct(){
    $('.delete-btn').click(function(e){
        //formの送信がされていてエラーが起こっていたのでそういった動作をいったん削除e.preventDefault
        e.preventDefault();
        var deleteConfirm = confirm('削除してよろしいでしょうか？');
        if(deleteConfirm == true) {
            console.log('削除非同期開始');
            var clickEle = $(this);
            var product = clickEle.attr('data-product_id');
            var deleteTarget = clickEle.closest('tr');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: 'delete',
                dataType: 'json',
                data: {'product': product}
                      
            })//通信が成功した時の処理
            .done(function() {
                console.log('削除通信成功');
                deleteTarget.remove();
            })
            .fail(function() {
                console.log('通信後失敗');
            })
        } 
    });
}