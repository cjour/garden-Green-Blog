
document.addEventListener('DOMContentLoaded', () => {
    //data verification
    document.getElementById('submit_sign_in').style.disabled=true;


    document.getElementById('pass').addEventListener('input', e => {
        
        let passVerify = new VerificationData(document.getElementById('pass').value);
        if(passVerify.PassVerify() === true){

            document.getElementById('pass').style.border ="0.25em solid #28a745";
            document.getElementById('warningInstruction').style.display = "none";

        } else {

            document.getElementById('pass').style.border ="0.25em solid #dc3545";
            document.getElementById('warningInstruction').style.display = null;


        };
    });

    document.getElementById('passConfirm').addEventListener('input', e => {

        let passVerify = new VerificationData(document.getElementById('passConfirm').value);
        if(((document.getElementById('passConfirm').value) === (document.getElementById('pass').value)) && (passVerify.PassVerify() === true)) {

            document.getElementById('passConfirm').style.border ="0.25em solid #28a745";
            document.getElementById('submit_sign_in').disabled=false;

        } else {

            document.getElementById('passConfirm').style.border ="0.25em solid #dc3545";
            document.getElementById('submit_sign_in').disabled=true;

            

        }


    });

    
    
});