// JavaScript Document

var Utility = {
    search: function(e)
    {
        var element = document.getElementById('txtquery');
        if(element.value == ''){
            element.focus();
            return false;
        }
    }
}





