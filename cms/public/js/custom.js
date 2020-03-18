// 削除ボタンを押すとアラートがでる
function deletePost(e) {
    'use strict';
    
    if ( confirm ('本当に削除していいですか?') )document.getElementById('form_' + e.dataset.id).submit();
}