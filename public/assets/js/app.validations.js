
/*validate numeric value*/
function IsNumeric(input)
{
    return (input - 0) == input && (''+input).replace(/^\s+|\s+$/g, "").length > 0;
}
/*validate time 24 hs format*/
function validateTimeHHMM(time){

    //separo horas de minutos
    var hora_min = time.split(':');
    //valido que halla 2 partes
    if(hora_min.length !=2)
        return false;

    //tomo las horas y los minutos
    var hora = hora_min[0]; var min = hora_min[1];

    //valido que sean numericos
    if(!IsNumeric(hora)) return false;
    if(!IsNumeric(min)) return false;

    //valido q la hora sea entre 0 y 23
    if(hora<0 || hora >23) return false;

    //valido q los minutos sean entre 0 y 59
    if(min<0 || min >59) return false;

    //si llego hasta aca es una hora del carajo
    return true;
}

/*compare 24hs times */
function compareTimesHHMM(from, to)
{
    //compare string without ':'
    var from_int = from.replace(':','');
    var to_int = to.replace(':','');

    if(from_int > to_int)
        return false;
    else
        return true;
}

/*validate dd/mm/yyyy formatted date*/
function validateDate(date){
    var dtCh= "/";
    var minYear=1900;
    var maxYear=2500;
    function isInteger(s){
        var i;
        for (i = 0; i < s.length; i++){
            var c = s.charAt(i);
            if (((c < "0") || (c > "9"))) return false;
        }
        return true;
    }
    function stripCharsInBag(s, bag){
        var i;
        var returnString = "";
        for (i = 0; i < s.length; i++){
            var c = s.charAt(i);
            if (bag.indexOf(c) == -1) returnString += c;
        }
        return returnString;
    }
    function daysInFebruary (year){
        return (((year % 4 == 0) && ( (!(year % 100 == 0)) || (year % 400 == 0))) ? 29 : 28 );
    }
    function DaysArray(n) {
        for (var i = 1; i <= n; i++) {
            this[i] = 31
            if (i==4 || i==6 || i==9 || i==11) {this[i] = 30}
            if (i==2) {this[i] = 29}
        }
        return this
    }
    function isDate(dtStr){
        var daysInMonth = DaysArray(12)
        var pos1=dtStr.indexOf(dtCh)
        var pos2=dtStr.indexOf(dtCh,pos1+1)
        var strDay=dtStr.substring(0,pos1)
        var strMonth=dtStr.substring(pos1+1,pos2)
        var strYear=dtStr.substring(pos2+1)
        strYr=strYear
        if (strDay.charAt(0)=="0" && strDay.length>1) strDay=strDay.substring(1)
        if (strMonth.charAt(0)=="0" && strMonth.length>1) strMonth=strMonth.substring(1)
        for (var i = 1; i <= 3; i++) {
            if (strYr.charAt(0)=="0" && strYr.length>1) strYr=strYr.substring(1)
        }
        month=parseInt(strMonth)
        day=parseInt(strDay)
        year=parseInt(strYr)
        if (pos1==-1 || pos2==-1){
            return false
        }
        if (strMonth.length<1 || month<1 || month>12){
            return false
        }
        if (strDay.length<1 || day<1 || day>31 || (month==2 && day>daysInFebruary(year)) || day > daysInMonth[month]){
            return false
        }
        if (strYear.length != 4 || year==0 || year<minYear || year>maxYear){
            return false
        }
        if (dtStr.indexOf(dtCh,pos2+1)!=-1 || isInteger(stripCharsInBag(dtStr, dtCh))==false){
            return false
        }
        return true
    }
    if(isDate(date)){
        return true;
    }else{
        return false;
    }
}


