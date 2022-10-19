function good(sampleId) {
    $.ajax({
        headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: `/good/`+sampleId,
        type: "POST",
    })
        .done(function (data, status, xhr) {
            let elm = document.getElementsByClassName("GoodButton"+sampleId);
            let elm2 = document.getElementsByClassName("GoodCount"+sampleId);
            for (let i = 0; i < elm.length; i++) {
                if(elm[i].innerText=="いいね"){
                    elm[i].innerText="いいね解除";
                    elm2[i].innerText=Number(elm2[i].innerText)+1;
                }else{
                    elm[i].innerText="いいね";
                    elm2[i].innerText=Number(elm2[i].innerText)-1;
                }
            }
        })
        .fail(function (xhr, status, error) {
          console.log("いいね送信失敗");
        });
    
}
window.good = good;

function follow(userId) {
    $.ajax({
        headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: `/follow/`+userId,
        type: "POST",
    })
        .done(function (data, status, xhr) {
            console.log("フォロー成功");
            let elm = document.getElementsByClassName("FollowButton"+userId);
            let elm2 = document.getElementsByClassName("FollowCount"+userId);
            for (let i = 0; i < elm.length; i++) {
                if(elm[i].innerText=="フォロー"){
                    elm[i].innerText="フォロー解除";
                    elm2[i].innerText=Number(elm2[i].innerText)+1;
                }else{
                    elm[i].innerText="フォロー";
                    elm2[i].innerText=Number(elm2[i].innerText)-1;
                }
            }
        })
        .fail(function (xhr, status, error) {
            console.log("フォロー失敗");
        });
}
window.follow = follow;