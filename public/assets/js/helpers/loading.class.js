class Loading {
    static buttonStart(button) {
        if(l != null) {
            l = $( button ).ladda();
            l.ladda('start');
        }
    }

    static buttonStop() {
        if(l != null) {
            l.ladda('stop');
        }
    }

    static spinnerShow() {
        $('.overlay').show();
        return true;
    }

    static spinnerHide() {
        $('.overlay').hide();
        return true;
    }
}