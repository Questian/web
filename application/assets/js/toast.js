/**
 * Created by Seungwoo on 2016. 2. 24..
 */
function createToast(t){
    $.toast.config.align = 'right';
    $.toast.align = 'center';
    $.toast.config.width = 300;
    switch(t) {
        case 'succeed':
            $.toast( '<h4>도와주세요! 용사님!</h4><br>이제 곧 있으면 용사님들이 오실거예요!', { sticky: true, type: 'success' , duration:4000} );
            return;
        case 'dberror':
            $.toast( '<h4>퀘스트를 알리는데 실패했습니다.</h4><br> 다시 시도하거나, DB에러입니다. 관리자에게 문의하세요.', { sticky: true, type: 'danger', duration:4000 } );
            return;
        case 'lessparam':
            $.toast( '<h4>퀘스트를 알리는데 실패했습니다.</h4><br> 퀘스트, 완료보상, 내용은 필수항목입니다.', { sticky: true, type: 'danger', duration: 4000} );
            return;
    }
}