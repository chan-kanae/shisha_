// console.log('ajax.js');
// インクリメンタルサーチ
$("#search").on("input", function() {
    var name = $("#search").val();
    console.log(name);
    $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            }, //Headersを書き忘れるとエラーになる
            url: "/post/input", //web.phpのURLに合わせる
            type: "POST", //リクエストタイプ
            data: {
                name: name,
            }, //Laravelに渡すデータ
        })
        // Ajaxリクエスト成功時の処理
        .done(function(data) {
            // Laravel内で処理された結果がdataに入って返ってくる
            console.log(data);
            $("#response").empty();
            if (data.length !== 0) {
                $("#response").append("検索結果はこちらです");
            } else {
                $("#response").append("検索結果はありません");
            }
        })
        // Ajaxリクエスト失敗時の処理
        .fail(function(data) {
            alert("Ajaxリクエスト失敗");
        });
});