class Async {

    static ajax(url, type, dataType, data, loadingButton){
        return $.ajax({
            url: url,
            type: type,
            dataType: dataType,
            data: data,
            beforeSend: function(){
                if(loadingButton !== null) {
                    Loading.buttonStart(loadingButton);
                } else {
                    Loading.spinnerShow();
                }
            }
        });
    }

    static onResponseSuccess(data) {
        successResponse(data);
    }

    static onResponseFail(jqXHR, textStatus, errorThrown) {
        if(textStatus === 'error') {
            if(!Error.handle(jqXHR.status, jqXHR.responseJSON)) {
                Message.warning('Error processing your request.', 'Server is not responding, please try again');
                console.log('err. msj.: ' + jqXHR.responseText);
                console.log('errThrown: ' + errorThrown);
            }
        }
    }

    static onResponseAlways() {
        if(l != null) {
            Loading.buttonStop();
        } else {
            Loading.spinnerHide();
        }
    }
}