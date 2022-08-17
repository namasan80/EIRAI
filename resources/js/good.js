function good(sampleId) {
    $.ajax({
        headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: `/good/`+sampleId,
        type: "POST",
    })
        .done(function (data, status, xhr) {
          console.log("いいね送信成功");
        })
        .fail(function (xhr, status, error) {
          console.log("いいね送信失敗");
          console.log("jqXHR          : " + xhr.status); // HTTPステータスが取得
          console.log("textStatus     : " + status);    // タイムアウト、パースエラー
          console.log("errorThrown    : " + error.statusText); // 例外情報
        });
    let elm = document.getElementsByClassName("GoodButton"+sampleId);
    for (let i = 0; i < elm.length; i++) {
        if(elm[i].innerText=="いいね"){
            elm[i].innerText="いいね解除";
        }else{
            elm[i].innerText="いいね";
        }
    }
}
window.good = good;