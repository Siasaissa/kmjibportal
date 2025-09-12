<?php




//return unique request id to be used on tiramis request
function generateRequestID()
{
    return 'RID-KMJ'.date('ymdHis').time();
}


//return unique id for other request
function otherUniqueID()
{
    return 'KMJ'.date('ymdHis').time();
}


