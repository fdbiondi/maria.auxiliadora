/** ladda button */
let l = null;

/** Spinner */
let spinner = null;
let spinner_div = 0;

/** DOM Ready */
$(function () {
    // Bind normal buttons
    setToastConfiguration();
});

/** toastr */
function setToastConfiguration(){
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "progressBar": true,
        "preventDuplicates": false,
        "positionClass": "toast-top-right",
        "onclick": null,
        "showDuration": "400",
        "hideDuration": "1000",
        "timeOut": "7000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
}

/** Serialize Forms */
$.fn.serializeObject = function() {
    let o = {};
    let a = this.find(':input:not(.not_included)').serializeArray();
    $.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });

    return o;
};

$.fn.serializeDisabled = function () {
    let o = {};

    $(':disabled[name]', this).each(function () {
        o[this.name] = $(this).val();
    });

    return o;
};

$.fn.serializeChecks = function () {
    let o = {};

    $(':checkbox[name]', this).each(function () {
        o[this.name] = +this.checked;
    });

    return o;
};

/** ajax promise */
function ajaxPromise(URL, type, dataType, data, button_loading) {
    Async.ajax(URL,type,dataType,data,button_loading)
        .done((data) => {
            Async.onResponseSuccess(data) //define this in the js file to get the response and handle
        }).fail((jqXHR, textStatus, errorThrown) => {
            Async.onResponseFail(jqXHR, textStatus, errorThrown);
        }).always(() => {
            Async.onResponseAlways();
        });
}

/** Decode Entities */
let decodeEntities = (function() {
    // this prevents any overhead from creating the object each time
    let element = document.createElement('div');

    function decodeHTMLEntities (str) {
        if(str && typeof str === 'string') {
            // strip script/html tags
            str = str.replace(/<script[^>]*>([\S\s]*?)<\/script>/gmi, '');
            str = str.replace(/<\/?\w(?:[^"'>]|"[^"]*"|'[^']*')*>/gmi, '');
            element.innerHTML = str;
            str = element.textContent;
            element.textContent = '';
        }
        return str;
    }

    return decodeHTMLEntities;
})();