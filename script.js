let startIndex = 0;
let endIndex = 4;

function nextWindow(endIndexLimit){

    if(endIndex + 4 < endIndexLimit){
        startIndex += 4;
        endIndex += 4;
    }
    else
    {
        endIndex = endIndexLimit;
        startIndex = endIndex - 4;
    }
}
function previousWindow(){
    if(startIndex - 4 > 0){
        startIndex -= 4;
        endIndex -= 4;
    }
    else{
        startIndex = 0;
        endIndex = 4;
    }
}